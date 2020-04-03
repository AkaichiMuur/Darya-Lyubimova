<?php

session_start();
require_once "connection.php"; //подключение

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="description.css">
	<title> КНИГА РЕЦЕПТОВ </title>	
</head>
<body>

<div class="header">
	<h1><a href="main.php"> КНИГА РЕЦЕПТОВ </a></h1>
</div>

<form class="add" method="GET">

	<?php
		$getId = $_GET['id'];
		
		$query = "SELECT 
						`id_dish`, `title_dish`, `description_dish`, `img_dish`, `cooking_time`, `training_level`, `cooking_difficulty` 
					FROM 
						`dishes` 
					WHERE 
						`id_dish` = '$getId'; ";
		$result = mysqli_query($link, $query) or die('Ошибка' . mysqli_error($link));
		$row = mysqli_fetch_assoc($result);
		
		// переменные из базы
		$title_dish = $row['title_dish'];
		$description_dish = $row['description_dish'];
		$img_dish = $row['img_dish'];
		$cooking_time = $row['cooking_time'];
		$training_level = $row['training_level'];
		$cooking_difficulty = $row['cooking_difficulty'];

		$selectCOOKING = "SELECT 
								`id_cooking`, `id_dish`, `id_stage`
							FROM 
								`cooking`  
							WHERE 
								`cooking`.`id_dish` = '$getId' 
							ORDER BY 
								`id_cooking` ASC ;";
		$resultSELECTcooking = mysqli_query($link, $selectCOOKING) or die('Ошибка' . mysqli_error($link));
		$rowSELECTcooking = mysqli_fetch_row($resultSELECTcooking);
		$id_stage = $rowSELECTcooking[2];
	
	?>			
	
    <div class="title_dish"> 
		<p type="text" class="title" name="title_dish"> <?php echo $title_dish; ?> </p>
		<img src="<?php echo $img_dish; ?>" type="button" class="pic_dish" name="img_dish">
		<p class="description" name="description_dish"> <?php echo $description_dish; ?> </p> 
	</div>

	<div class="inf">
        <h3> Время приготовления </h3>
		<p type="text" class="time" name="cooking_time"> <?php echo $cooking_time; ?> </p>
		
	  	<div class="select_div">
			<div class="select" name="select_one"> <?php echo $training_level; ?> </div>
			<div class="select" name="select_two"> <?php echo $cooking_difficulty; ?> </div>
		</div>
	</div>

    <div class="stages">

		<?php

			$selectSTAGE = "SELECT DISTINCT `cooking_stages`.`id_stage`, `cooking_stages`.`img_cooking_stage`, `cooking_stages`.`description_stage`, `cooking`.`id_stage`, `cooking`.`id_dish`
										FROM
											`cooking_stages`, `cooking`
										WHERE
											`cooking`.`id_dish` = '$getId'
										AND
											`cooking_stages`.`id_stage` = `cooking`.`id_stage`
										ORDER BY
											`cooking_stages`.`id_stage` ASC ;";
			$resultSELECTstage = mysqli_query($link, $selectSTAGE) or die('Ошибка' . mysqli_error($link));
			$rowsSELECTstage = mysqli_num_rows($resultSELECTstage);

			$img_cooking_stage = $rowSELECTstage['1'];
			$description_stage = $rowSELECTstage['2'];

			for ($i = 0 ; $i < $rowsSELECTstage ; ++$i) {
				$row_data = mysqli_fetch_row($resultSELECTstage);

				for ($j = 0 ; $j <= $row_data ; ++$j) {

					echo "<div class='stage'>";
						echo "<p class='description_stage' name='description_stage'> $row_data[2] </p>" ;
						echo "<img src='$row_data[1]' class='pic_add' name='img_cooking_stage'>";
					echo "</div>"; 
					break;
				}
			}
			if (empty($rowsSELECTstage)) {
				echo "<p class='none'> Этапы приготовления еще не добавлены. </p>";
			}

		?>

		<?php echo "<a href='add_stage.php?id=".$row['id_dish']."' class='add_button' name='add_button'> ДОБАВИТЬ ЭТАП </a>" ?>
		
	</div>

	<?php
		// очищаем результат
			mysqli_free_result($result);
	?>

</form>

</body>
</html>