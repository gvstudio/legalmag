$(function() {

		 //simple tabs
	$('#right-col .wrapper .head ul, #right-profile .wrapper .head ul').delegate('li:not(.active)', 'click', function() {
		$(this).addClass('active').siblings().removeClass('active')
			  .parents('.wrapper').find('section.body').hide().eq($(this).index()).fadeIn(150);
	})
		//jQuerry UI tabs
	$("#tabs, #company, #adCampage").tabs();
		//jQuerry UI custom select
 	//$('select#city_id, select.job-experience, select.job-region').selectmenu();
		//jQuerry UI slider
	$( ".question-amount .slider2").slider({
		value: 90,
		min: 90,
		max: 15000,
		step: 10,
		slide: function( event, ui ) {
			$( ".question-amount .amount2" ).val( ui.value );
		}
	});
	$( ".adsBlock .slider3").slider({
		value: 5,
		min: 5,
		max: 500,
		step: 0.1,
		slide: function( event, ui ) {
			$( ".adsBlock .amount3" ).val( ui.value );
		}
	});
	$( ".adsBlock .slider4").slider({
		value: 5,
		min: 5,
		max: 500,
		step: 0.1,
		slide: function( event, ui ) {
			$( ".adsBlock .amount4" ).val( ui.value );
		}
	});
	$( ".adsBlock .slider5").slider({
		value: 5,
		min: 5,
		max: 500,
		step: 0.1,
		slide: function( event, ui ) {
			$( ".adsBlock .amount5" ).val( ui.value );
		}
	});
	$( ".question-amount .amount2" ).val( $( ".question-amount .slider2" ).slider( "value" ) );
	$( ".adsBlock .amount3" ).val( $( ".adsBlock .slider3" ).slider( "value" ) );
	$( ".adsBlock .amount4" ).val( $( ".adsBlock .slider4" ).slider( "value" ) );
	$( ".adsBlock .amount5" ).val( $( ".adsBlock .slider5" ).slider( "value" ) );
		//jQuerry Placeholder
	$('input[placeholder], textarea[placeholder]').placeholder();
		//Fancybox2 modal windows
	$(".modal").fancybox({
		padding	: 0,
		margin		: 0,
		autoSize	: true,
		closeClick	: false,
		closeBtn	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
		//hacks
	$(".question:last-child, #center .wrapper .lawyer:last-child, .wrapper .left .shape table tr:last-child, .wrapper .left .shape2 table tr:last-child, .wrapper .specs .right .shape li:last-child, #services ul li:last-child").css('border-bottom','0');
	$('.buttonHolder4').find('a:last').css('margin-right', '0');
	$('#right-profile .wrapper .body .finance .statistic ul li:last-child').css('background', 'none');
	$('#right-profile .wrapper .personalInfo input.inviteEmpoyee:nth-child(3n+1)').css('margin', '0');

	var IE='\v'=='v';
	if(IE) {
		$('#right-profile .wrapper .body .finance .balanceOperation table tr:nth-child(2n) > td').css('background', '#f8f8f8');
	}
		//jQuery UI datepicker
	$( ".datepicker" ).datepicker({
            	showOn: "both",
            	buttonImage: "design/img/calendar.png",
            	buttonImageOnly: true
        	});
	$( ".datepicker" ).datepicker("option", "dateFormat", "dd-mm-yy");

});


