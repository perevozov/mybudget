<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use Request;

class ArticlesController extends Controller {

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
		Article::create([
			'title' => $request->get('title'),
			'body' => $request->get('body'),
			'published_at' => $request->get('published_at'),
		]);

		return redirect('articles');
	}
}
