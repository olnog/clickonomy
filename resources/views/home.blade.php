@extends('main')

@section('content')
	<div id='menu' class=''>
		<ul class="nav nav-tabs">
		  <li id='timeCaption'>
			<span id='timeRemaining'>
				<span id='minutesRemaining'>00</span>:<span 
				id='secondsRemaining'>30</span>
			</span>
		  </li>
		  <li class='nav-item hidden'>
			<a id='landMenuButton' class="nav-link" href="#">Land</a>
		  </li>
		  <li class="nav-item">
		    <a id='capitalMenuButton' class="nav-link active" href="#">Capital</a>
		  </li>
		  <li id ='laborOption' class="nav-item">
		    <a id='laborMenuButton' class="nav-link" href="#">
			    Labor:<span id='numOfPeople'>1</span>
				<span id='readyToHire' class='hidden'>*</span>
		    </a>
		  </li>
		</ul>
	</div><div id='land' class='bottomBar'>
	</div><div id='capital' class='bottomBar'>
	</div><div id='labor' class='hidden bottomBar'>
	</div>
@endsection
