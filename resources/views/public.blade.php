<html>
	<head>
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
		border:10px;
	}
	td{
		width:30px;
		height:30px;
		text-align:center;
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
	.mountain{
		background-color:red;
	}
	</style>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
	<body>
		<div id='startMenu'>
			Clicks:0
			<input id='start' class='worker clicker' type='button' 
			value='+1'>
	</div><div id='menu' class='hidden'>
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
		  <li id ='laborOption' class="nav-item hidden">
		    <a id='laborMenuButton' class="nav-link" href="#">
			    Labor:<span id='numOfPeople'>1</span>
				<span id='readyToHire' class='hidden'>*</span>
		    </a>
		  </li>
		</ul>
	</div><div id='land' class='bottomBar'>
		<table id='landContainer' class='hidden'>
		
		</table>
	</div><div id='capital' class='hidden bottomBar'>
		<progress id='newPopProgress' value='0' max='100'></progress>
		<span id='newPopCentCaption' class=''>
			(<span id='newPopCent'>0</span>%)
		</span>

		<input type='hidden' id='clickCounter' value='0'>
		<div id='clicksCaption' >
			Clicks:<span id='numOfClicks'>0</span>
			<input id='work' class='worker clicker' type='button' 
			value='+1'>
		</div><div id="foodCaption" class='hidden'>
			Food:
			<span id='numOfFood'>0</span>/<span id='foodLimit'>10</span>
			<input id='farm' class='farmer clicker hidden' type='button' value='+0'>
		</div>
		<div id="woodCaption" class='hidden'>
			Wood:
			<span id='numOfWood'>0</span>
			<input id='chop' class='lumberjack clicker ' 
			type='button' 
			value='+0'>
			<input id='campfire' type='button' class='hidden' value='Campfire'>
		</div>
		<div id="stoneCaption" class='hidden'>
			Stone:
			<span id='numOfStone'>0</span>
			<input id='cutStone' class='stoneCutter clicker' 
			type='button' 
			value='+0'>
			<input id='createGranary' class='buildBuilding hidden' type='button' value='&uarr; Food Limit'>
			<input id='granaryCost' type='hidden' value='100'>
		</div><div id="toolsCaption" class='hidden'>
			<div>
				Tools
			</div><div>
				Stone Hoes:<span id='numOfStoneHoes'>0</span>
				<input id='makeStoneHoe' class='makeStoneTool clicker stoneAge' type='button' 
	     			value='+0'> 
			</div><div>
				Stone Axes:<span id='numOfStoneAxes'>0</span>
				<input id='makeStoneAxe' class='makeStoneTool clicker stoneAge' type='button' 
	     			value='+0'> 
			</div><div>
				Stone Pick Axes:<span id='numOfStonePickaxes'>0</span>
				<input id='makeStonePickaxe' class='makeStoneTool clicker stoneAge' type='button' 
	     			value='+0'> 
			</div>			
		</div><div id='weaponsCaption' class='hidden'>
			Stone Spears:
			<span id='numOfStoneSpears'>0</span>
			<input id='makeStoneSpear' class='makeStoneWeapon clicker stoneAge' type='button' value='+0'>
		</div>
	</div><div id='labor' class='hidden bottomBar'>
		<input type='hidden' id='autoFocusAway' value='false'>
		<input type='hidden' id='campfireFloorChance' value='0'> 
		<div id='workerCaption'>
			Workers:
			<span id='numOfWorkers'>1</span>
		</div><div id='farmerCaption' class='otherWorkers hidden'>
			Farmers:
			<span id='numOfFarmers'>0</span >
			<input type='button' id='addFarmer' 
			class='hire hidden' value='+'>
			<span id='farmerOverseerCaption' class=''>
				[<span id='numOfFarmerOverseers'>0</span>]
			</span>
			<input type='button' id='overseeFarmers' class='overseer hidden ' value='&#8734'>
		</div><div id='lumberjackCaption' class='otherWorkers hidden'>
			Lumberjacks:
			<span id='numOfLumberjacks'>0</span>
			<input type='button' id='addLumberjack' class='hire' value='+'>
			<span id='lumberjackOverseerCaption' class='hidden'>
				[<span id='numOfLumberjackOverseers'>0</span>]
			</span>
			<input type='button' id='overseeLumberjacks' class='overseer hidden' value='&#8734'>
		</div><div id='stoneCutterCaption' class='otherWorkers hidden'>
			Stone Cutters:
			<span id='numOfStoneCutters'>0</span>
			<input type='button' id='addStoneCutter' class='hire' value='+'>
			<span id='stoneCutterOverseerCaption' class='hidden'>
				[<span id='numOfStoneCutterOverseers'>0</span>]
			</span>
			<input type='button' id='overseeStoneCutters' class='overseer hidden' value='&#8734'>
		</div><div id='overseerCaption' class='otherWorkers hidden'>
			Overseers:
			<span id="numOfOverseers">0</span>
			<input type='button' id='addOverseer' 
			class='hire ' value='+'>
		</div><div id='toolmakerCaption' class='otherWorkers hidden'>
			Toolmaker:
			<span id='numOfToolmakers'>0</span>
			<input type='button' id='addToolmaker' class='hire' value='+'>
		</div><div id='weaponmakerCaption' class='otherWorkers hidden'>
			Weaponmakers:
			<span id='numOfWeaponmakers'>0</span>
			<input type='button' id='addWeaponmaker' class='hire' value='+'>
		</div>
	</div>

</body>

	<script src='js/js.js'></script>

</html>
