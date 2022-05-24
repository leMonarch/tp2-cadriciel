<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'path_fr',
        'path_en',
        'doc_title_fr',
        'doc_title_en',
        'date_publication',
        'created_at',
        'updated_at',
        'user_id'
    ];

    public function documentHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    // static public function selectUserDocument(){
    //     $lg = "_en";
    //     if(session()->has('locale') &&  session()->get('locale') == 'fr'){
    //         $lg = "_fr";
    //     }
    //     $query = Document::Select('id', 'name', 'date_article', 'user_id', DB::raw('(case when titre'.$lg.' is null then titre_en else titre'.$lg.' end) as titre, 
    //                                                                     (case when contenu'.$lg.' is null then contenu_en else contenu'.$lg.' end) as contenu'))
    //     ->get();
    //     return $query[0];
    // }

    static public function selectDocuments(){
        $lg = "_en";
        if(session()->has('locale') &&  session()->get('locale') == 'fr'){
            $lg = "_fr";
        }
        $query = Document::Select( 'documents.id', 'name', 'documents.created_at', 'documents.updated_at', 'user_id', DB::raw('(case when path'.$lg.' is null then path_en else path'.$lg.' end) as path, 
        (case when doc_title'.$lg.' is null then doc_title_en else doc_title'.$lg.' end) as doc_title'))
        ->join('users','documents.user_id', 'users.id')
        // ->hasOne('App\Models\User', 'id', 'user_id')
        ->get();
        return $query;
    }

    static public function selectMyDocuments(){
        $lg = "_en";
        if(session()->has('locale') &&  session()->get('locale') == 'fr'){
            $lg = "_fr";
        }
        $currentUsername = Auth::user()->name;
        $query = Document::Select( 'documents.id', 'name', 'documents.created_at', 'documents.updated_at', 'user_id', DB::raw('(case when path'.$lg.' is null then path_en else path'.$lg.' end) as path, 
        (case when doc_title'.$lg.' is null then doc_title_en else doc_title'.$lg.' end) as doc_title'))
        ->where('name',$currentUsername)
        ->join('users','documents.user_id', 'users.id')
        ->get();
        return $query;
    }

}
