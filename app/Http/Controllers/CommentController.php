<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Page;

class CommentController extends Controller
{
    public function add(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = $request->all();
        $page = Page::whereTitle($request->title)->first();
        $comment = new Comment();
        $comment->pagetitle = $request->pagetitle;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect($page->url);
    }
}
