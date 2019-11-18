<?

function log_in($user){
	if(isset($user)){
		echo '<div id = "enter">
				<form method="post">'.$user.' &nbsp;
					<input type="submit" name = "quit" value= "Выйти" >
				</form>
			</div>	';
	}
	else{
		echo '<div id = "enter">
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
			</div>';
	}
}

function cancel($id){
	global $connect;
	$connect->query("UPDATE `orders` SET `status` = 'Отменён' WHERE `id` = '$id' ");
}
function del($id){
	global $connect;
	$connect->query("DELETE FROM `orders` WHERE `id` = '$id' ");
}

?>