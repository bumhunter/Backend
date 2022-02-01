<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['expect'=> ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$articles = Article::all();
        //$articles = Article::orderBy('created_at', 'asc')->get();
        //$articles = Article::where('title', 'First article')->get();
//        $articles = DB::select('SELECT * FROM `articles`');
//        $articles = Article::orderBy('created_at', 'desc')->take(20)->get();
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:190|min:10',
            'text' => 'required|min:20',
            'main_image' => 'nullable|image|max:1999'
        ]);

        if($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();

            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            $ext = $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext."_".time().".".$ext;
            $path = $request->file('main_image')->storeAs('public/images', $image_name);
        } else
            $image_name = 'noimage.jpg';

        $article = new Article();
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->user_id = auth()->user()->id;
        $article->image = $image_name;
        $article->save();

        return redirect('/articles')->with('success', 'Статья была добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        if(auth()->user()->id != $article->user_id)
            return redirect('/articles')->with('error', 'Вы не авторизованы');

        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:190|min:10',
            'text' => 'required|min:20'
        ]);

        if($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();

            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            $ext = $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext."_".time().".".$ext;
            $path = $request->file('main_image')->storeAs('public/images', $image_name);
        }

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->text = $request->input('text');

        if($request->hasFile('main_image')) {
            if($article->image != "noimage.jpg")
                Storage::delete('public/images/'.$article->image);

            $article->image = $image_name;
        }

        $article->save();

        return redirect('/articles')->with('success', 'Статья была обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        if(auth()->user()->id != $article->user_id)
            return redirect('/articles')->with('error', 'Вы не авторизованы');

        if($article->image != "noimage.jpg")
            Storage::delete('public/images/'.$article->image);

        $article->delete();
        return redirect('/articles')->with('success', 'Статья была удалена');
    }
}
