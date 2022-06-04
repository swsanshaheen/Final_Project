<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\comment;
use App\Models\post;
use Illuminate\Http\Request;

class FrontSiteController extends Controller
{
    public function Show_home(){
//        $posts=post::all();
        $post_trend_1=post::latest()->limit(3)->get();
        $post_trend_2=post::limit(4)->get();
        $catagory=category::all();
        $views_post=post::orderBy('views','desc')->limit(7)->get();
        $letst_post=post::latest()->offset(2)->take(6)->get();
//        $fut_post=post::orderBy('views','asc')->latest()->limit(5)->get();
//        $catagory1=category::latest()->limit(4)->get();
//        $old_post=post::orderBy('created_at', 'asc')->limit(8)->get();
//        return view('frontsite.index',compact('post','post1','catagory1','letst_post','old_post','catagory','views_post','fut_post'));

        return view('frontsite.index',compact('post_trend_1','post_trend_2','catagory','views_post','letst_post'));
    }
    public function Show_categories(){
        $categories=category::paginate(4);
        $posts=post::all();
        return view('frontsite.categories',compact('categories','posts'));
    }
    public function Show_category($id){
        $categories=category::all();
        $category=category::find($id);
        $views_post=post::orderBy('views','desc')->limit(7)->get();
//        $id=$category->id;
        $posts=post::where('category_id',$id)->paginate();
//        dd($id);
        return view('frontsite.category',compact('categories','views_post','posts','category'));
    }
//    public function Show_contact(){
//        return view('frontsite.contact');
//    }
    public function Show_single($id){
        $categories=category::all();
//        dd($id);
        $post=post::find($id);
        $views_post=post::orderBy('views','desc')->limit(7)->get();
        $comments=comment::where('post_id',$id)->paginate();
//        dd($comments);
        $count=$comments->count();

        return view('frontsite.single',compact('count','id','views_post','categories','post','comments'));
    }
    public function sarch(Request $request){
        $serched=$request->sarch;
        $post=post::where('title', 'like', '%'.$serched.'%')->orwhere('body','like','%'.$serched.'%')->get();
        $category_resalt=category::where('title', 'like', '%'.$serched.'%')->orwhere('code','like','%'.$serched.'%')->get();
        $category=category::all();
        return view('frontsite.sarch',compact('category','post','serched','category_resalt'));
    }

    public function comment(Request $request)
    {
//        dd($request);
        $request->validate([
            'auther'=>'required |string ',
            'body'=>'required |string',
            'post_id'=>'required |integer '
        ]);

        $comment=new comment();
        $comment->auther=$request->auther;
        $comment->body=$request->body;
        $comment->post_id=$request->post_id;
//        dd($comment);
        $comment->save();
        return redirect()->back();
    }
}
