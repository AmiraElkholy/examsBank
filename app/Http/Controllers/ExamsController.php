<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;

use App\Question;
use App\Answer;
use App\Exam;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

//use App\Http\Requests\ExamFormFirstRequest;



class ExamsController extends Controller
{
	
    public function generateExam() {

		$questions = Question::orderByRaw('RAND()')->take(5)->get()->toArray();

		if ($questions) {
			$exam = new Exam;
			$exam->first_question_id = $questions[0]['id'];
			$exam->first_question = $questions[0]['body'];
			$exam->second_question_id = $questions[1]['id'];
			$exam->second_question = $questions[1]['body'];
			$exam->third_question_id = $questions[2]['id'];
			$exam->third_question = $questions[2]['body'];
			$exam->fourth_question_id = $questions[3]['id'];
			$exam->fourth_question = $questions[3]['body'];
			$exam->fifth_question_id = $questions[4]['id'];
			$exam->fifth_question = $questions[4]['body'];
			$exam->save();

			return view('exam.new-exam', compact('exam'));
		}

		return "<h2>Questions Bank is Empty!!</h2><p>Please ask the admin to add questions first !   : )</p>";
   	}


    public function tryAgain() {
    	// $validator = Validator::make(Input::all(), Exam::$rules);
    	$exam_id = Input::get('exam_id');
    	$exam = Exam::find($exam_id);


    	if ($exam) {
    		$exam->first_answer = Input::get('answer1');
    		$exam->second_answer = Input::get('answer2');
    		$exam->third_answer = Input::get('answer3');
    		$exam->fourth_answer = Input::get('answer4');
    		$exam->fifth_answer = Input::get('answer5');
    		$exam->save();

    		//check validity
    		
    		if(Answer::find($exam->first_answer)->correctness) {
    			$exam->score += 2;
    			$exam->answered += 1;
    			$exam->first_question = "Well Done &#10003;";
    			$exam->save();
    		}
    		if(Answer::find($exam->second_answer)->correctness) {
    			$exam->score += 2;
    			$exam->answered += 1;
    			$exam->second_question = "Well Done &#10003;";
    			$exam->save();
    		}
    		if(Answer::find($exam->third_answer)->correctness) {
    			$exam->score += 2;
                $exam->answered += 1;
    			$exam->third_question = "Well Done &#10003;";
    			$exam->save();
    		}
    		if(Answer::find($exam->fourth_answer)->correctness) {
    			$exam->score += 2;
                $exam->answered += 1;
    			$exam->fourth_question = "Well Done &#10003;";
    			$exam->save();
    		}
    		if(Answer::find($exam->fifth_answer)->correctness) {
    			$exam->score += 2;
                $exam->answered += 1;
    			$exam->fifth_question = "Well Done &#10003;";
    			$exam->save();
    		}


    		return view('exam.second-try', compact('exam'));
    	}

    	return "Error";
    }

    public function calcScore() {
    	$exam_id = Input::get('exam_id');
    	$exam = Exam::find($exam_id);


    	if ($exam) {

    		//check validity

    		if(!($exam->first_question == "Well Done &#10003;")) {
    			$exam->first_answer = Input::get('answer1');
    			$exam->save();
    			if(Answer::find($exam->first_answer)->correctness) {
    				$exam->score += 1;
                    $exam->answered += 1;	
	    			$exam->first_question = "Well Done &#10003;";
	    			$exam->save();
    			}
    		}
    		if(!($exam->second_question == "Well Done &#10003;")) {
    			$exam->second_answer = Input::get('answer2');
    			if(Answer::find($exam->second_answer)->correctness) {
    				$exam->score += 1;
                    $exam->answered += 1;  
	    			$exam->first_question = "Well Done &#10003;";
	    			$exam->save();
    			}
    		}
    		if(!($exam->third_question == "Well Done &#10003;")) {
    			$exam->third_answer = Input::get('answer3');
    			if(Answer::find($exam->third_answer)->correctness) {
    				$exam->score += 1;
    			    $exam->answered += 1;
	    			$exam->first_question = "Well Done &#10003;";
	    			$exam->save();
    			}
    		}
    		if(!($exam->fourth_question == "Well Done &#10003;")) {
    			$exam->fourth_answer = Input::get('answer4');
    			if(Answer::find($exam->fourth_answer)->correctness) {
    				$exam->score += 1;
    			    $exam->answered += 1;
	    			$exam->first_question = "Well Done &#10003;";
	    			$exam->save();
    			}
    		}
    		if(!($exam->fifth_question == "Well Done &#10003;")) {
    			$exam->fifth_answer = Input::get('answer5');
    			if(Answer::find($exam->fifth_answer)->correctness) {
    				$exam->score += 1;
                    $exam->answered += 1;
	    			$exam->first_question = "Well Done &#10003;";
	    			$exam->save();
    			}
    		}


    		return view('exam.score', compact('exam'));
    	}

    	return redirect('/exam');
    }



}
