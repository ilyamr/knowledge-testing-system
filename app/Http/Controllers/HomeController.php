<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Question;
use App\Topic;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('app.home');
    }

    public function page($id)
    {
        $topic = Topic::findByIdentifierOrFail($id);

        $parsedown = new \App\Helpers\Parsedown();

        return view('app.topic.page', [
            'topic' => $topic,
            'text' => $parsedown->text($topic->description),
            'title' => 'Теорія - ' . $topic->title
        ]);
    }

    public function tests(Request $request, $id)
    {
        /** @var Topic $topic */
        $topic = Topic::findByIdentifierOrFail($id);
        $topic->startTypedSessionIfNotExists(Topic::THEORY_TYPE);

        if($request->isMethod('post') && $request->has('skip')) {
            $topic->submitQuestion(Topic::THEORY_TYPE, 'Питання пропущене');
            return redirect()->to(url('/'.$id.'/tests'));
        }

        if($topic->fullyAnswered(Topic::THEORY_TYPE))
        {
            return redirect()->to(url('/'.$id.'/tests/results'));
        }

        if($request->isMethod('post') && $request->has('answer')) {
            $topic->submitQuestion(Topic::THEORY_TYPE, $request->get('answer'));

            return redirect()->to(url('/'.$id.'/tests'));
        }

        $question = Question::find(
            $topic->getDestiny(Topic::THEORY_TYPE)[$topic->getIter(Topic::THEORY_TYPE)]
        );

        if(!$question) {
            $topic->startTypedSession(Topic::THEORY_TYPE);
            $topic->generateDestiny(Topic::THEORY_TYPE);

            return redirect()->to(url('/'.$id.'/tests'));
        }

        return view('app.topic.tests', [
            'topic' => $topic,
            'question' => $question,
            'title' => 'Теоретичні тести - ' . $topic->title
        ]);
    }

    public function practice(Request $request, $id)
    {
        /** @var Topic $topic */
        $topic = Topic::findByIdentifierOrFail($id);

        if(!$topic->hasPractice()) {
            throw new NotFoundHttpException;
        }

        return $topic->getPractice()->index($request, $topic);
    }

    public function results(Request $request, $id)
    {
        if(!Auth::check()) {
            return redirect()->to('login');
        }

        /** @var Topic $topic */
        $topic = Topic::findByIdentifierOrFail($id);
        $corrects = [];

        if($request->isMethod('post') && $request->has('reset')) {
            $topic->resetTypeSession(Topic::THEORY_TYPE);
            return redirect()->to(url('/'.$id.'/tests'));
        }

        if(!$topic->hasQuestionsResults())
            $topic->collectSubmittedQuestions();

        foreach ($topic->getQuestionsResults() as $id => $questionsResult) {
            $answer = [];
            foreach($questionsResult->submitted as $c) {
                if(!is_int($c) || $questionsResult->type == 'text') {
                    $answer[] = $c;
                }
                else {
                    $answer[] = $questionsResult->answers[$c];
                }
            }
            $answer = implode(', ', $answer);

            $corrects[] = (object)[
                'question' => $questionsResult->question,
                'correct' => $questionsResult->correct,
                'submitted' => $questionsResult->submitted,
                'answer' => $answer,
            ];
        }

        return view('app.topic.results.tests', [
            'topic' => $topic,
            'corrects' => $corrects,
            'title' => 'Результат - ' . $topic->title
        ]);
    }
}
