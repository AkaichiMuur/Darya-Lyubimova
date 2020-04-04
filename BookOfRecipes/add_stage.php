<?php
session_start();
require_once "connection.php"; //подключение

$getId = $_GET['id'];

//переменные с формы
$description_stage = $_GET['description_stage'];
$img_stage_input = $_GET['img_stage_input'];

$query = "SELECT 
				`id_dish`, `title_dish`, `description_dish`, `img_dish`, `cooking_time`, `training_level`, `cooking_difficulty` 
			FROM 
				`dishes` 
			WHERE 
				`id_dish` = '$getId'; ";
$result = mysqli_query($link, $query) or die('Ошибка' . mysqli_error($link));
$row = mysqli_fetch_row($result);
$title_dish = $row[1];

if(isset($_GET['save'])) 
{

	$insertSTAGE = "INSERT INTO 
							`cooking_stages` (`id_stage`, `img_cooking_stage`, `description_stage`)  
						VALUES 
							(NULL, '$img_stage_input', '$description_stage');";
	$resultSTAGE = mysqli_query($link, $insertSTAGE) or die('Ошибка' . mysqli_error($link));

	$selectSTAGE = "SELECT 
							* 
						FROM 
							`cooking_stages` 
						ORDER BY 
							`id_stage` DESC ;";
	$resultSELECTstage = mysqli_query($link, $selectSTAGE) or die('Ошибка' . mysqli_error($link));
	$rowSELECTstage = mysqli_fetch_row($resultSELECTstage);
	$elementSTAGE = $rowSELECTstage[0];

	$insertCOOKING = "INSERT INTO 
								`cooking` (`id_cooking`, `id_dish`, `id_stage`) 
							VALUES 
								(NULL, '$getId', '$elementSTAGE');";
	$selectCOOKING = "SELECT 
							* 
						FROM 
							`cooking` ;";
	$resultSELECTcooking = mysqli_query($link, $selectCOOKING) or die('Ошибка' . mysqli_error($link));

	$resultCOOKING = mysqli_query($link, $insertCOOKING) or die('Ошибка' . mysqli_error($link));
	header("Location: description.php?id=".$getId);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="add.css">
	<title> КНИГА РЕЦЕПТОВ</title>	
</head>
<body>

<div class="header">
	<h1><a href="main.php"> КНИГА РЕЦЕПТОВ </a></h1>
	<a href="main.php" class="button"> Главная </a>
</div>

<form class="add" method="GET" id="form">
 
	<div class="stages">

		<?php
			echo "<div class='title_dish_echo'>";
				echo "<p type='text' class='title_echo' name='title_dish'> $title_dish </p>";
			echo "</div>";
		?> 

		<div class="stage">
			<textarea class="description_stage" placeholder="ДОБАВИТЬ ЭТАП ПРИГОТОВЛЕНИЯ" required name="description_stage"></textarea> 
			<img class="pic_add">
		</div>
		<input type="text" placeholder="ВСТАВЬТЕ ССЫЛКУ НА КАРТИНКУ" class="pic_stage_input" name="img_stage_input" required >

		<!-- Скрытый инпут, который передает айдишник дальше (в базу и тд) -->
		<?php echo '<input type="hidden" value="'.$_GET['id'].'" name="id">'; ?>

		<input type="submit" value="СОХРАНИТЬ" class="save" name="save">
		
		<?php
			mysqli_close($link);
			?>
	</div>



</form>

	<script type='text/javascript'> 

	// Получение картинки в реальном времени
        document.querySelector('input.pic_stage_input').addEventListener('input', function() 
        { 
            document.querySelector('.pic_add').src = document.querySelector('input.pic_stage_input').value; 
		}); 
	</script>

</body>
</html>