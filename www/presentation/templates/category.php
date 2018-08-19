<ul>
<li class="category"><a href="<?=link_to_main_page(); ?>">Главная</a></li>
<?	$categories=get_categories();
	foreach ($categories as $category) { ?>
	<li class="category"><a href="<?=link_to_category($category['category_id']); ?>"><?=$category['name'] ?></a></li>
<? } ?>
</ul>
