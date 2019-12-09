function checkFoodLimit(numOfResources, numOfClickers){
	if (numOfResources==capital.foodLimit){
		return numOfResources;
	} else if (numOfResources + numOfClickers>capital.foodLimit){
		return capital.foodLimit;
	}
	return numOfResources;
}
function createTool(toolType){
	var toolDelta=labor.toolmakers;
	if (capital.wood<labor.toolmakers && capital.stone<labor.toolmakers){
		if (capital.wood==0 || capital.stone==0){
			return;
		}
		toolDelta = capital.wood>capital.stone ? capital.stone : capital.wood;
	} 
}
function createWeapon(weaponType){

	var weaponDelta=labor.weaponmakers;
	if (capital.wood<labor.weaponmakers && capital.stone<labor.weaponmakers){
		if (capital.wood==0 || capital.stone==0){
			return;
		}
		weaponDelta = capital.wood>capital.stone ? capital.stone : capital.wood;
	} 
}
function destroyResources(){
	var capitalArr = fetchListOfResources();
	$.each(capitalArr, function(i, resourceType){
		var numOfResources = fetch(resourceType);
		if (numOfResources>0){
			numOfResources = Math.floor(numOfResources/2);
			update(resourceType, numOfResources);
		}
	});
}
function fetchFoodLimit(){
	return Number($('#foodLimit').html());
}
function fetchListOfResources(){
	return ['Clicks', 'Wood', 'Food', 'Stone', 'StoneSpears', 'StoneAxes', 'StonePickaxes', 'StoneHoes'];
}
function fetchNumOfRelevantTools(clickers){
	var toolType = fetchRelevantToolType(clickers );
	var numOfTools = fetch(toolType);
	var numOfClickers = fetch(clickers);
	return numOfTools>=numOfClickers ? numOfClickers : numOfTools;
}
function fetchRelevantResources(clicker, firstUC){
	switch(clicker){
		case 'Farmers':
			capital = 'food';
			break;
		case 'Lumberjacks':
			capital='wood';
			break;
		case 'StoneCutters':
			capital='stone';
			break;
		case 'Toolmakers':
			capital='tools';
			break;
		case 'Weaponmakers':
			capital='weapons';
			break;
		case 'Workers':
			capital='clicks';
			break;
	
	}
	return firstUC ? capital.charAt(0).toUpperCase() + capital.slice(1) : capital;
}
function fetchRelevantToolType(clickers){
	var toolType;
	switch(clickers){
		case 'Farmers':
			toolType='StoneHoes';
			break;
		case 'Lumberjacks':
			toolType='StoneAxes';
			break;
		case 'StoneCutters':
			toolType='StonePickaxes';
			break;
	}
	return toolType;
}
function updateFoodLimit(n){
	$('#foodLimit').html(n);
	
}
function useTools(laborType){
	var toolType = fetchRelevantToolType(laborType);
	var numOfRelevantTools = capital[toolType];
	if (labor[laborType]<capital[toolType]){
		numOfRelevantTools=labor[laborType];
	}
	if (capital[toolType]==0){
		return;
	}
	var numOfDestroyedTools=0;
	for (var i=0; i<numOfRelevantTools; i++){
		var randNum = fetchRandomNum(1, 10);
		if (randNum==1){
			numOfDestroyedTools++;
		}
	}
	capital[toolType]-=numOfDestroyedTools;
}