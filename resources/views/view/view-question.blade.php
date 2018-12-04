<!DOCTYPE html>
<html>
<head>
	<title>View Question</title>
</head>
<body>

	<h2>Question: </h2>
	<h3>{{ $question->body }}</h3>

	<hr>

	<h2>Answers: </h2>
	<ul>
		@foreach ($answers as $answer) 
			<li style="color:{{ App\libs\Checker::displayClass($answer->correctness) }}"> 
				<h4> {{ $answer->body }} - 
				" {{ App\libs\Checker::display($answer->correctness) }} "</h4>
			</li>
		@endforeach
	</ul>

</body>
</html>












