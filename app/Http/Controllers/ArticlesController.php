<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use App\Category;

use App\Tag;

use App\Image;

use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $articles = Article::Search($request->title)->orderBy('id','DESC')->paginate(4);

        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });

        //dd($articles);

        return view('admin.articles.index')->with('articles',$articles);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        //dd($categories);
        $tags  = Tag::orderBy('name','ASC')->pluck('name','id');
        return view('admin.articles.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {

        

        //MANIPULACION DE IMAGENES
       if($request->file('image'))
        {
            $file = $request->file('image');
            $name = 'blogprueba_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\images\articles';
            $file->move($path, $name);
        }
        //FIN DE MANIPULACION DE IMAGENES

        //Guardado de datos en Articles
        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;
        //dd($article);
        $article->save();

        //Guardado de tags en tabla pivote article id, tag id

                //dd($request->tags);

        $article->tags()->sync($request->tags);

        //Guardado de imagen en Images

        $image = new Image();
        $image->name = $name;
        $image->article()->associate($article);
        $image->save();

        flash('El articulo ha sido generado correctamente','success')->important();
        return redirect()->route('articles.index');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::find($id);      
        $categories = Category::orderBy('id','DESC')->pluck('name','id');
        $tags = Tag::orderBy('id','DESC')->pluck('name','id');
        $tags_selected = $articles->tags->pluck('id')->ToArray();
        //dd($tags_selected);

        return view('admin.articles.edit')->with('categories', $categories)->with('articles', $articles)->with('tags', $tags)->with('tags_selected',$tags_selected);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();

        $article->tags()->sync($request->tags);

        flash('El articulo ha sido editado exitosamente', 'success')->important();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        flash('El articulo ha sido eliminado exitosamente','success')->important();
        return redirect()->route('articles.index');
    }
}
