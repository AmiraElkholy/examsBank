<!DOCTYPE html>
<html>
<head>
	<title>Try Again! :)</title>
</head>
<body>

	<h2>Answer the following questions :</h2>

	{{ Form::open(['url'=>'score']) }}
	{{ Form::hidden('exam_id', $exam->id) }}

	<ol>
		<li>
			{{ Form::label($exam->first_question) }} <br>
			<!-- {{ Form::hidden('id1', $exam->first_question_id) }} -->
			@if (!($exam->first_question == "Well Done &#10003;"))		
				@foreach (App\Question::find($exam->first_question_id)->answers()->orderBy(DB::raw('RAND()'))->get() as $answer)
						{{ Form::radio('answer1', $answer->id) }} {{$answer->body}} <br>
				@endforeach	
			@endif	
		</li>
		<br>
		<li>
			{{ Form::label($exam->second_question) }} <br>
			<!-- {{ Form::hidden('id2', $exam->second_question_id) }} -->
			@if (!($exam->second_question == "Well Done &#10003;"))			
				@foreach (App\Question::find($exam->second_question_id)->answers()->orderBy(DB::raw('RAND()'))->get() as $answer)
						{{ Form::radio('answer2', $answer->id) }} {{$answer->body}} <br>
				@endforeach	
			@endif	
		</li>
		<br>
		<li>
			{{ Form::label($exam->third_question) }} <br>
			<!-- {{ Form::hidden('id3', $exam->third_question_id) }} -->
			@if (!($exam->third_question == "Well Done &#10003;"))			
				@foreach (App\Question::find($exam->third_question_id)->answers()->orderBy(DB::raw('RAND()'))->get() as $answer)
						{{ Form::radio('answer3', $answer->id) }} {{$answer->body}} <br>
				@endforeach	
			@endif	
		</li>
		<br>
		<li>
			{{ Form::label($exam->fourth_question) }} <br>
			<!-- {{ Form::hidden('id4', $exam->fourth_question_id) }} -->
			@if (!($exam->fourth_question == "Well Done &#10003;"))			
				@foreach (App\Question::find($exam->fourth_question_id)->answers()->orderBy(DB::raw('RAND()'))->get() as $answer)
						{{ Form::radio('answer4', $answer->id) }} {{$answer->body}} <br>
				@endforeach	
			@endif	
		</li>
		<br>
		<li>
			{{ Form::label($exam->fifth_question) }} <br>
			<!-- {{ Form::hidden('id5', $exam->fifth_question_id) }} -->
			@if (!($exam->fifth_question == "Well Done &#10003;"))			
				@foreach (App\Question::find($exam->fifth_question_id)->answers()->orderBy(DB::raw('RAND()'))->get() as $answer)
						{{ Form::radio('answer5', $answer->id) }} {{$answer->body}} <br>
				@endforeach
			@endif		
		</li>
	</ol>

	<ul>
		{{ Form::submit('Calculate Score', ['style'=>'color:green;']) }}
	</ul>

	{{ Form::close() }}


</body>
</html>