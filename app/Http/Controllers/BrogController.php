<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blogapp;
use App\Models\Comment;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

use function Psy\debug;

class BrogController extends Controller
{
    public function opening()
    {
        return view("Home.opening");
    }
    public function Home()
    {
        $blog = Blogapp::all();

        return view("Home.home", compact("blog"));
    }
    public function detail($id)
    {
        $blog = Blogapp::find($id);
        $commentnumber = (int)$id;
        $commentdata = DB::table('Comment')->where('commentnumber', $commentnumber)->get();
        return view("Home.detail", compact("blog"), compact("commentdata"));
    }
    public function create()
    {
        return view("Home.create");
    }
    public function creating(BlogRequest $request)
    {
        $title = $request->input("title");
        $contents = $request->input("contents");


        $username = $request->input(("username"));

        Blogapp::create(["title" => $title, "contents" => $contents, "username" => $username]);
        return redirect("/top")->with("message", "投稿完了");
    }
    public function delete($id)
    {
        $threaddata = Blogapp::find($id);
        $name = $threaddata->username;
        if (Auth::user()->name === $name) {
            Blogapp::destroy($id);
            return redirect("/top")->with("message", "削除しました");
        } else {
            return redirect("/top")->with("message", "他者の作成したスレッドは
            削除できません");
        }
    }
    public function edit($id)
    {
        $thread = Blogapp::find($id);
        $name = $thread->username;
        if (Auth::user()->name === $name) {

            return view("Home.edit", compact("thread"));
        } else {
            return redirect("/top")->with("message", "他者の作成したスレッドは
          編集できません");
        }
        // $threaddata = Blogapp::find($id);
        // return view("Home.edit", compact("blog"));
    }
    public function update(BlogRequest $request)
    {
        $id = $request->input("id");
        $title = $request->input("title");
        $contents = $request->input("contents");

        $blog = Blogapp::find($id);
        $blog->fill(["title" => $title, "contents" => $contents]);
        $blog->save();
        return redirect("/top")->with("message", "更新しました");
    }
    public function comment(CommentRequest $request)
    {
        $name = $request->input("name");
        $comment = $request->input("comment");
        $commentnumber = $request->input("commentnumber");
        Comment::create(["name" => $name, "comment" => $comment, "commentnumber" => $commentnumber]);
        return view("Home.done");
    }
    // $comment=Comment::all();
}
