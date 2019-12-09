
<input type='hidden' id='autoFocusAway' value='false'>
<input type='hidden' id='campfireFloorChance' value='{{$labor->campfireFloorChance}}'> 
<div id='workerCaption'>
	Workers:
	<span id='numOfWorkers'>{{$labor->workers}}</span>
</div><div id='farmerCaption' class='otherWorkers hidden'>
	Farmers:
	<span id='numOfFarmers'>{{$labor->farmers}}</span >
	<input type='button' id='addFarmer' class='hire hidden' value='+'>
	<span id='farmerOverseerCaption' class=''>
		[<span id='numOfFarmerOverseers'>{{$labor->farmerOverseers}}</span>]
	</span>
	<input type='button' id='overseeFarmers' class='overseer hidden ' value='&#8734'>
</div><div id='lumberjackCaption' class='otherWorkers hidden'>
	Lumberjacks:
	<span id='numOfLumberjacks'>{{$labor->lumberjacks}}</span>
	<input type='button' id='addLumberjack' class='hire' value='+'>
	<span id='lumberjackOverseerCaption' class='hidden'>
		[<span id='numOfLumberjackOverseers'>{{$labor->lumberjackOverseers}}</span>]
	</span>
	<input type='button' id='overseeLumberjacks' class='overseer hidden' value='&#8734'>
</div><div id='stoneCutterCaption' class='otherWorkers hidden'>
	Stone Cutters:
	<span id='numOfStoneCutters'>{{$labor->stonecutters}}</span>
	<input type='button' id='addStoneCutter' class='hire' value='+'>
	<span id='stoneCutterOverseerCaption' class='hidden'>
		[<span id='numOfStoneCutterOverseers'>{{$labor->stonecutterOverseers}}</span>]
	</span>
	<input type='button' id='overseeStoneCutters' class='overseer hidden' value='&#8734'>
</div><div id='toolmakerCaption' class='otherWorkers hidden'>
	Toolmaker:
	<span id='numOfToolmakers'>{{$labor->toolmakers}}</span>
	<input type='button' id='addToolmaker' class='hire' value='+'>
</div><div id='weaponmakerCaption' class='otherWorkers hidden'>
	Weaponmakers:
	<span id='numOfWeaponmakers'>{{$labor->weaponmakers}}</span>
	<input type='button' id='addWeaponmaker' class='hire' value='+'>
</div>
