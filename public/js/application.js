function sprawdzPESEL(pesel) {
	if (pesel.length != 11) 
		return false;

	var wagi = new Array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);
	var suma = 0;

	for (i = 0; i < 10; i ++) 
		suma += pesel.charAt(i) * wagi[i];

	var liczba = 10 - suma % 10;

	if(liczba == 10)
		liczba = 0;

	if(pesel.charAt(10) == liczba)
		return true;

	return false;
}	

$('input').change(function() {
	if($(this).val() == '') {
		$(this).val('').addClass('validErr');
	} else {
		$(this).removeClass('validErr');
	}
});

$('#pola_kwota button').click(function() {
	switch($(this).attr('id')) {
		case 'kwota_minus':
			if($('#kwota_kredytu').val() > 1000)
				$('#kwota_kredytu').val(($('#kwota_kredytu').val() / 1) - 1000);
			break;
		case 'kwota_plus':
			$('#kwota_kredytu').val(($('#kwota_kredytu').val() / 1) + 1000);
	}
	
	return false;
});

$('#kwota_kredytu').change(function() {
	if($(this).val() < 0 || isNaN($(this).val()))
		$(this).val('').addClass('validErr');
	else
		$(this).removeClass('validErr');
});
		
$('#pesel').change(function() {
	if(!sprawdzPESEL($(this).val())) {
		$('#pesel').addClass('validErr');
	} else
		$('#pesel').removeClass('validErr');
	
});

$('#mobile').change(function() {
	var nr = $(this).val();
	var wzorzec = new RegExp("[0-9]+")
	var wynik = nr.match(wzorzec)

	if(!wynik) {
		$(this).addClass('validErr');
	} else
		$(this).removeClass('validErr');
	
});
		
$('label img.logo').click(function() {
	id = $(this).attr('id');
	id = id.replace('bank_', '');
	$(this).toggleClass('off_' + id);
	
	for(i = 1; i <= 6; i++) {
		if($('label img.logo').hasClass('off_' + i)) {
			$('.checked_' + i).hide();
		} else {
			$('.checked_' + i).show();
		}
	}
});

$('#show_rules').click(function() {
	$('#rules').show();
});

$('#rules strong').click(function() {
	$('#rules').hide();
});

$('input').change(function() {
	if($(this).hasClass('validErr')) {
		$(this).css('background', 'rgba(255,255,255, 0.84');
	} else {
		$(this).css('background', 'rgba(255,255,255, 0.84) url(http://www.kredyty-gotowkowe.portalbankowy.info/wniosek/new-form/images/checked.png) no-repeat 96% center');
	}
});


$('form').submit(function() {
	for(i = 0; i < 9; i++) {
		if(!$('input').eq(i).hasClass('validErr'))
			if($('input').eq(i).val() == '') {
				$('input').eq(i).addClass('validErr');
			} else
				$('input').eq(i).removeClass('validErr');
	
		if($('input').eq(i).hasClass('validErr')) {
			return false;
		}
	}
	
	return true;
});

//function changeBank() {
	//if($('#kwota_kredytu').val() >= 20000) {
		//$('#provident').attr('id', 'pko');
		//$('input[name="provident"]').attr('name', 'pko');
		//$('label[for="provident"]').attr('for', 'pko');
		//$('img[alt="provident"]').attr('alt', 'pko');
		//$('img[alt="provident"]').attr('src', 'new-form/images/logo/male_pko.gif');
	//}
//}

//$('#kwota_kredytu').change(function() {
	//changeBank();
//});

//$('#pola_kwota button').click(function() {
	//changeBank();
//});