<?
$aMenuLinks = Array(
	Array(
		"Главная", 
		"/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Условия участия", 
		"/#rules", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Призы", 
		"/#prizes", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Победители", 
		"/winners/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Правила", 
		"/rules.pdf?v=".rand(), 
		Array(), 
		Array("target"=>"_blank", "class"=>"rules_btn"), 
		"" 
	),
	Array(
		"Вопрос-ответ", 
		"/#faq", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Вход / Регистрация", 
		"/login/", 
		Array(), 
		Array("class"=>"btn btn-default"), 
		"!\$USER->IsAuthorized()" 
	),
	Array(
		"Личный кабинет", 
		"/cabinet/", 
		Array(), 
		Array("class"=>"btn btn-default"), 
		"\$USER->IsAuthorized()" 
	)
);
?>