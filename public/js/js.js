var flashingUI;
var clickerTimeout;
var timer;


$.getScript('js/building.js');
$.getScript('js/events.js');
$.getScript('js/capital.js');
$.getScript('js/labor.js');
$.getScript('js/ui.js');
var siteRoot = getBaseUrl();
var capital;
$.ajax({ url: siteRoot + 'capital/2', success: function(data) { capital = JSON.parse(data); console.log(capital);} })

var labor; 
$.ajax({ url: siteRoot + 'labor/2', success: function(data) { labor = JSON.parse(data); console.log(labor);} })
refreshCapitalWindow();
refreshLaborWindow();

function refreshCapitalWindow(){
	$.ajax({ url: siteRoot + 'capital', success: function(data) { $('#capital').html(data); } });
}
function refreshLaborWindow(){
	$.ajax({ url: siteRoot + 'labor', success: function(data) { $('#labor').html(data); } });
}
function automate(){
	var campfireBurning = isCampfireBurning();
	var listOfJobs = fetchListOfJobs('overseen');
	if (campfireBurning){
		var wood = fetch ('Wood');
		var numOfPeople = fetch('People');
		if (wood>0 && wood>=numOfPeople){
			wood-=numOfPeople;
			update('Wood', wood);
			var campfireFloorChance = fetchCampfireFloorChance();
			updateCampfireFloorChance(campfireFloorChance+1);
		} else {
			updateCampfire();
		}
	} 
	$.each(listOfJobs, function(i, job){
		var numOfJobOverseers = fetch(job + 'Overseers');	
		job = job + 's';
		if (numOfJobOverseers>0){
			var numOfClickers = fetch(job);
			var resourceType = fetchRelevantResources(job, 1);
			var numOfResources = fetch(resourceType);
			var numOfTools = fetchNumOfRelevantTools(job);
			var resourceProduction = numOfClickers * (1- (.1/numOfJobOverseers));
			if (numOfTools>0){
				resourceProduction = resourceProduction>numOfTools 
				? resourceProduction*2 : resourceProduction + numOfTools;
			}
			var resourceDelta = Math.trunc (resourceProduction);
			useTools(job);
			numOfResources+=resourceDelta;
			resourceDelta=resourceProduction-resourceDelta;
			if (resourceDelta<1){
				if(Math.random() * 1 <= resourceDelta){
					numOfResources++;
				}
			}
			if (resourceType=='Wood' && numOfResources>=fetch('People')){
				reveal('#campfire');
			} else if (resourceType=='Food'){
				numOfResources=checkFoodLimit(numOfResources, numOfClickers);
			} 


			update(resourceType, numOfResources);
		}
	});
	refreshUI();
}

function firstCharLC(str){
	return str.charAt(0).toLowerCase() + str.slice(1);
}


function fetch(what){
	return Number($('#numOf' + what).html());	
}
function fetchCampfireFloorChance(){
	return Number($('#campfireFloorChance').val());
}
function fetchChanceToCreateNewPerson (){
	return fetch('People')*2;
}



function fetchRandomNum (floor, ceiling){
	return Math.floor(Math.random() * ceiling) + floor;
}

function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}


function isCampfireBurning(){
	return $('#campfire').hasClass('on');
}

function startTimer (){
	var startingSeconds = 30;
	var startingMinutes = 0;
	$("#minutesRemaining").html(startingMinutes);
	$('#secondsRemaining').html(startingSeconds);
	return setInterval(function(){
		automate();
		updateNewPopProgress();
		var minutes = Number($("#minutesRemaining").html());
		var seconds = Number($("#secondsRemaining").html());
		seconds--;
		if (seconds<0){
			seconds=59;
			minutes--;
			if (minutes<0){
				feedPeople();	
				minutes=startingMinutes;
				seconds=startingSeconds;
	
			}
		}
		if (minutes<10){ 
			minutes= "0" + minutes;
		}
		if (seconds<10){
			seconds= "0" + seconds;
			if (fetch('Food')<fetch('People')){
				blink('#secondsRemaining', 'red');
				blink('#numOfFood', 'red');
			}
		}
		$("#minutesRemaining").html(minutes);
		$("#secondsRemaining").html(seconds);

	}, 1000);
}

function stopTimer(){
	hide ("#timeCaption");
	clearInterval(timer);
}
function update(what, n){
	$('#numOf' + what).html(n);
}
function updateCampfire(){
	isCampfireBurning() ? $('#campfire').removeClass('on') : $('#campfire').addClass('on');
}

function updateCampfireFloorChance(n){
	$('#campfireFloorChance').val(n);
}



