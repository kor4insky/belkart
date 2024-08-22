$(document).ready(function() {

	$("#menu ul li a").click(function() {
		var divId = $(this).attr('href').replace("/","");
		 $('html, body').animate({
		  scrollTop: $(divId).offset().top - 101
		}, 100);
	});

	$(".loginform input").click(function() {
		$(this).select();
	});

	$("ul.bx-nav-list-1-lvl li").click(function() {
		$(".menu-toggle").click();
	});

	$(".rules_btn").attr("target","_blank");

	$('input[name="phone"]').keyup(function() {
		if($(this).val()=="" || $(this).val()=="37") {
			$(this).val('375');
		}
	});    

	$("#fixedheader").addClass("d-md-none");
	$("#fixedheader").hide();

	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();    
		if (scroll <= 20) {
			$("#fixedheader").addClass("d-md-none");
			$("#fixedheader").hide();
		}else{
			$("#fixedheader").show();
			$("#fixedheader").removeClass("d-md-none");
		}
	});

	$(".menu-toggle").click(function(e) {
		e.preventDefault();
		$(".bx-aside-nav").toggleClass("bx-opened");
		$("body").toggleClass("noscroll");
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
					$(".res").html('<div class="alert alert-danger w-100 d-block">Некорректный номер</div>');
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