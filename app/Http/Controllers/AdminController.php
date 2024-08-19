<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function post_page()
   {
      $categories = Category::all();
      return view('admin.post_page')->with('categories', $categories);
   }


   public function add_post(Request $request)

   {
      $request->validate([
         'title' => 'required|max:255',
      ]);

      //   if ($validated) {
      //       return redirect()->back()->with('message', 'Post title already exists');
      //   }


      $user = Auth()->user();


      $userid = $user->id;
      $name = $user->name;
      $usertype = $user->usertype;


      $post = new Post;
      $post->title = $request->title;
      $post->description = $request->description;

      $post->status = 'active';
      $post->user_id = $userid;

      $post->name = $name;
      $post->category_id = $request->category_id;

      $post->usertype = $usertype;

      $image = $request->image;

      if ($image) {

         $imagename = time() . '.' . $image->getclientOriginalExtension();

         $request->image->move('postimage', $imagename);

         $post->image = $imagename;
      }
      $post->save();

      return redirect()->back()->with('message', 'Post Added Successfully');
   }


   public function show_post()
   {

      $post = Post::all();
      return view('admin.show_post', compact('post'));
   }


   public function delete_post($id)
   {
      $post = Post::find($id);

      $post->delete();
      return redirect()->back()->with('message', 'Post deleted successfully');
   }

   public function edit_page($id)

   {
      $post = Post::find($id);
      $categories = Category::all();
      return view('admin.edit_page', compact('post', 'categories'));
   }


   public function update_post(Request $request, $id)
   {
      // $validated = $request->validate([
      //    'title' => 'required|max:255',
      // ]);

      $data = Post::find($id);
      $data->title = $request->title;
      $data->description = $request->description;
      $data->category_id = $request->category_id;
      $image = $request->image;

      if ($image) {
         $imagename = time() . '.' . $image->getclientOriginalExtension();

         $request->image->move('postimage', $imagename);

         $data->image = $imagename;
      }

      $data->save();

      return redirect()->back()->with('message', 'Post was updated successfully');
   }



   public function accept_post($id)

   {

      $data = Post::find($id);
      $data->status = 'active';

      $data->save();

      return redirect()->back()->with('message', 'Post status changed to active');
   }


   public function reject_post($id)

   {

      $data = Post::find($id);

      $data->status = 'inactive';

      $data->save();

      return redirect()->back()->with('message', 'Post status changed to reject');
   }
}
