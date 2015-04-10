<?php namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use Request;
use DB;

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
		$tags = Tag::lists('name', 'id');
		return view('articles.create', compact('tags'));
	}

	public function store(ArticleStoreRequest $request)
	{
		DB::beginTransaction();
		$article = new Article($request->only('title', 'body', 'published_at'));
		$article->user_id = \Auth::user()->id;
		$article->save();
		$article->tags()->attach($request->input('tag_list'));
		DB::commit();

		return redirect('articles');
	}

	public function edit($id)
	{
		$article = Article::findOrFail($id);
		$tags = Tag::lists('name', 'id');

		return view('articles.edit', compact('article', 'tags'));
	}

	public function update($id, ArticleStoreRequest $request)
	{
		$article = Article::findOrFail($id);
		$article->update($request->all());

		$article->tags()->sync($request->input('tag_list'));

		return redirect('articles');
	}


}
