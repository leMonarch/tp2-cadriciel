<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titre_fr',
        'contenu_fr',
        'titre_en',
        'contenu_en',
        'date_article',
        'user_id',
    ];

    public function articleHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    static public function selectUserArticle(){
        $lg = "_en";
        if(session()->has('locale') &&  session()->get('locale') == 'fr'){
            $lg = "_fr";
        }
        $currentUsername = Auth::user()->name;
        $query = Article::Select('id', 'name', 'date_article', 'user_id', DB::raw('(case when titre'.$lg.' is null then titre_en else titre'.$lg.' end) as titre, 
                                                                        (case when contenu'.$lg.' is null then contenu_en else contenu'.$lg.' end) as contenu'))
        // ->where('name', $currentUsername)
        ->get();
        return $query[0];
    }

    static public function selectArticles(){
        $lg = "_en";
        if(session()->has('locale') &&  session()->get('locale') == 'fr'){
            $lg = "_fr";
        }
        $query = Article::Select( 'articles.id', 'name' , 'date_article', 'user_id', DB::raw('(case when titre'.$lg.' is null then titre_en else titre'.$lg.' end) as titre, 
                                                                        (case when contenu'.$lg.' is null then contenu_en else contenu'.$lg.' end) as contenu'))
        ->join('users','articles.user_id', 'users.id')
        // ->hasOne('App\Models\User', 'id', 'user_id')
        ->get();
        return $query;
    }

    static public function selectMyArticles(){
        $lg = "_en";
        if(session()->has('locale') &&  session()->get('locale') == 'fr'){
            $lg = "_fr";
        }
        $currentUsername = Auth::user()->name;
        $query = Article::Select('articles.id', 'name', 'date_article', 'user_id', DB::raw('(case when titre'.$lg.' is null then titre_en else titre'.$lg.' end) as titre, 
                                                                        (case when contenu'.$lg.' is null then contenu_en else contenu'.$lg.' end) as contenu'))
        ->where('name',$currentUsername)
        ->join('users','articles.user_id', 'users.id')
        ->get();
        return $query;
    }

}
