		<div class="container-fluid" id="bgfooter">
			<div class="container">
				<div class="row pt-5" style="align-items:center;">
					<div class="col-md-4 col-sm-2 offset-sm-0 offset-0 hotline_footer">
						<div class="tel">
							<img src="/images/tel.svg" class="img-fluid"/>
						</div>
						<div>
							Контактный телефон для справок<br/>
							по вопросам проведения рекламной игры:<br/>
						</div>
						<div style="grid-column:1/3;">
							<a href="tel:+375447917711">+375447917711</a>
						</div>
					</div>
					<div class="col-md-2 text-center d-none d-md-block">
						<img src="/img/heart.png" class="img-fluid text-center"/>
					</div>
					<div class="col-md-6 schedule_footer">
						<div style="grid-column:1/1">
							<img src="/images/clock.svg" class="img-fluid" />
						</div>
						<div style="grid-column:2/4">
							Время работы горячей линии
						</div>
						<div style="grid-column: 1/3;">
							<div class="time">
								с 10.00 до 18.00
							</div>
							понедельник - пятница
						</div>
						<div style="grid-column: 3/3;">
							<div class="time">
								с 13.00 до 16.00
							</div>
							суббота и воскресенье
						</div>
					</div>
					<div class="col-md-2 text-center d-block d-md-none">
						<img src="/img/heart.png" class="img-fluid text-center"/>
					</div>
				</div>
				<div class="row pt-2 pb-5" style="align-items:center">
					<div class="col-md-2 pb-3">
						<img src="/images/belkart.png" class="img-fluid"/>
					</div>
					<div class="col-md-2 pb-3">
						<img src="/images/belarusbank.png" class="img-fluid"/>
					</div>
					<div class="col-md-8 pb-3">
						<span>
							Рекламная игра «Опять 25!». Срок проведения рекламной игры (с учетом выдачи призов и публикации результатов): 24.06.2024-12.11.2024 г. Свидетельство о государственной регистрации № 4436 от 14.06.2024 г., выданное Министерством антимонопольного регулирования и торговли Республики Беларусь. Организатор  -  ООО «ЭфСиБи Бел», УНП 193185741
						</span>
						<hr/>
						<a href="/privacy.pdf?ver=<?=rand();?>" target="_blank" class="white d-block d-xl-inline-block" style="margin-right:10px;">Политика в отношении персональных данных</a>
						<a href="/copyrights.pdf?ver=<?=rand();?>" target="_blank" class="white">Права субъекта персональных данных</a>
					</div>
				</div>
			</div>
		</div>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
		<script src="https://use.fontawesome.com/bb2900c2da.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH;?>/js/custom.js?v=<?=rand();?>"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script>
			AOS.init({
				duration: 700,
				once: true,
				disable: 'mobile',
				offset: 60,
			});
		</script>

		<?if($_GET['formresult']=='addok'):?>
			<script>
				$(function() {
					alert("Спасибо! Ваше сообщение отправлено");
					(dataLayer = window.dataLayer || []).push({
					  'eCategory': 'button',
					  'eAction': 'submit_form',
					  'eLabel': '',
					  'event': 'feedback_form'
					  });
					setTimeout(function() {
						window.location.href="https://belkart-igra.by/";
					},1000);
				});
			</script>
		<?endif;?>

		</div><!-- id="feedback"-->
<?php include("/home/bitrix/www/cookie.php"); ?>
	</body>
</html>