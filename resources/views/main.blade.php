	<html>
	<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<style>
	#campfire.on{
	  color: green;
	}
	#campfire{
	  color: red;
	}
	.clicker {
 		 touch-action: manipulation;
	}	
	.menuButton:not(.active){
		color:blue;
	}
	.menuButton:not(.active):hover{
		text-decoration:underline;
		color:black;
		cursor:pointer;
	}
	div, .btn{
		font-size:75px;
	}
	.clicker{
		width:150;
	}
	.hidden{
		display:none;
	}
	table{
	}
	td{
		font-weight:bold;
		font-size:30px;
		width:75px;
		height:75px;
		text-align:center;
		border:15px dotted black;
	}
	.empty{
		background-color:grey;
	}
	.plains{
		background-color:lawngreen;
	}
	.forest{
		background-color:green;
	}
	.mountains{
		background-color:red;
	}
	.owned{
		border:15px solid gold;	
	}	
	</style>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
@yield('content')
	<script src='js/js.js'></script>

</html>
