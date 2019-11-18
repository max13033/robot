<form method = "post">

	<tr>
		<td colspan="3">
			<select name = "status">
				<option value = "Ожидает поставки">Ожидает поставки </option>
				<option value = "В пункте выдачи">В пункте выдачи </option>
				<option value = "Выдан">Выдан</option>
				<option value = "Отменён">Отменён</option>
			</select>	
		</td>

		<td>
			<input type="text" name = "product">
		</td>

		<td>	<input type="text" name="client" >	</td>

		<td>	<input type="text" name="tel" size = "11">	</td>
		<td>
			<select name = "paid">
				<option value="Не оплачен">Не оплачен</option>
				<option value="Оплачен">Оплачен</option>
			</select>
		</td>

		<td> <input type="text" name="sum" size = "4">	</td>

		<td>
			<select name = "place">
				<option value = "Магазин">Магазин</option>
				<option value = "КП">КП</option>
				<option value = "Доставка">Доставка</option>
			</select>
		</td>

		<td colspan="2">
			<textarea name ="comment" placeholder="Оставить комментарий" ></textarea>
		</td>
		<td>
			<input type="hidden" name = "insert" value="1">
			<input type="submit" value = "Сохранить" <?if(!isset($user)){echo 'disabled title = "Авторизируйтесь" ';}?>>
		</td>
	</tr>
</form>