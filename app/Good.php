<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\Countercache;

class Good extends Model
{
	use CounterCache;
	
	public $counterCacheOptions = [
		'Comment' => [
			'field' => 'goods_count',
			'foreignkey' => 'comment_id'
			]
		];
	
	protected $fillable = ['user_id', 'comment_id'];
	
	public function Comment()
	{
		return $this->belongsTo('App\Comment');
	}
	
	public function User()
	{
		return $this->belongsTo(User::class);
	}
}