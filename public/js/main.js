/**
 *
 *   Author: Anass BOUTAKAOUA
 *   URI: https://github.com/soyamore
 *   Email: anass@itcours.com
 *
 */


$(document).ready(function(){
	// Used variables for tests
	var i = 1;
	var time = $('#time').val();
	var timing = time;
	var timeOut;

	// set Time function
	var setTime = function(){
		timing--;
		console.log(timing);


		if(timing < 0)
			timing = 0;

		$('#timing').text(timing + 's');
		if(timing == 0){
			
			//$(document).on('trigger', 'click', )
			if(i >= $('#counter').val()){
				clearInterval(timeOut);
				$('input[type="submit"]').trigger('click');
				
			}else{
				timing = time;
				$('.next').trigger('click');
			}
		}
	}


	// Start quiz
	$(document).on('click', '#start-quiz', function(){
		$('#quiz-intro').hide('slow');
		$('#quiz-body').show('slow');

		setInterval(setTime, 1000);
	});

	// Next question
	$(document).on('click', '.next', function(){
		timing = time;
		// Check if last question
		if(i >= $('#counter').val()){
			$('.next').addClass('disabled');
			$('.next').attr('disabled');
		}else{
			++i;
			$('.question').hide('fast');
			$('#question-' + i).show('slow');

			if(i >= $('#counter').val())
				$('.next').addClass('disabled');

		}
		
	});

	timeInterval = function(){
		timing = time;
		setInterval(setTime, 1000);
	};



});