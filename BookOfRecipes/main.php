<?php

require_once "connection.php"; //подключение

?>

<!DOCTYPE html>
<html>
<head>
	<title> КНИГА РЕЦЕПТОВ </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h1><a href="main.php"> КНИГА РЕЦЕПТОВ </a></h1>
		<a href="add_dish.php" class="button">Добавить блюдо</a>
	</div>

	<div class="filter">
		<div class="choice">
			<p class="choice_p">Сортировать:</p>

			<form class="selects" method="GET" action="">
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
				<input type="submit" value="Подобрать" class="knopka_button" name="submit">
			</form>
		</div>
	</div>

<div class="information">
	
	<?php
		$query = "SELECT 
						`id_dish`, `title_dish`, `img_dish`, `cooking_time`, `training_level`, `cooking_difficulty` 
					FROM 
						`dishes` ";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));	

		if($result) {
			$rows = mysqli_num_rows($result); // количество полученных строк
				
			if (isset($_GET['submit']) && isset($_GET['select_one']) && isset($_GET['select_two'])) {
				$one = $_GET['select_one'];
				$two = $_GET['select_two'];

				// СОРТИРОВКА
				$query_select = "SELECT 
										`id_dish`, `title_dish`, `img_dish`, `cooking_time`, `training_level`, `cooking_difficulty` 
									FROM 
										`dishes` 
									WHERE 
										`training_level`= '$one' 
									AND 
										`cooking_difficulty`= '$two'; ";

				$result_select = mysqli_query($link, $query_select) or die("Ошибка " . mysqli_error($link));
				$rows_select = mysqli_num_rows($result_select);

				for ($i = 0 ; $i < $rows_select ; ++$i) {
					$row_data = mysqli_fetch_row($result_select);

					for ($j = 0 ; $j <= $row_data ; ++$j) {
						echo " <a href='description.php?id=".$row_data[0]."' class='inf'>";
						echo "<img src='$row_data[2]' class='pic'>
							<div class='info'> 
								<p class='title'> $row_data[1] </p> 
								<p> <img src='/timer.png' class='timer'> $row_data[3] </p>
								<p> Уровень: $row_data[4] </p>
								<p> Сложность: $row_data[5] </p> 
							</div>";
						echo "</a>"; 
						break;
					}
				}	
				if (empty($rows_select)) {
					echo "<p class='none'> Ничего не найдено. </p>";
				}
			}
			else {
				for ($i = 0 ; $i < $rows ; ++$i) {
					$row_data = mysqli_fetch_row($result);

					for ($j = 0 ; $j <= $row_data ; ++$j) {
						echo " <a href='description.php?id=".$row_data[0]."' class='inf'>";
						echo "<img src='$row_data[2]' class='pic'>
							<div class='info'> 
								<p class='title'> $row_data[1] </p> 
								<p> <img src='/timer.png' class='timer'> $row_data[3] </p>
								<p> Уровень: $row_data[4] </p>
								<p> Сложность: $row_data[5] </p> 
							</div>";
						echo "</a>"; 
						break;
					}
				}	
			}
		}
		// очищаем результат
			mysqli_free_result($result);
	?>

</div>

</body>
</html>