$(document).on ('click', '#campfire', function(event){
	updateCampfire();
});
$(document).on ('click', '.nav-link', function(event){
	menuButtonPressed(event.target.id);

});

$(document).on('click', '.buildBuilding', function(event){	
	if (event.target.id == 'createGranary'){
		var foodLimit = fetchFoodLimit();
		var granaryCost = fetchBuildingCost('granary');
		var numOfStone = fetch('Stone');		
		if (numOfStone<granaryCost){
			return;
		}
		update('Stone', numOfStone-granaryCost);
		updateBuildingCost('granary', granaryCost*10);
		updateFoodLimit(foodLimit*10);
		
		
	}
	refreshUI();
});
$(document).on ("click", ".clicker", function(event){
	labor.clickCounter++;
	var chanceToCreateNewPerson = fetchChanceToCreateNewPerson();
	labor.floorChance = 0;
	if (labor.clickCounter>=labor.people){
		 floorChance= (labor.clickCounter-labor.people);
	}
	

	if ($('#' + event.target.id).hasClass('makeStoneTool')){
		var typeOfTool = event.target.id.substring(4) + 's';
		createTool(typeOfTool);
	} else if ($('#' + event.target.id).hasClass('makeStoneWeapon')){
		var typeOfWeapon = event.target.id.substring(4) + 's';
		createWeapon(typeOfWeapon);
	} else if (event.target.id == 'work' || event.target.id=='start'){
		capital.clicks+=labor.workers;
	} else {
		var clickers;
		switch (event.target.id){
			case 'farm':
				clickers = 'Farmers';
				break;
			case 'chop':
				clickers ='Lumberjacks';
				break;
			case 'cutStone':
				clickers ='StoneCutters';
				break;
		}		
		var resourceType = fetchRelevantResources(clickers, 1);
		var numOfTools = fetchNumOfRelevantTools(clickers);
		useTools(clickers);
		capital[resourceType]+=labor[clickers]+numOfTools;
		if (resourceType=='Food'){
			checkFoodLimit(capital[resourceType], labor[clickers]);
		}		

	}
	if (event.target.id=='chop' && $('#campfire').hasClass('hidden')
	&& capital.wood>=labor.people){
		reveal('#campfire');
	}
	if (labor.people<fetchFoodLimit() && fetchRandomNum(1, chanceToCreateNewPerson-labor.campfireFloorChance)<=labor.floorChance){
		labor.campfireFloorChance=0;
		labor.workers++;
		labor.people++;
		labor.clickCounter=0;
	}
	console.log(labor);
	console.log(capital);
	if (!clickerTimeout>0){
		clickerTimeout = setTimeout(function(){
			$.ajax({
				headers:{'X-CSRF-TOKEN': 
						$('meta[name="csrf-token"]').attr('content')},
			  url: '/capital/2',
			  type: 'PUT',
			  data: "action=work",
			  success: function(data) {
			    refreshCapitalWindow();
			  }
			});
			clearTimeout(clickerTimeout);
			clickerTimeout=0;
		}, 2000);
	}
	updateNewPopProgress();
	refreshUI();
});

$(document).on ("click", ".hire", function(event){
	var numOfWorkers = fetch('Workers');
	if (numOfWorkers==0){
		return;
	}
	numOfWorkers--;
	var typeOfClicker = event.target.id.substring(3) + 's';
	var numOfThisClicker = fetch(typeOfClicker);
	numOfThisClicker++;
	updateClickers(typeOfClicker, numOfThisClicker);
	updateClickers('Workers', numOfWorkers);
	refreshUI();
});
$(document).on ("click", ".overseer", function(event){
	var numOfWorkers = fetch('Workers');
	if (numOfWorkers<2){
		return;
	}
	update('Workers', numOfWorkers-1);
	var typeOfOverseer = event.target.id.substring(7).slice(0, -1) +'Overseers';
	var numOfOverseer = fetch(typeOfOverseer);
	update(typeOfOverseer, numOfOverseer+1);
	refreshUI();
});
