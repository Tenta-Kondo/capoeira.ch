<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogapp;
use App\Http\Requests\BlogRequest;

class BrogController extends Controller
{
    public function Home()
    {
        $blog = Blogapp::all();
        return view("Home.home", compact("blog"));
    }
    public function detail($id)
    {
        $blog = Blogapp::find($id);
        return view("Home.detail", compact("blog"));
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
        return redirect("/home")->with("message", "投稿完了");
    }
    public function delete($id)
    {
        Blogapp::destroy($id);
        return redirect("/home")->with("message", "削除しました");
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
}
