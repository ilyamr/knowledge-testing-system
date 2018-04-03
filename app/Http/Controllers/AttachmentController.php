<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Question;
use App\Topic;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Auth;

class AttachmentController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function upload(Request $request)
    {
        if(!$file = $request->file('image'))
            return false;

        $fileName = substr(md5(time()), 0, 8) . '.'
            . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

        $file->move(
            public_path('uploads'),
            $fileName
        );

        return response()->json([
            'url' => url('uploads/' . $fileName)
        ]);
    }
}
