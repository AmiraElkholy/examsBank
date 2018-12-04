<!DOCTYPE html>
<html>
<head>
	<title>Exam (1st Try)</title>
</head>
<body>

	<br>

	<!-- @if(Session::has('message'))
		<p style="color: red;"> {{ Session::get('message') }} </p>
		<hr>
		<br><br>
	@endif
 -->


	<h2>Answer the following questions, 'Choose' the correct answer only please !</h2>
	{{ Form::open(['url'=>'exam/try']) }}
	{{ Form::hidden('exam_id', $exam->id) }}

	<ol>
		<li>
			{{ Form::label($exam->first_question) }} <br>
			<!-- {{ Form::hidden('id1', $exam->first_question_id) }} -->
					
			@foreach (App\Question::find($exam->first_question_id)->answers()->orderBy(DB::raw('RAND()'))->get() as $answer)
					{{ Form::radio('answer1', $answer->id) }} {{$answer->body}} <br>
			@endforeach		
		</li>
		<br>
		<li>
			{{ Form::label($exam->second_question) }} <br>
			<!-- {{ Form::hidden('id2', $exam->second_question_id) }} -->
					
			@foreach (App\Question::find($exam->second_question_id)->answers()->orderBy(DB::raw('RAND()'))->get() as $answer)
					{{ Form::radio('answer2', $answer->id) }} {{$answer->body}} <br>
			@endforeach		
		</li>
		<br>
		<li>
			{{ Form::label($exam->third_question) }} <br>
			<!-- {{ Form::hidden('id3', $exam->third_question_id) }} -->
					
			@foreach (App\Question::find($exam->third_question_id)->answers()->orderBy(DB::raw('RAND()'))->get() as $answer)
					{{ Form::radio('answer3', $answer->id) }} {{$answer->body}} <br>
			@endforeach		
		</li>
		<br>
		<li>
			{{ Form::label($exam->fourth_question) }} <br>
			<!-- {{ Form::hidden('id4', $exam->fourth_question_id) }} -->
					
			@foreach (App\Question::find($exam->fourth_question_id)->answers()->orderBy(DB::raw('RAND()'))->get() as $answer)
					{{ Form::radio('answer4', $answer->id) }} {{$answer->body}} <br>
			@endforeach		
		</li>
		<br>
		<li>
			{{ Form::label($exam->fifth_question) }} <br>
			<!-- {{ Form::hidden('id5', $exam->fifth_question_id) }} -->
					
			@foreach (App\Question::find($exam->fifth_question_id)->answers()->orderBy(DB::raw('RAND()'))->get() as $answer)
					{{ Form::radio('answer5', $answer->id) }} {{$answer->body}} <br>
			@endforeach		
		</li>
	</ol>

	<ul>
		{{ Form::submit('Submit', ['style'=>'color:blue;margin-left:100px;']) }}
	</ul>

	{{ Form::close() }}


</body>
</html>