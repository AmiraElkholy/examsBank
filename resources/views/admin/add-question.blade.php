<!DOCTYPE html>
<html>
<head>
	<title>Add New Question</title>
</head>
<body>

	<h2>Add new Question</h2>
  	{{ Form::open(['url'=>'admin/add-question']) }}
	<p>
		{{ Form::label('Question') }}<br><br>
		{{ Form::textarea('body') }}
	</p>
	{{ Form::submit('Add Question') }}
	{{ Form::close() }}

	


</body>
</html>