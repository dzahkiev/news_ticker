<? 
  $news_item=get_news_item($_GET['item']);
  $tags=explode(" ", $news_item['tags']);
?>
<div class="news_item_watch">
	<h3 class="news_item_watch_title"><a  href="<?=link_to_news_item_page($news_item['news_id']) ?>"><?=$news_item['name'] ?></a></h3>
	<p class="news_item_time">Дата публикации: <?=$news_item['published'] ?></p>
	<img  src="images/<?=$news_item['image'] ?>" alt="image #" />
	<p class="news_item_watch_announce"><?=$news_item['announ'] ?></p>
	<p class="news_item_watch_description"><?=$news_item['description'] ?></p>
	<br>
	<p>
<? foreach ($tags as  $tag) { ?>
 	<span ><a class="tag" href="/index.php?category=search&searching_tag=<?=$tag?>"><?=$tag ?></a></span>
<?}	?>
	</p>
	<br>
</div>
<div class="clearfix"></div>
