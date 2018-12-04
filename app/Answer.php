<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;


class Answer extends Model
{
	protected $fillable = [
		'question_id', 'body', 'correctness' 
	];


	public static $rules = [
		'question_id'=>'integer',
		'body'=>'required',
		'correctness'=>'required|integer'
	];


    public function question() {
		return $this->belongsTo('App\Question');
	}
}
