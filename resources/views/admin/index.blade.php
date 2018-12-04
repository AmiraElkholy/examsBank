<!DOCTYPE html>
<html>
<head>
	<title>Questions List</title>
</head>
<body>
	
	<br>

	@if(Session::has('message'))
		<p style="background-color: rgb(144,195,212); padding: 3px 0px; display: inline;"> {{ Session::get('message') }} </p>
		<br><br>
	@endif

	
	@if($errors->has())
		<p style="color:grey;">The following errors has occured: </p>

		<ul>
			@foreach($errors->all() as $error) 
			<li style="color:red;">{{ $error }}</li>
			@endforeach
		</ul>

		<hr>
		<br><br>
	@endif

	

	@if(count($questions))
		<h2>List of Questions :</h2>
		<ol>
			@foreach($questions as $question)
				<li>
					<h4>
						<a style="text-decoration: none; color:black;" href="../questions/{{ $question->id }}">{{ $question->body }}</a> 
					<h4> 

					<div style="margin-top: -10px;width: 600px;">

						{{ Form::open(['url'=>'admin/questions/delete', 'style'=>'display:inline;float:right;']) }}
						{{ Form::hidden('id', $question->id) }}
						{{ Form::submit('delete', ['style'=>'color:red;']) }}
						{{ Form::close() }} 

						{{ Form::open(['url'=>'admin/add-answers', 'method'=>'get', 'style'=>'display:inline;float:right;margin-right:10px;']) }}
						{{ Form::hidden('id', $question->id) }}
						{{ Form::submit('Add Answer', ['style'=>'color:blue;']) }}
						{{ Form::close() }} 
						
					</div>

					<br>
					<ul>
						@foreach($question->answers()->get() as $answer) 
							<li>
								<div style="color:{{ App\libs\Checker::displayClass($answer->correctness) }};display: inline;"> 
									<h5 style="display: inline;margin-right: 10px;"> {{ $answer->body }} - 
									" {{ App\libs\Checker::display($answer->correctness) }} "</h5>
								</div>

								{{ Form::open(['url'=>'admin/delete-answer', 'method'=>'get', 'style'=>'display:inline;)']) }}
								{{ Form::hidden('id', $answer->id) }}
								{{ Form::submit('x', ['style'=>'color:red;border-radius:200%']) }}
								{{ Form::close() }}

							</li>
					@endforeach
					</ul>
					
				</li>
			@endforeach
		</ol>

		<hr style="width:600px;float: left;margin-left: 15px;">
		@else
		<ul>
			<li style="color:blue;">No Questions to display.</li>
		</ul>	
	@endif

	

	<br><br>

	{{Html::link('/admin/add-question','Add Some !',['style'=>'padding-left:10px;'])}}

</body>
</html>