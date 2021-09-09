<?php

namespace App\Http\Controllers;

use App\Http\Models\Pricess as ModelsPricess;
use Illuminate\Http\Request;
use App\Models\Blogapp;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Image;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\Auth;

use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Models\Pricess;
use SebastianBergmann\Environment\Console;

class BrogController extends Controller
{
    public function openviewUser()
    {
        $user = Auth::user();
        $adress = $user->email;
        $icon_image = Image::where("title", $adress)->first();
        $defaultCard2 = "";
        return view('Home.SiteTop', compact('user', 'icon_image'));
    }
    // public function openviewGuest()
    // {
    //     $user = Auth::user();
    //     $adress = $user->email;
    //     $image = Image::where("title", $adress)->first();
    //     $defaultCard2 = "";
    //     return view('Home.SiteTop-guest', compact('user','image'));
    // }

    public function Home(
        Request $request
    ) {
        $flash_msg = session()->get('flash');
        session()->forget("flash");
        $thread = Blogapp::orderBy('updated_at', 'desc')->paginate(8);
        $comment = Comment::all();
        $image = Image::all();

        $user = Auth::user();
        $adress = $user->email;
        $icon_image = Image::where("title", $adress)->first();


        return view("Home.home", compact("thread", "comment", "image", "flash_msg", "icon_image"));
    }
    public function sitetop()
    {
        $user = Auth::user();
        if ($user) {
            return redirect("/User");
        } else {
            return view("Home.SiteTop-guest");
        }
    }
    public function success()
    {
        return view("Home.success");
    }
    public function detail($id)
    {
        $thread = Blogapp::find($id);
        $num = (int)$id;
        $commentnumber = Comment::where("commentnumber", $num)->get();
        $title = $thread->title;
        $image = Image::where("number", $num)->get();
        $topimage = Image::where("title", $title)->get();

        $user = Auth::user();
        $adress = $user->email;
        $icon_image = Image::where("title", $adress)->first();
        
        return view("Home.detail", compact("thread", "commentnumber", "image", "topimage", "icon_image"));
    }
    public function create()
    {
        $user = Auth::user();
        $adress = $user->email;
        $icon_image = Image::where("title", $adress)->first();
        $thread = Blogapp::all();
        return view("Home.create", compact("thread", "icon_image"));
    }
    public function creating(Request $request)
    {

        $request->validate(
            [
                'title' => ['required', 'unique:threadtable', 'max:100'],
                'contents' => ['required'],
                'image' => ['file', 'image', 'mimes:png,jpeg']

            ]
        );
        $title = $request->input("title");
        $contents = $request->input("contents");
        $username = $request->input("username");
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
        $user = Auth::user();
        $adress = $user->email;
        $icon_image = Image::where("title", $adress)->first();
        if ($icon_image) {
            $filePath = $icon_image->file_path;
            Blogapp::create(["title" => $title, "contents" => $contents, "username" => $username, "IconString" => $filePath]);
            session()->put('flash', "投稿が完了しました");
            return redirect("/top");
        } else {
            Blogapp::create(["title" => $title, "contents" => $contents, "username" => $username]);
            session()->put('flash', "投稿が完了しました");
            return redirect("/top");
        }
    }
    // public function delete($id)
    // {
    //     Blogapp::destroy($id);
    //     $number = (int)$id;
    //     Image::where("number", $number)->delete();
    //     session()->put('flash', "投稿が完了しました");
    //     return redirect("/top");
    // }
    public function edit($id)
    {
        $user = Auth::user();
        $adress = $user->email;
        $icon_image = Image::where("title", $adress)->first();
        $blog = Blogapp::find($id);
        return view("Home.edit", compact("blog", "icon_image"));
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
        session()->put('flash', "投稿を更新しました");
        return redirect("/top");
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
    // public function subsc(Request $request)
    // {
    //     $user = $request->user();
    //     return view('subscription.subscription')->with([
    //         'intent' => $user->createSetupIntent()
    //     ]);
    // }
    public function search(Request $request)
    {
        $searchWord = $request->input("search-word");
        $comment = Comment::all();
        $image = Image::all();
        $searchThread = Blogapp::where('title', 'like', "%$searchWord%")->paginate(8);
        $Threadcount = Blogapp::where('title', 'like', "%$searchWord%")->count();
        $user = Auth::user();
        $adress = $user->email;
        $icon_image = Image::where("title", $adress)->first();
        return view("Home.search", compact("searchThread", "comment", "image", "Threadcount", "searchWord", "icon_image"));
    }
    public function icon(Request $request)
    {
        $request->validate([
            'image' => 'file|image|mimes:png,jpeg'
        ]);
        $icon_image = $request->file('image');
        if ($icon_image) {
            $image_path = $icon_image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 200,
                'height'    => 200
            ]);
            $user = Auth::user();
            Image::create([
                "file_path" => $logoUrl, "file_name" => $icon_image->getClientOriginalName(), "title" => $user->email
            ]);
            return redirect("/done");
        }
    }
}
