<!DOCTYPE html>
<html>
<head>
	<title>Score</title>
</head>
<body>

	<br>

	<h1 style="text-align: center;color: red;">Congratulations</h1>

	<br><br>

	<h2 style="text-align: center;">Your Score is : <span style="color:green;">{{ $exam->score }}</span> </h2>

	<br>

	<h2 style="text-align: center;">Total Correct Answers : <span style="color:green;">{{ $exam->answered }}</span> </h2>

	{{ DB::table('exams')->truncate() }}

</body>	
</html>