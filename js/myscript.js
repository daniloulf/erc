var pLength = 7; //parties list length

$(document).ready(function() {
	$('#erc').change(function(){	
		if (validateForm()) {
			generateCampaign();
		}
	});
});

function generateCampaign() {
	//helpers
	var diff = 0;
	var invalidVoters = 0;
	
	//get values
    var citizensTotal = $('#citizens-total').val(); 
    var votingCitizens = $('#voting-citizens').val(); 
	var invalidVotes = $('#invalid-votes').val();
    var parties = new Array();
	
	/*CALC*/
	
	$('#voters').html(citizensTotal);
	var nonVoters = 100 - votingCitizens; 
	$('#non-voters').html(nonVoters);
	
	var nonVotersCitizens = Math.round(citizensTotal * nonVoters / 100);
	$('#non-voters-number').html(nonVotersCitizens);
	

	var stakeNonVoters = citizensTotal * nonVoters / 100;
	$('#stakeNonVoters').html(Math.round(stakeNonVoters)); 
	

	if (invalidVotes > 0) {
		invalidVoters = (citizensTotal - stakeNonVoters) * invalidVotes / 100;
		$('#invalid-voters').html(Math.round(invalidVoters));
	} else {
		$('#invalid-voters').html('0');
		invalidVoters = 0;
	}
	
	var actualVoters = citizensTotal - nonVotersCitizens;
	var actualInvalidVotes = actualVoters - invalidVoters;
	var actualResultWNV = new Array(); // %
	var actualResultWONV = new Array(); // %
	var percentValue_a = new Array(); //%
	var percentValue_b = new Array(); //%
	
	var actualResultRandom = new Array(); 
	actualResultRandom = splitNumberRandom((actualVoters - invalidVoters));
	
	//clean random numbers
	var arResult = arrayIntSum(actualResultRandom);
	if (arResult != (actualVoters - invalidVoters)) {
		var sum = actualVoters - invalidVoters;
		diff =  sum - arResult;
		actualResultRandom[RandomInt(pLength -1)] += diff;
	}
	
	for (i = 0; i < pLength; i++) {
		percentValue_a[i] = Math.round(actualResultRandom[i] * 100 / actualVoters); 
	}
	
	for (i = 0; i < pLength; i++) {
		percentValue_b[i] = Math.round(actualResultRandom[i] * 100 / citizensTotal); 
	}
	
	//write table
	for(i= 0; i < pLength; i++) {
		parties[i] = $('#party' + (i + 1)).val();
		
		//result without non-voters
		$('#p'+ (i + 1) + '_name').html(parties[i]);
		$('#p'+ (i + 1) + '_result').html(percentValue_a[i] + '%');
		$('#p'+ (i + 1) + '_number').html(Math.round(actualResultRandom[i]));
		
		//result with non-voters
		$('#p'+ (i + 1) + '_name_2').html(parties[i]);
		$('#p'+ (i + 1) + '_result_2').html(percentValue_b[i] + '%');
		$('#p'+ (i + 1) + '_number_2').html(Math.round(actualResultRandom[i]));
	}
	
	//show div
	$('.teaser').fadeOut(2000, function(){
		$('.result').fadeIn(5000, function() {});
	});
}

function RandomInt(max) {
	return Math.floor(Math.random() * Math.floor(max) - 1);
}

function validateForm(){
	//get values
    var citizensTotal = $('#citizens-total').val(); //number long
    var votingCitizens = $('#voting-citizens').val(); //number up to 100%
	var invalidVotes = $('#invalid-votes').val();
    var parties = new Array(); //min 3 letters up to max 6
		
	//citizens-total
	if (citizensTotal == '' || citizensTotal < 1000 || citizensTotal > 999999999) { 
		$('.error_msg').html('Die Anzahl der Gessamtbürger bitte prüfen!');
		return false;
	} else {
		$('.error_msg').html('');
	}
	
	//citizens-total
	if (invalidVotes == '' || invalidVotes > 100 || invalidVotes < 0) { 
		$('.error_msg').html('Ungültige Stimmen müssen in Prozent angegeben werden.');
		return false;
	} else {
		$('.error_msg').html('');
	}
	
	//votingCitizens 
	if (votingCitizens == '' || votingCitizens <= 0 || votingCitizens >= 100) {
		$('.error_msg').html('Die Anzahl der Wähler muss in Prozent angegeben werden.');
		return false;
	} else {
		$('.error_msg').html('');
	}
	
	//names
	for(i= 0; i < pLength; i++) {
		parties[i] = $('#party' + (i + 1)).val();
		
		//party names
		if (parties[i] == '' || parties[i].length < 3 || parties[i].length > 6) { // oder zeichenlänge größer als 6 oder kleiner als 3
			$('.error_msg').html('Der Parteiname muss mindestens 3 bis maximal 6 Buchstaben haben.');
			return false;
		} else {
			$('.error_msg').html('');
		}
	}
	return true;
}

function splitNumberRandom(mainnumber) {
	var splitnumbers = new Array();
	var num = 0;
	for (i = 0; i < pLength; i++) {
		if (mainnumber > 0 && i < pLength) {
			num = Math.floor(Math.random() * Math.floor(mainnumber - 1));
		}
		
		if (num == 0) {
			num = Math.floor(Math.random() * Math.floor(mainnumber - 1));
		}
		
		mainnumber = mainnumber - num;
		splitnumbers.push(num);
	}
	return splitnumbers;
}

function arrayIntSum(array) {
	var arraysum = 0;
	
	for (i = 0; i < array.length; i++) {
		arraysum += array[i];
	}
	
	return arraysum;
}