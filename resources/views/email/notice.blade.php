<!DOCTYPE html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
	</head>
	<style>
	body { 
		font-family: DejaVu Sans, sans-serif;
		font-size: 10px;
		max-width:500px;
	}
	.odobri{
		width:150px;
		height:40px;
		background-color:white;
		border: 1px solid rgb(0, 102, 255);
		border-radius: 5px;
		box-shadow: 5px 5px 8px #888888;
		text-align:center;
		padding:10px;
		color:black;
		font-weight:bold;
		font-size:14px;
		margin:15px;
		float:left;
		custor:pointer
	}
	.marg_20 {
		margin:20px 0;
	}
	</style>
	<body>
		<h4>Obavijest</h4>

		<div><b><a href="{{ route('admin.notices.show', $poruka_id) }}">{{ $subject }}</a></b></div>
		<div class="marg_20">
		
		</div>

	</body>
</html>
