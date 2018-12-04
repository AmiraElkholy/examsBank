<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;

class Question extends Model
{
    //
	protected $fillable = [
		'body'
	];


	public static $rules = [
		'body'=>'required|min:10'
	];


	public function answers() {
		return $this->hasMany('App\Answer');
	}
}
