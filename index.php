<?session_start();?>
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
require "functions.php";
require "connect.php";

if(isset($_POST['quit'])){
	unset($_SESSION['manager']);
}

if(isset($_POST['manager'])){
	$_SESSION['manager'] = $_POST['manager'];
}
$user = null;
if(isset($_SESSION['manager'])){
	$user = $_SESSION['manager'];
}

?>
<script src = "js/code.js"></script>

<div id = "cont">
	<br>
	<h1>Заказы</h1>
<?

log_in($user);

if(isset($_POST['insert'])){
	date_default_timezone_set('Europe/Moscow');
	$date = strval(date("d.m.Y H:i"));
	$status = $_POST['status'];
	$product = $_POST['product'];
	$client = $_POST['client'];
	$tel = $_POST['tel'];
	$paid = $_POST['paid'];
	$sum = $_POST['sum'];
	$place = $_POST['place'];
	$comment = $_POST['comment'];

	$q_text = "INSERT INTO `orders` 
	(`id`, `date`, `status`, `product`, `client`, `tel`, `paid`, `sum`, `place`, `manager`, `comment`) 
	VALUES ('NULL', '$date', '$status', '$product', '$client', '$tel', '$paid', '$sum', '$place', '$user', '$comment')";
	$connect->query($q_text);
}
if(isset($_POST['save_update'])){
	$id = $_POST['save_update'];
	$status = $_POST['status'];
	$product = $_POST['product'];
	$client = $_POST['client'];
	$tel = $_POST['tel'];
	$paid = $_POST['paid'];
	$sum = $_POST['sum'];
	$place = $_POST['place'];
	$comment = $_POST['comment'];

	$connect->query("UPDATE `orders` SET 
		`status` = '$status', 
		`product` = '$product', 
		`client` = '$client', 
		`tel` = '$tel', 
		`paid` = '$paid',
		`sum` = '$sum',
		`place` = '$place',
		`comment` = '$comment' WHERE `id` = '$id' ");
}
if(isset($_POST['del'])){
	del($_POST['del']);
}
if(isset($_POST['cancel'])){
	cancel($_POST['cancel']);
}
?>


	<table>
		<tr>
			<td colspan="12" class = "header"> 
				Добавить заказ
			</td>
		</tr>


		<tr style = "font-weight: bold;">
			<td colspan="3">Статус</td>
			<td>Продукт</td>
			<td>ФИО Клиента</td>
			<td>Номер тел.</td>
			<td>Статус оплаты</td>
			<td>Сумма оплаты</td>
			<td>Где удобно забрать</td>
			<td colspan="2">Комментарий</td>
			<td>Правки</td>
		</tr>
<?
require "form.php";
?>
		<tr>
			<td colspan="12" class = "header"> 
				<br><br>Текущие заказы<br>
			</td>
		</tr>

		<tr style = "font-weight: bold;">
			<td>ID</td>
			<td>Дата</td>
			<td>Статус</td>
			<td>Продукт</td>
			<td>ФИО Клиента</td>
			<td>Номер тел.</td>
			<td>Статус оплаты</td>
			<td>Сумма оплаты</td>
			<td>Где удобно забрать</td>
			<td>Менеджер</td>
			<td>Комментарий</td>
			<td>Правки</td>
		</tr>
<?


$query = $connect->query("SELECT * FROM `orders` ORDER BY `id` DESC");
$num = $query->num_rows;
for($i = 1; $i <=$num; $i++){
	$arr = $query->fetch_array(MYSQLI_ASSOC);

	$id = $arr['id'];
	$date = $arr['date'];
	$status = $arr['status'];
	$product = $arr['product'];
	$client = $arr['client'];
	$tel = $arr['tel'];
	$paid = $arr['paid'];
	$sum = $arr['sum'];
	$place = $arr['place'];
	$manager = $arr['manager'];
	$comment = $arr['comment'];

	switch ($status) {
		case 'Ожидает поставки':
			$color = "faa";
			break;

		case 'В пункте выдачи':
			$color = "ffa";
			break;

		case 'В пункте выдачи, клиент оповещён':
			$color = "cf7";
			break;

		case 'Выдан':
			$color = "afa";
			break;		
		
		default:
			$color = "fff";
			break;
	}

	if(	
		(isset($_POST['update'])) 
		&& 
		($_POST['update'] == $id) 
		){
?>
		<form method = "post">

			<tr>
				<td colspan="3">
					<select name = "status">
						<option value = "Ожидает поставки">Ожидает поставки </option>
						<option value = "В пункте выдачи">В пункте выдачи </option>
						<option value = "В пункте выдачи, клиент оповещён">В пункте выдачи, клиент оповещён</option>
						<option value = "Выдан">Выдан</option>
						<option value = "Отменён">Отменён</option>
					</select>	
				</td>

				<td>
					<input type="text" name = "product" value = "<?=$product?>">
				</td>

				<td>	<input type="text" name="client" value = "<?=$client?>">	</td>

				<td>	<input type="text" name="tel" size = "11" value = "<?=$tel?>">	</td>
				<td>
					<select name = "paid">
						<option value="Не оплачен">Не оплачен</option>
						<option value="Оплачен">Оплачен</option>
					</select>
				</td>

				<td> <input type="text" name="sum" size = "4" value = "<?=$sum?>">	</td>

				<td>
					<select name = "place">
						<option value = "Магазин">Магазин</option>
						<option value = "КП">КП</option>
						<option value = "Доставка">Доставка</option>
					</select>
				</td>

				<td><?=$manager?>
				<td>
					<textarea name ="comment" placeholder="Оставить комментарий" >	<?=$comment?>	</textarea>
				</td>
				<td>
					<input type="hidden" name = "save_update" value = "<?=$id?>">
					<input type="submit" value = "Сохранить">
				</td>
			</tr>
		</form>

<?		
	}
	else{
?>
		<tr style = "background-color: #<?=$color?>;">
			<td><?=$id?></td>
			<td><?=$date?></td>
			<td><?=$status?></td>
			<td><?=$product?></td>
			<td><?=$client?></td>
			<td><?=$tel?></td>
			<td><?=$paid?></td>
			<td><?=$sum?></td>
			<td><?=$place?></td>
			<td><?=$manager?></td>
			<td><?=$comment?></td>
			<td>
				<form method = "post">
					<input type="hidden" name="update" value="<?=$id?>">
					<input type="submit" value="Редак-ть" <?if($user != $manager && $user != "Евгения"){echo "disabled title = 'Вы не можете редактировать чужие заказы' ";} ?> >
				</form> 
<?
			if($status!='Отменён'){				
?>				<form method = "post">
					<input type="hidden" name="cancel" value="<?=$id?>">
					<input type="submit" value="Отменить" <?if($user != $manager && $user != "Евгения"){echo "disabled title = 'Вы не можете отменять чужие заказы' ";} ?>>
				</form>
<?			}
			else{			?>
				<form method = "post">
					<input type="hidden" name="del" value="<?=$id?>">
					<input type="submit" value="Удалить" <?if($user != $manager && $user != "Евгения"){echo "disabled title = 'Вы не можете удалять чужие заказы' ";} ?>>
				</form>

<?			}			?>
				
			</td>
		</tr>

<?
	} 	//	else	
}	//	for
?>

	</table>
<br><br><br><br><br>
</div>

</body>
</html>