<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlogs()
    {
        $blogs = Blogs::published()->orderByDesc('published_at')->simplePaginate(10);

        return view('/', compact($blogs));
    }

    public function getBlogsAndComments()
    {
        return view('/');
    }

    public function createComment(Request $request){
        $comment = Comment::create(array(
            'title' => Input::get('title'),
            'comment' => Input::get('comment'),
            'name' => Input::get('name')
        ));
        return redirect()->route('home')->with('success', 'Comment has been successfully added!');
    }

    public function editComment($id) {
        $comment = Comment::find($id);
        return view('Blog/edit_comment', ['comment' => $comment]);
    }

    public function deleteComment()
    {
        return view('/');
    }
}
