<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Romalytvynenko\EloquentTable\Engine\EloquentTable;

class UserController extends Controller
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
    public function users()
    {
        $table = new EloquentTable(User::class, [
            'columns' => [
                'id' => '#',
                'name' => 'Name',
                'intellectual' => 'Інтелектуальний режим',
                'actions' => 'Actions'
            ]
        ]);
        $table->columnOutput('intellectual', function($item){
            return $item->intellectual?'Увімкнено':'';
        });
        $table->columnOutput('actions', function($item){
            /**
             * @var $item Eloquent
             */
            $str = '<a href="/dashboard/users/'.$item->id.'/edit">edit</a> | ';
            $str .= '<a class="red" href="/users/topics/'.$item->id.'/delete">delete</a>';

            return $str;
        });
        return view('dashboard.user.list', [
            'table' => $table
        ]);
    }

    /**
     * Topic editing
     */
    public function edit(Request $request, $id)
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        if($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'role' => 'required'
            ]);
            $data = $request->all();
            if(!$request->has('intellectual')) {
                $data['intellectual'] = false;
            }
            $user->fill($data);

            if($user->save()) {
                return redirect()->to('dashboard/users/' . $id . '/edit');
            }
        }

        return view('dashboard.user.one')->with('user', $user);
    }
}
