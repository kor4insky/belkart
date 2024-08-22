$(document).ready(function() {

	$('.bx-nav-1-lvl-link[href="/rules.pdf"]').attr("target","_blank");

	$(".loginform input").click(function() {
		$(this).select();
	});

	$('input[name="phone"]').keyup(function() {
		if($(this).val()=="" || $(this).val()=="37") {
			$(this).val('375');
		}
	});

	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();    
		if (scroll <= 100) {
			$("#menu").removeClass("fixed");
		}else{
			$("#menu").addClass("fixed");
		}
	});

	$(".forgot").click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		$.ajax({
			url:"/ajax/sms.php",
			method: "post",
			data: {
				phone : $("#phone").val(),
				sign: $("#sign").val(),
			},
			beforeSend: function(res) {
				if($("#phone").val().length<12) {
					$(".res").html('Некорректный номер');
					return false;
				}
				$(".loginform").css("opacity","0.5");
			},
			success: function(res)
			{
				$(".forgot").hide();
				$(".loginform").css("opacity","1");
				$(".loginform .res").html(res);
			}
		});
	});

});