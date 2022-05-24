<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::selectDocuments();
        $user = Auth::user();
        return view('doc.index', ['documents'=>$documents,
                                    'username'=>$user->name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doc.create');
        
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
            'doc_title_fr' => 'required|min:2|max:50',
            'doc_title_en' => 'required|min:2|max:50',
            'path_fr'      => 'required|file|mimes:pdf,doc,docx,txt,zip',
            'path_en'      => 'required|file|mimes:pdf,doc,docx,txt,zip',
        ]);

        $article = new Document;
        $article->fill($request->all());
        $article->user_id = Auth::user()->id;
        $article->save(); //Voir tutoriel pour store... comment obtenir le JSON de file
        
        return redirect('doc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $documents = Document::selectMyDocuments();
        $user = Auth::user();
        return  view ('doc.show', ['documents'=>$documents,
                                    'username' => $user->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return  view ('doc.edit', ['document'=>$document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $document->update([
            'doc_title_fr' => $request->doc_title_fr,
            'doc_title_en' => $request->doc_title_en,
            'path_fr'      => $request->path_fr,
            'path_en'      => $request->path_en
        ]);

        $documents = Document::selectMyDocuments();

        return  view ('doc', ['documents'=>$documents]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect(route('doc'));
    }
}
