<!DOCTYPE html>
<html>
<head>
	<title>Questions</title>
</head>
<body>
	
	<br>

	@if(Session::has('message'))
		<p style="background-color: rgb(144,195,212); padding: 3px 0px; display: inline;"> {{ Session::get('message') }} </p>
		<br><br>
	@endif
	

	@if(count($questions))
		<h2>List of Questions :</h2>
		<ol>
			@foreach($questions as $question)
				<li>
					{{ Html::link('../questions/'.$question->id, {{ $question->body }} , 
					 ['style'=>'text-decoration: none; color:black']) }}
				</li>
			@endforeach
		</ol>
		@else
		<ul>
			<li style="color:blue;">No Questions to display.</li>
		</ul>	
	@endif


</body>
</html>