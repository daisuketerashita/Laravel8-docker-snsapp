<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    //記事一覧表示
    public function index(){
        $articles = Article::all()->sortByDesc('created_at');

        return view('articles.index', ['articles' => $articles]);
    }

    //記事投稿画面表示
    public function create(){
        return view('articles.create');
    }

    //新規記事の登録処理
    public function store(ArticleRequest $request,Article $article){
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();

        return redirect()->route('articles.index');
    }

    //記事編集画面表示
    public function edit(Article $article){
        return view('articles.edit',['article' => $article]);
    }

    //記事の更新処理
    public function update(ArticleRequest $request,Article $article){
        $article->fill($request->all())->save();

        return redirect()->route('articles.index');
    }

    //記事の削除処理
    public function destroy(Article $article){
        $article->delete();

        return redirect()->route('articles.index');
    }

    //記事の詳細画面の表示
    public function show(Article $article){
        return view('articles.show',['article' => $article]);
    }
}
