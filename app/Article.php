<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	//use SoftDeletes;

	protected $fillable = [
		'title', 
		'body',
		'published_at'
	];

	protected $dates = [
		'deleted_at',
		'published_at'
	];

	public function setPublishedAtAttribute($value)
	{
		$this->attributes['published_at'] = Carbon::createFromFormat('d.m.Y', $value)->startOfDay();
	}

	public function scopePublished($query)
	{
		return $query->where('published_at', '<=', Carbon::now());
	}

	//

}
