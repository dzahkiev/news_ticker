<? 

//  ищем ли мы что-нибудь? если да, то выводим результат поиска
if (isset($_GET['category']) &&  $_GET['category']=='search')
	{
		if (isset($_POST['search_string']))
			{	 //строка поиска нам понадобится при просмотре всех страниц: "сохраняем"" ее
				$_SESSION['search_string']=$_POST['search_string'];
			}
		if (isset($_GET['searching_tag']))
			{	 //tag нам понадобится при просмотре всех страниц: "сохраняем" также если ищем по тегу
				$_SESSION['search_string']=$_GET['searching_tag'];
			}
		$count=ceil(get_count_pages($_GET['category'], $_SESSION['search_string'] )/HOW_MUCH_NEWS_ON_PAGE);
		if (isset($_GET['page']) )
		 	$news=get_search_result($_SESSION['search_string'], $_GET['page']);
		else
			$news=get_search_result($_SESSION['search_string']);
	/*	echo $_SESSION['search_string'], $count;
		echo "<pre>";
		print_r( $news);
		echo "</pre>"; */
		$title="Результат поиска";
	}


//если просматриваем категорию, то выводим записи только из этой категории новостей
else if (isset($_GET['category']) && $_GET['category']!=='lastest-news')
	{
		$count=ceil(get_count_pages($_GET['category'])/HOW_MUCH_NEWS_ON_PAGE); //получаем список страниц
		if (isset($_GET['page']) )
		 	$news=get_news($_GET['category'], $_GET['page']);
		else
			$news=get_news($_GET['category']);
		$title=get_category_title($_GET['category']);

	}


else  //иначе выводим список всех новостей сортировав по "свежести"
	{	
		$count=ceil(get_count_pages()/HOW_MUCH_NEWS_ON_PAGE);
		if (isset($_GET['page']) )
			$news=get_last_news($_GET['page']);
		else
			$news=get_last_news();
	$title="Последние новости";

	}

echo "<h2>" . $title . "</h2><br>";
//добавляем кнопку администрирования, если администратор залогинился
if (isset($_SESSION['admin_log'])) { ?>
		 	<button class="button_style" >
		 		<a href="<?=link_to_add_news();?>">Добавить новость</a>
		 	</button>
		<?}
//разделяем вывод по страницам, если вдруг у нас очень много новостей
if ($count>1){
	$category=isset($_GET['category']) ? $_GET['category'] : 'lastest-news';
	echo "<b>стр. </b> ";
	for($i=1; $i<=$count; $i++){
		if ($i==@$_GET['page'] || (!isset($_GET['page']) && $i==1))	{?>
		<a class="page_number_visited" href="<?=link_to_category_page($category, $i); ?>"><?=$i?></a> 
	<?} else {?>
		<a class="page_number" href="<?=link_to_category_page($category, $i); ?>"><?=$i?></a> 
		


	
<?}
	}
}
echo '<div class="clearfix"></div>';
 //выводим список новостей, ссылки к ним, изображение и т.п.
foreach ($news as $item) { ?>
<div class="news_item">
	<h3 class="news_item_title"><a href="<?=link_to_news_item_page($item['news_id']); ?>"><?=$item['name'] ?></a></h3>
	<p class="news_item_time">Дата публикации: <?=date_format(date_create($item['published']), 'd/m/Y H:i') ?></p>
	<a href="<?=link_to_news_item_page($item['news_id']); ?>"><img src="images/<?=$item['image'] ?>"  alt="image #" /></a>
	<p class="news_item_announce"><?=$item['announ'] ?></p>
</div>

<? }  ?>
<div class="clearfix"></div>
