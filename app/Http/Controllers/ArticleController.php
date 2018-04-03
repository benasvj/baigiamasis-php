<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::all();
        return view('article', [
            "articles" => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'article_image' => 'image|nullable|max:1999',
        ]);
        if ($validator->fails()) {
            return redirect('/straipsniai')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $request->all();
        $article = new Article;
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        if($request->hasFile('article_image')){
            //failas su extensionu
            $filenameWithExt = $request->file('article_image')->getClientOriginalName();
            //tik failo vardas
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //tik extensionas
            $extension = $request->file('article_image')->getClientOriginalExtension();
            //failo vardas talpinimui
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //uploadint foto (siust i public folder)
            $path = $request->file('article_image')->storeAs('public/article_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $article->article_image=$fileNameToStore;
        if(auth()->user()->name !== "admin"){
            return redirect('/straipsniai')->with('error', 'Unauthorized Page');
        }
        $article->save();

        $request->session()->flash('message', 'Tema buvo sėkmingai sukurta!');
        return redirect('/straipsniai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        //tikrinam kad kitas vartotojas negaletu pakeisti ne savo posto
        if(auth()->user()->name !== "admin"){
            return redirect('/straipsniai')->with('error', 'Unauthorized Page');
        }
        return view('articleEdit', ['article' => $article ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //validation
         $validator = Validator::make($request->all(), [
            'title' => 'required|min:10',
            'content' => 'required|min:20',
            'article_image' => 'image|nullable|max:1999',
        ]);
        if ($validator->fails()) {
            return redirect('/straipsniai')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $request->all();
        $article = Article::find($id);
        if(auth()->user()->name !== "admin"){
            return redirect('/straipsniai')->with('error', 'Unauthorized Page');
        }
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        if($request->hasFile('article_image')){
            //failas su extensionu
            $filenameWithExt = $request->file('article_image')->getClientOriginalName();
            //tik failo vardas
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //tik extensionas
            $extension = $request->file('article_image')->getClientOriginalExtension();
            //failo vardas talpinimui
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //uploadint foto (siust i public folder)
            $path = $request->file('article_image')->storeAs('public/article_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $article->article_image=$fileNameToStore;
        $article->save();

        $request->session()->flash('message', 'Tema buvo sėkmingai atnaujinta!');
        return redirect('/straipsniai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        //tikrinam kad kitas vartotojas negaletu istrinti ne savo posto
        if(auth()->user()->name !== "admin"){
            return redirect('/straipsniai')->with('error', 'Unauthorized Page');
        }
        $article->delete();
        
        return redirect('/straipsniai')->withMessage('Tema sėkmingai ištrinta!');
    }
}
