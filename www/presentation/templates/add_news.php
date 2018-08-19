<?
$categories=get_categories();
if (isset($_POST['add']))
{
	if ($_FILES['image_upload']['error'] == 0)
		{ 
			move_uploaded_file($_FILES['image_upload']['tmp_name'],
			SITE_ROOT . '/images/' .
			$_FILES['image_upload']['name']);
		}
	$res=add_news_item(	$_POST['title'],
						$_POST['announ'], 
						$_POST['description'],
						$_FILES['image_upload']['name'],
						$_POST['tags'],
						$_POST['category']);
	
}

?>


<form enctype="multipart/form-data" action="" method="post">
<table  class="table_admin">
	<tr>
		<td width="300px" valign="top">
			<div class="image_block_admin">Image</div>
			<input type="file" name="image_upload" value="загрузить" />
		</td>
		<td width="700px">
			<p>Заголовок новости:</p>
			<textarea name="title"  cols="80" rows="2"></textarea>
			<p>Аннонс:</p>
			<textarea name="announ"  cols="80" rows="5"></textarea>
			<p>Полное описание:</p>
			<textarea name="description"  cols="80" rows="10"></textarea>
			<p>Теги:</p>
			<textarea name="tags"  cols="80" rows="2"></textarea>
			<p>Категория:</p>
			<select name="category">
			<?foreach ($categories as $category) {?>
				<option value="<?=$category['category_id']?>"><?=$category['name']?></option>
			<?}?>
			</select>
			<p>Дата публикации:</p>
			<input type="text" name="published" size="40" disabled value="текущее время" />
			<input type="submit" name="add" value="Добавить" />
			<? if (@$res) echo "<p><b>Запись добавлена!</b></p>"; ?>
		</td>
	</tr>
</table>	
</form>

