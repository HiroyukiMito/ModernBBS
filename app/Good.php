<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\Countercache;
use Illuminate\Support\Facades\Auth;

class Good extends Model
{
	
	protected $fillable = ['user_id', 'comment_id'];
	
	public function comment()
	{
		return $this->belongsTo('App\Comment');
	}
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}