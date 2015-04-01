<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

	public function store()
	{
		$input = Request::all();

		Article::create([
			'title' => Request::get('title'),
			'body' => Request::get('body'),
			'published_at' => Request::get('published_at'),
		]);

		return redirect('articles');
	}
}