	<style type="text/css">
	#cookies{
			background: rgba(38,168,120,.8);
			backdrop-filter:blur(5px);
			-webkit-backdrop-filter:blur(5px);
			position: fixed;
			width: 50%;
			z-index: 999;
			color: #FFFFFF;
			text-align: center;
			bottom: 20px;
			left: 25%;
			padding: 15px;
			border-radius: 15px;
			backdrop-filter: blur(3px);
			-webkit-backdrop-filter:blur(3px);
			box-shadow:0 0 50px 5px rgba(251,225,85,.4);
		}
	.cookieLinks{
		color:#000000;
	}
	@media (max-width:1024px) {
		#cookies {
			width:95%;
			left:2.5%;
		}
	}
	</style>

	<script type="text/javascript">
		function hideCookie(){
				/* Create the expiry date (today + 1 year) */
				var CookieDate = new Date;
				CookieDate.setFullYear(CookieDate.getFullYear( ) +1);
				/* Set the cookie (acceptance of cookies usage) */
				document.cookie = 'infoCookies=true; expires=' + CookieDate.toGMTString( ) + ';';
				/* When "OK" clicked, hides this popup */
				document.getElementById("cookies").style.display = "none";		
		}	
	</script>


	<?php
		/* Check if the user has not visited yet this website  
		(or not accepted the cookies usage) */
		if(!isset($_COOKIE['infoCookies'])) 
		{	
			/* Insert below the link to cookies policy */	
			$cookiePolicy = "http://LINK TO COOKIES POLICY";

			echo " <div id='cookies'>Данный сайт использует файлы cookie с целью персонализации сервисов и повышения удобства пользованием веб-сайтом. Cookie представляют собой небольшие файлы, содержащие информацию о предыдущих посещениях сайта.<br/><br/>";

			/* if "OK" clicked, call the JS function to hide the popup and set the cookie */		
			echo" <a onClick='hideCookie();' class='cookieLinks btn btn-white btn-light black w-100'>ПОНЯТНО, ПРОДОЛЖИТЬ</a></div>";
		}
	
	?>
