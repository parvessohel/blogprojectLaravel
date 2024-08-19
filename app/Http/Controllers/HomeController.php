<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;

use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {

            $post = Post::where('status', '=', 'active')->get();
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('home.homepage', compact('post'));
            } elseif ($usertype == 'admin') {
                return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        }
    }


    public function homepage()
    {

        $post = Post::where('status', '=', 'active')->get();

        return view('home.homepage', compact('post'));
    }

    public function post_details($id)
    {

        $post = Post::find($id);
        return view('home.post_details', Compact('post'));
    }


    public function create_post()
    {

        $categories = Category::all();

        return view('home.create_post')->with('categories', $categories);
    }


    public function user_post(Request $request)
    {


        $user = Auth()->user();

        $userid = $user->id;

        $username = $user->name;

        $usertype = $user->usertype;

        $post = new Post;

        $post->title = $request->title;

        $post->description = $request->description;


        $post->user_id = $userid;

        $post->name = $username;

        $post->usertype = $usertype;

        $post->status = ('inactive');




        $image = $request->image;


        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);

            $post->image = $imagename;
        }

        $post->save();

        Alert::Success('Congrats', 'You have added the data successfully');



        return redirect()->back();
    }


    public function my_posts()
    {

        $user = Auth::user();

        $userid = $user->id;

        $data = Post::where('user_id', '=', $userid)->get();




        return view('home.my_posts', compact('data'));
    }

    public function my_posts_del($id)
    {
        $data = Post::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Post deleted successfully');
    }


    public function post_update_page($id)

    {

        $data = Post::find($id);

        return view('home.post_update_page', compact('data'));
    }



    public function update_post_data(Request $request, $id)

    {
        $data = Post::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('message', 'Post Updated Successfully');
    }
}
