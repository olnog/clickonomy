
<progress id='newPopProgress' value='0' max='100'></progress>
<span id='newPopCentCaption' class=''>
	(<span id='newPopCent'>{{$labor->newPopCent}}</span>%)
</span>

<input type='hidden' id='clickCounter' value='{{$labor->clickCounter}}'>
<div id='clicksCaption' >
	Clicks:<span id='numOfClicks'>{{$capital->clicks}}</span>
	<input id='work' class='worker clicker' type='button' 
	value='+1'>
</div><div id="foodCaption" class='hidden'>
	Food:
	<span id='numOfFood'>0</span>/<span id='foodLimit'>{{$capital->foodLimit}}</span>
	<input id='farm' class='farmer clicker hidden' type='button' value='+0'>
</div>
<div id="woodCaption" class='hidden'>
	Wood:
	<span id='numOfWood'>{{$capital->wood}}</span>
	<input id='chop' class='lumberjack clicker ' 
	type='button' 
	value='+0'>
	<input id='campfire' type='button' class='hidden' value='Campfire'>
</div>
<div id="stoneCaption" class='hidden'>
	Stone:
	<span id='numOfStone'>{{$capital->stone}}</span>
	<input id='cutStone' class='stoneCutter clicker' 
	type='button' 
	value='+0'>
	<input id='createGranary' class='buildBuilding hidden' type='button' value='&uarr; Food Limit'>
	<input id='granaryCost' type='hidden' value='100'>
</div><div id="toolsCaption" class='hidden'>
	<div>
		Tools
	</div><div>
		Stone Hoes:<span id='numOfStoneHoes'>{{$capital->stoneHoes}}</span>
		<input id='makeStoneHoe' class='makeStoneTool clicker stoneAge' type='button' 
 			value='+0'> 
	</div><div>
		Stone Axes:<span id='numOfStoneAxes'>{{$capital->stoneAxes}}</span>
		<input id='makeStoneAxe' class='makeStoneTool clicker stoneAge' type='button' 
 			value='+0'> 
	</div><div>
		Stone Pick Axes:<span id='numOfStonePickaxes'>{{$capital->stonePickaxes}}</span>
		<input id='makeStonePickaxe' class='makeStoneTool clicker stoneAge' type='button' 
 			value='+0'> 
	</div>			
</div><div id='weaponsCaption' class='hidden'>
	Stone Spears:
	<span id='numOfStoneSpears'>{{$capital->stoneSpears}}</span>
	<input id='makeStoneSpear' class='makeStoneWeapon clicker stoneAge' type='button' value='+0'>
</div>
