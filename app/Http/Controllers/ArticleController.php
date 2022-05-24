<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::selectArticles();
        $user = Auth::user();
        return view('forum.index', ['articles'=>$articles,
                                    'username'=>$user->name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'titre_fr' => 'required|min:2|max:50',
            'contenu_fr' => 'required|min:2|max:191',
            'titre_en' => 'required|min:2|max:50',
            'contenu_en' => 'required|min:2|max:191',
        ]);

        $article = new Article;
        $article->fill($request->all());
        $article->user_id = Auth::user()->id;
        $article->save();
        
        return redirect('forum');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $articles = Article::selectMyArticles();
        $user = Auth::user();
        return  view ('forum.show', ['articles'=>$articles,
                                    'username' => $user->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return  view ('forum.edit', ['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        $request->validate([
            'titre_fr' => 'required|min:2|max:50',
            'contenu_fr' => 'required|min:2|max:191',
            'titre_en' => 'required|min:2|max:50',
            'contenu_en' => 'required|min:2|max:191',
        ]);

        $article->update([
            'titre_fr' => $request->titre_fr,
            'contenu_fr' => $request->contenu_fr,
            'titre_en' => $request->titre_en,
            'contenu_en' => $request->contenu_en,
        ]);

        $articles = Article::selectMyArticles();

        return  view ('forum', ['articles'=>$articles]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('forum'));
    }
}
