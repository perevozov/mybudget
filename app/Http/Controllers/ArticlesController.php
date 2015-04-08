<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use Request;

class ArticlesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	public function index()
	{
		$articles = Article::published()->orderBy('created_at', 'desc')->get();

		return view('articles.index', compact('articles'));
	}


	public function show($id)
	{
		$article = Article::findOrFail($id);

		return view('articles.show', compact('article'));
	}

	public function create()
	{
		return view('articles.create');
	}

	public function store(ArticleStoreRequest $request)
	{
		$article = new Article($request->only('title', 'body', 'published_at'));
		$article->user_id = \Auth::user()->id;
		$article->save();

		return redirect('articles');
	}

	public function edit($id)
	{
		$article = Article::findOrFail($id);

		return view('articles.edit', compact('article'));
	}

	public function update($id, ArticleStoreRequest $request)
	{
		$article = Article::findOrFail($id);

		$article->update($request->all());

		return redirect('articles');
	}


}
