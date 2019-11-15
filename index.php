<!DOCTYPE HTML>
<html>
<head>
	<title>Заказы</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<meta name='viewport' content='width=device-width,initial-scale=1'/>
	<meta content='true' name='HandheldFriendly'/>
	<meta content='width' name='MobileOptimized'/>
	<meta content='yes' name='apple-mobile-web-app-capable'/>	
</head>

<body>
<?
session_start();
require "functions.php";

if(isset($_POST['quit'])){
	unset($_SESSION['manager']);
}

if(isset($_POST['manager'])){
	$_SESSION['manager'] = $_POST['manager'];
}

if(isset($_SESSION['manager'])){
	$user = $_SESSION['manager'];
}

?>
<script src = "js/code.js"></script>

<div id = "cont">
	<br>
	<h1>Заказы</h1>
<?
if(isset($user)){
?>	
	<div id = "enter">
		<form method="post">
			<?=$user;?> &nbsp;
			<input type="submit" name = "quit" value= "Выйти" >
		</form>
	</div>	
<?	
}
else{
?>
	<div id = "enter">
		<form method="post">
			<select name="manager">	
				<option value = "Евгения">Евгения</option>
				<option value = "Вадим">Вадим</option>
				<option value = "Сергей">Сергей</option>
				<option value = "Максим">Максим</option>
				<option value = "Иван">Иван</option>
				<option value = "Михаил">Михаил</option>
			</select>	
			<input type="submit" value = "Войти">	
		</form>	
	</div>
<?
}
?>
	<table>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>


	</table>








</div>

</body>
</html>