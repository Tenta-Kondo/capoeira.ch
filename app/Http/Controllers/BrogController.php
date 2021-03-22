<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogapp;
use App\Http\Requests\BlogRequest;
use App\Models\Comment;

class BrogController extends Controller
{
    public function open(){
        return view("Home.open");
    }
    public function Home()
    {
        $thread = Blogapp::all();
        $comment = Comment::all();
        return view("Home.home", compact("thread","comment"));
    }
    public function detail($id)
    {
        $thread = Blogapp::find($id);
        $comment = (int)$id;
        $commentnumber = Comment::where("commentnumber", $comment)->get();
        return view("Home.detail", compact("thread","commentnumber"));
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
        Blogapp::destroy($id);
        return redirect("/top")->with("message", "削除しました");
    }
    public function edit($id)
    {
        $blog = Blogapp::find($id);
        return view("Home.edit", compact("blog"));
    }
    public function update(BlogRequest $request)
    {
        $id = $request->input("id");
        $title = $request->input("title");
        $contents = $request->input("contents");
        $username = $request->input("username");
        $blog = Blogapp::find($id);
        $blog->fill(["title" => $title, "contents" => $contents, "username" => $username]);
        $blog->save();
        return redirect("/home")->with("message", "更新しました");
    }
    public function comment(Request $request)
    {
        $username = $request->input("name");
        $comment = $request->input("comment");
        $commentnumber = $request->input("commentnumber");
        Comment::create(["name" => $username, "comment" => $comment, "commentnumber" => $commentnumber]);
        return redirect("/done");
    }
    public function done(){
        return view("Home.done");
    }
}
