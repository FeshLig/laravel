<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'text'=>'required'
        ]);
        //$article = Article::FindOrFail($id);
        $comment = new Comment;
        $comment->title = request('title');
        $comment->text = request('text');
        $comment->user_id = Auth::id();
        $comment->article_id = request('article_id');
        $comment->save();
        return redirect()->route('article.show',['article'=>request('article_id')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //$comment =Comment::find($id);
        return view('comment.edit', ['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'title'=>'required',
            'text'=>'required'
        ]);
        $comment->title = request('title');
        $comment->text = request('text');
        //$comment->article_id = request('article_id');
        $comment->save();
        return redirect()->route('article.index');
       //return redirect()->route('article.show', ['comment'=>$comment->article_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        // $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('article.index');
    }
}
