<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Topic;
use Illuminate\Http\Request;
use Romalytvynenko\EloquentTable\Engine\EloquentTable;

class TopicController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function topics()
    {
        $table = new EloquentTable(Topic::class, [
            'columns' => [
                'id' => '#',
                'title' => 'Title',
                'actions' => 'Actions'
            ]
        ]);
        $table->columnOutput('actions', function($item){
            /**
             * @var $item Eloquent
             */
            $str = '<a href="/dashboard/topics/'.$item->id.'/description">page</a> | ';
            $str .= '<a href="/dashboard/topics/'.$item->id.'/edit">edit</a> | ';
            $str .= '<a class="red" href="/dashboard/topics/'.$item->id.'/delete">delete</a>';

            return $str;
        });
        return view('dashboard.topic.list', [
            'table' => $table
        ]);
    }

    /**
     * Description editing
     */
    public function description(Request $request, $id)
    {
        $topic = Topic::findOrFail($id);

        if($request->isMethod('post') && $request->has('description')) {
            $topic->description = $request->get('description');
            $topic->save();
        }

        return view('dashboard.topic.description')->with('topic', $topic);
    }

    /**
     * Topic editing
     */
    public function create(Request $request)
    {
        $topic = new Topic();

        if($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required',
                'slug' => 'required'
            ]);

            $topic->title = $request->get('title');
            $topic->slug = $request->get('slug');

            $topic->save();

            if($request->has('items')) {
                $data = json_decode($request->get('items'));
                $topic->updateQuestions($data);
                $topic->save();
            }

            return redirect()->to(route('edit-topic', [
                'id' => $topic->id
            ]));
        }

        return view('dashboard.topic.one')->with('topic', $topic);
    }

    /**
     * Topic editing
     */
    public function edit(Request $request, $id)
    {
        /** @var Topic $topic */
        $topic = Topic::findOrFail($id);

        if($request->isMethod('post')
            && $request->has('title')
            && $request->has('slug')) {

            $topic->title = $request->get('title');
            $topic->slug = $request->get('slug');
            $topic->save();

            if($request->has('items')) {
                $data = json_decode($request->get('items'));
                $topic->updateQuestions($data);
                $topic->save();
            }
        }

        return view('dashboard.topic.one')->with('topic', $topic);
    }

    /**
     * Topic questions data
     */
    public function data(Request $request, $id)
    {
        $topic = Topic::findOrFail($id);

        return response()->json(
            $topic->getJsonQuestions()
        );
    }
}
