<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('cat')){
            $cat = $request->input('cat');
            $posts = Post::where('category_id', $cat)->paginate(3);
            $posts->appends(['cat' => $cat]);
        }else{
            $posts = Post::paginate(3);
        }
        return view('forum.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('forum.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10',
            'content' => 'required|min:20',
        ]);
        if ($validator->fails()) {
            return redirect('forum/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $request->all();
        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');
        $post->user_id = Auth::id();
        $post->save();
        $request->session()->flash('message', 'Tema buvo sėkmingai sukurta!');
        return redirect(route('forum.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('forum.show', ['post' => $post ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        //tikrinam kad kitas vartotojas negaletu pakeisti ne savo posto
        if(auth()->user()->id !== $post->user_id){
            return redirect('/forum')->with('error', 'Unauthorized Page');
        }

        return view('forum.edit', ['post' => $post ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10',
            'content' => 'required|min:20',
        ]);
        if ($validator->fails()) {
            return back()->withInput()
                        ->withErrors($validator);
        }
        $post = Post::find($id);
        //tikrinam kad kitas vartotojas negaletu pakeisti ne savo posto
        if(auth()->user()->id !== $post->user_id){
            return redirect('/forum')->with('error', 'Unauthorized Page');
        }
        
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->save();
        $request->session()->flash('message', 'Tema buvo sėkmingai atnaujinta!');
        return redirect(route('forum.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //tikrinam kad kitas vartotojas negaletu istrinti ne savo posto
        if(auth()->user()->id !== $post->user_id){
            return redirect('/forum')->with('error', 'Unauthorized Page');
        }
        $post->delete();
        
        return redirect('/forum')->withMessage('Tema sėkmingai ištrinta!');
    }
}
