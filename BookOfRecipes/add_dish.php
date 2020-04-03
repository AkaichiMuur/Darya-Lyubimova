<?php

session_start();
require_once "connection.php"; //подключение

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="add.css">
	<title> КНИГА РЕЦЕПТОВ </title>	
</head>
<body>

<div class="header">
	<h1><a href="main.php"> КНИГА РЕЦЕПТОВ </a></h1>
</div>

<form class="add" method="POST">

	<?php
        if (isset($_POST['save'])) {

			//переменные с формы
			$title_dish = $_POST['title_dish'];
			$img_dish_input = $_POST['img_dish_input'];
			$description_dish = $_POST['description_dish'];
			$cooking_time = $_POST['cooking_time'];
			$training_level = $_POST['select_one'];
			$option_one = $_POST['option_one'];
			$cooking_difficulty = $_POST['select_two'];
			$option_two = $_POST['option_two'];
			$ingredients = $_POST['ingredients'];
			$description_stage = $_POST['description_stage'];
			$img_stage_input = $_POST['img_stage_input'];
			
			// количество полученных строк
			$title_dish_num = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `dishes` WHERE `title_dish` = '$title_dish' ")); 
			
			// ЕСЛИ НЕ СУЩЕСТВУЕТ ТАКОГО НАЗВАНИЯ
			if($title_dish_num <= 0) {
			
				$insertDISH = "INSERT INTO 
											`dishes` (`id_dish`, `title_dish`, `img_dish`, `description_dish`, `cooking_time`, `training_level`, `cooking_difficulty`) 
									VALUES 
											(NULL, '$title_dish', '$img_dish_input', '$description_dish', '$cooking_time', '$training_level', '$cooking_difficulty');";
				$resultDISH = mysqli_query($link, $insertDISH) or die('Ошибка' . mysqli_error($link));

			}
		}
    ?>


	<div class="title_dish"> 
		<input type="text" class="title" placeholder="ВВЕДИТЕ НАЗВАНИЕ БЛЮДА" name="title_dish" required>
		<img type="button" class="pic_dish" name="img_dish">
		<input type="text" placeholder="ВСТАВЬТЕ ССЫЛКУ НА КАРТИНКУ" class="pic_dish_input" name="img_dish_input" required>
		<textarea class="description" placeholder="ВВЕДИТЕ ОПИСАНИЕ БЛЮДА (не обязательно)" name="description_dish"></textarea> 
	</div>

	<div class="inf">
        <h3> Время приготовления</h3>
		<input type="text" class="time" placeholder="время" name="cooking_time" required>
		
	  	<div class="select_div">
			<select class="select" name="select_one"> 
				<option disabled>по уровню подготовки</option>
				<option name="option_one" value="Начинающий">Начинающий</option>
				<option name="option_one" value="Любитель">Любитель</option>
				<option name="option_one" value="Профессионал">Профессионал</option>
			</select>

			<select class="select" name="select_two">
				<option disabled>по сложности приготовления</option>
				<option name="option_two" value="Лёгкий">Лёгкий</option>
				<option name="option_two" value="Средний">Средний</option>
				<option name="option_two" value="Сложный">Сложный</option>
			</select>
		</div>
	</div>

<!-- КНОПКА "СОХРАНИТЬ" -->
	<div class="stages">
		<input type="submit" value="СОХРАНИТЬ" class="save" name="save">
	</div>

	<?php 
		//закрываем подключение
        mysqli_close($link);
	?> 

</form>

	<script type='text/javascript'> 

	// Получение картинки в реальном времени
        document.querySelector('input.pic_dish_input').addEventListener('input', function() 
        { 
            document.querySelector('.pic_dish').src = document.querySelector('input.pic_dish_input').value; 
		}); 
	</script>

</body>
</html>