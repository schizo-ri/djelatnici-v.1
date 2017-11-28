<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Sentinel;
use App\Models\Comment;

class IndexController extends Controller
{
  /**
   * Set middleware to quard controller.
   *
   * @return void
   */
    public function __construct()
    {
     //   $this->middleware('sentinel.guest'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(12);
		return view('index')->with('posts', $posts); //drugi parametar - drugi način slanja
    }
	public function show($slug)
	{
		$post = Post::where('slug',$slug)->first();
		return view('post.show')->with('post', $post);
	}
	
	public function store(Request $request)
	{
		$user_id = Sentinel::getUser()->id;
		$input = $request->except(['_token']);
		
		$data = array(
			'user_id'  => $user_id,
			'post_id'    => $input['post_id'],
			'user_id'    => $user_id,
			'content'  => $input['content']
		);
		$comment = new Comment();
		$comment->saveComment($data);
		
		$message = session()->flash('success', 'You have successfully add a new comment.');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.posts.index')->withFlashMessage($message);
	}
}
