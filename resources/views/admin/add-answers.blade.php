<!DOCTYPE html>
<html>
<head>
	<title>Add Answer</title>
</head>
<body>

	<h2>Add Answer to Question</h2>
	<p>{{ $question->body }}</p>

	<hr><br>

	{{ Form::open(['url'=>'admin/add-answers']) }} 
	{{ Form::hidden('id', $question->id) }}

	<p>
		{{ Form::label('Answer') }} <br>
		{{ Form::textarea('body') }}
	</p>

	<p>
		{{ Form::select('correctness', ['1' => 'Correct', '0' => 'Wrong']) }}
	</p>

	<p>
		{{ Form::submit('Add Answer!') }}
	</p>

		{{ Form::close() }}

</body>
</html>