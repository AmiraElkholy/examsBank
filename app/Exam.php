<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    protected $fillable = [
    	'first_question_id', 
    	'first_question', 
    	'first_answer',

    	'second_question_id', 
    	'second_question', 
    	'second_answer',

    	'third_question_id', 
    	'third_question', 
    	'third_answer',

    	'fourth_question_id', 
    	'fourth_question', 
    	'forth_answer',

    	'fifth_question_id', 
    	'fifth_question', 
    	'fifth_answer',

        'score',
        'answered'
    ];

//     public static $rules = [
//     	// 'first_question_id' => 'required|integer',
//     	// 'first_question' => 'required', 
//     	'first_answer' => 'required',

//     	// 'second_question_id' => 'required|integer',
//     	// 'second_question' => 'required', 
//     	'second_answer' => 'required',

//     	// 'third_question_id' => 'required|integer', 
//     	// 'third_question' => 'required', 
//     	'third_answer' => 'required',

//     	// 'fourth_question_id' => 'required|integer',
//     	// 'fourth_question' => 'required', 
//     	'forth_answer' => 'required',

//     	// 'fifth_question_id' => 'required|integer',
//     	// 'fifth_question' => 'required', 
//     	'fifth_answer' => 'required',
//     ];
}
