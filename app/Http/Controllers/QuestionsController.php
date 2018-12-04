<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;
use App\Answer;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class QuestionsController extends Controller
{
    //Authenication
    public function __construct() {
        $this->middleware('auth');
    }


	public function index() {
		$questions = Question::all();

		return view('admin.index', compact('questions'));
	}

    public function view($id) {
        $question = Question::find($id);

        if($question) {
            $answers = Answer::where('question_id', $id)->get();

            return view('view.view-question', compact('question','answers'));
        }
 

        return Redirect::to('questions')->with('message', 'Question not found !');
    }


    public function viewQuestions() {
        $questions = Question::all();

        return view('view.view-questions', compact('questions'));
    }



	public function addForm() {
		return view('admin/add-question');
	}


    public function add() {
    	$validator = Validator::make(Input::all(), Question::$rules);

    	if($validator->passes()) {
    		$question = new Question;
    		$question->body = Input::get('body');
    		$question->save();

    		return Redirect::to('admin/questions')->with('message', 'Question Added.');
    	}
 
    	return Redirect::to('admin/questions')->with('message', 'Something went wrong :(')
    										  ->withErrors($validator)
    										  ->withInput();
    }


    public function delete() {
    	$id = Input::get('id');
    	$question = Question::find($id);

    	if($question) {
    		$question->delete();

    		return Redirect::to('admin/questions')->with('message', 'Question Deleted.');
    	}

    	return Redirect::to('admin/questions')->with('message','Invalid Question !!');
    }


}
