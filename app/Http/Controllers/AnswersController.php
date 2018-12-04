<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Answer;
use App\Question;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AnswersController extends Controller
{
    //Authenication
    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {  	
        $question = Question::find(Input::get('id'));

    	return view('admin.add-answers', compact('question'));
    }


    public function createAnswer() {
        $question_id = Input::get('id');

    	$validator = Validator::make(Input::all(), Answer::$rules);

    	if($validator->passes()) {
    		$answer = new Answer;
    		$answer->question_id = $question_id;
    		$answer->body = Input::get('body');
    		$answer->correctness = Input::get('correctness');
    		$answer->save();

    		return Redirect::to('/admin/questions')->with('message', 'Answer Added Successfully.');
    	}

    	return Redirect::to('/admin/questions')->with('message', 'Something went wrong with adding answer')
    										   ->withErrors($validator)
    										   ->withInput();
    }

    public function delete() {
        $id = Input::get('id');
        $answer = Answer::find($id);

        if($answer) {
            $answer->delete();

            return Redirect::to('admin/questions')->with('message', 'Answer Deleted.');
        }

        return Redirect::to('admin/questions')->with('message','Invalid Answer !!');
    }

}
