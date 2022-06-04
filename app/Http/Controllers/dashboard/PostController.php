<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\comment;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function ORM(){
//        $categories=category::all();
//        dd($categories);
//}
    public function index()
    {
        $posts=post::paginate(10);
//        $posts=post::orderBy('created_at','desc')->get();
        return view('admin.post.index',compact('posts'));
//        $post=post::all();
//        dd($post->toArray());
//        $post=DB::table('posts')->get();
//        $post=DB::table('posts')->limit(5)->get();
//        $post=DB::table('posts')->where('views','=',7)->get();
//        $post=DB::table('posts')->where('views',7)->get();
//        dd($post);
//        foreach ($post as $p){
//            echo $p->title.$p->views.'<br>';
//        }
//        $posts=DB::table('posts')->select('title','views')->get();
//        dd($posts);
//        $posts=DB::table('posts')->pluck('title');
//        dd($posts);
//        $posts=DB::table('posts')->first('id',3);
//        $posts=DB::table('posts')->orderBy('id')->chunk(10,function ($items){
//            foreach ($items as $item){
//                echo $item->title." ".$item->views."<br>";
//            }
//            echo '<br>';
//        });
//        dd($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =category::all();
        return view('admin.post.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
         'title'=>'required |unique:posts|max:50|min:20 ',
         'body'=>'required |string',
         'category_id'=>'required |integer '
        ]);

        $post=new post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->category_id=$request->category_id;

        $post_image=$request->file('image');
        $file_name= $post->title.time().'.'.$post_image->extension();
        $post_image->move('post_images',$file_name);
        $post->feature_img=$file_name;
        $post->large_img=$file_name;

        $post->save();
        return redirect()->route('post.index')->with('success','the post has been added succsesfuly');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        $catagories=category::all();
        $comment=comment::where('post_id','=',$post->id)->get();
        return view('admin.post.view',compact('post','catagories','comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $categories =category::all();
        return view('admin.post.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $post->title=$request->title;
        $post->body=$request->body;
        $post->category_id=$request->category_id;
        $post->save();
        return redirect()->route('post.index')->with('success','the post has been edit succsesfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success','the post has been deleted succsesfuly');
    }
}
