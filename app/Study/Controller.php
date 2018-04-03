<?php

namespace App\Study;

use App\Topic;
use Illuminate\Http\Request;

abstract class Controller extends \App\Http\Controllers\Controller implements Contracts\Controller
{
    /**
     * @var array
     */
    protected $steps;

    /**
     * @var Topic
     */
    protected $topic;

    /**
     * @var string
     */
    protected $slug;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Entry practice point
     *
     * @param \Illuminate\Http\Request $request
     * @param string|bool $slug
     * @return mixed
     * @throws \Exception
     */
    public function index(Request $request, $slug = false)
    {
        $slug = $this->slug;

        $this->topic = $topic = Topic::findByIdentifierOrFail($slug);
        $data = [];

        if(!$topic->typedSessionExists(Topic::PRACTICE_TYPE)) {
            $topic->startTypedSession(Topic::PRACTICE_TYPE);
        }
        $topic->set('type', Topic::PRACTICE_TYPE);

        if($topic->getIter(Topic::PRACTICE_TYPE) == count($this->steps)) {
            return redirect()->to('/'.$slug.'/practice/results');
        }

        $step = $this->getStepName($topic->getIter(Topic::PRACTICE_TYPE));

        if($request->isMethod('post')) {
            if($request->has('back')) {
                $topic->setTyped('i', $topic->getIter(Topic::PRACTICE_TYPE) - 1);
                return redirect()->to('/'.$slug.'/practice');
            }

            // MAGIC!
            if(!array_key_exists($step, $this->steps)) {
                throw new \Exception('Step "'.$step.'" not found');
            }

            $request->flash();
            $this->validate($request, $this->steps[$step]['validation']);

            if(!array_key_exists('save', $this->steps[$step])) {
                $this->steps[$step]['save'] = array_keys($this->steps[$step]['validation']);
            }

            foreach ($this->steps[$step]['save'] as $field) {
                $topic->setTyped($field, $request->get($field));
            }

            if(array_key_exists('afterExists', $this->steps[$step])
                && $this->steps[$step]['afterExists']
                && method_exists($this, 'afterMethods')
                && array_key_exists($step, $this->afterMethods())
                && is_callable($method = $this->afterMethods()[$step])
            ) {
                $method($request, $topic);
            }

            $topic->setTyped('i', $topic->getIter(Topic::PRACTICE_TYPE) + 1);

            if($topic->getIter(Topic::PRACTICE_TYPE) == count($this->steps)) {
                return redirect()->to('/'.$slug.'/practice/results');
            }

            /*
             * Next step exists
             */
            $step = $this->getStepName($topic->getIter(Topic::PRACTICE_TYPE));
        }

        if(array_key_exists('preExists', $this->steps[$step])
            && $this->steps[$step]['preExists']
            && method_exists($this, 'preMethods')
            && array_key_exists($step, $this->preMethods())
            && is_callable($method = $this->preMethods()[$step])
        ) {
            $data = $method($topic);
            $data = is_array($data)?$data : [];
        }

        return view('practice.'.$slug.'.' . $step, array_merge([
            'topic' => $topic,
            'title' => 'Практичні тести - ' . $topic->title
        ], $data));
    }

    /**
     * Practice results point
     *
     * @param \Illuminate\Http\Request $request
     * @param string|bool $slug
     * @return mixed
     */
    public function results(Request $request, $slug = false)
    {
        $this->topic = $topic = Topic::findByIdentifierOrFail($slug);

        if($topic->getIter(Topic::PRACTICE_TYPE) != count($this->steps)) {
            return redirect()->to('/'.$slug.'/practice');
        }

        $topic->set('type', Topic::PRACTICE_TYPE);

        if($request->isMethod('post') && $request->has('reset')) {
            $topic->resetTypeSession(Topic::PRACTICE_TYPE);
            return redirect()->to('/'.$slug.'/practice');
        }
    }

    /**
     * @param $step
     * @return mixed
     * @throws \Exception
     */
    private function getStepName($step)
    {
        if(array_key_exists($step, array_keys($this->steps))) {
            return array_keys($this->steps)[$step];
        }
        else {
            throw new \Exception('This step not exists');
        }
    }
}