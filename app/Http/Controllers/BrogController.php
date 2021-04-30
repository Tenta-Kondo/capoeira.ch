<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogapp;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Image;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\Auth;



class BrogController extends Controller
{
    public function open()
    {
        return view("Home.open");
    }
    public function Home()
    {
        $thread = Blogapp::paginate(8);
        $comment = Comment::all();
        $image = Image::all();
        return view("Home.home", compact("thread", "comment", "image"));
    }
    public function detail($id)
    {

        $thread = Blogapp::find($id);


        $num = (int)$id;
        $commentnumber = Comment::where("commentnumber", $num)->get();
        $title = $thread->title;

        $image = Image::where("number", $num)->get();

        $topimage = Image::where("title", $title)->get();
        return view("Home.detail", compact("thread", "commentnumber", "image", "topimage"));
    }
    public function create()
    {
        $thread = Blogapp::all();
        return view("Home.create", compact("thread"));
    }
    public function creating(BlogRequest $request)
    {

        $title = $request->input("title");
        $contents = $request->input("contents");
        $username = $request->input(("username"));
        $request->validate([
            'image' => 'file|image|mimes:png,jpeg'
        ]);

        $upload_image = $request->file('image');

        if ($upload_image) {
            $image_path = $upload_image->getRealPath();
            Cloudder::upload($image_path, null);

            $publicId = Cloudder::getPublicId();

            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 200,
                'height'    => 200
            ]);
            Image::create(["file_path" => $logoUrl, "file_name" => $upload_image->getClientOriginalName(), "title" => $title]);
        }


        Blogapp::create(["title" => $title, "contents" => $contents, "username" => $username]);
        return redirect("/top")->with("message", "投稿完了");
    }
    public function delete($id)
    {
        Blogapp::destroy($id);

        $number = (int)$id;
        Image::where("number", $number)->delete();
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
    public function comment(CommentRequest $request)
    {
        $username = $request->input("name");
        $comment = $request->input("comment");
        $commentnumber = $request->input("commentnumber");
        $commentID = $request->input("commentID");

        $request->validate([
            'image' => 'file|image|mimes:png,jpeg'
        ]);
        $upload_image = $request->file('image');
        if ($upload_image) {
            $image_path = $upload_image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();

            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 200,
                'height'    => 200
            ]);

            Image::create([
                "file_path" => $logoUrl, "file_name" => $upload_image->getClientOriginalName(), "number" => $commentnumber,
                "comment-img-number" => $commentID
            ]);
        }


        Comment::create(["name" => $username, "comment" => $comment, "commentnumber" => $commentnumber, "commentID" => $commentID]);

        return redirect("/done");
    }
    public function done()
    {
        return view("Home.done");
    }
    public function userpage()
    {
        return view("Home.user-page");
    }
    public function subscript()
    {
   
    
        return view('subscription.subscript');
    }
}
