<?


function link_to_main_page(){
	$link='http://' . $_SERVER['SERVER_NAME'] ;
	return $link; 
}



function link_to_category($category_id){
 
	$link='http://' . $_SERVER['SERVER_NAME'] . '/index.php?category=' . $category_id;
	return $link;
}




function link_to_category_page($category, $page){
 
	$link='http://' . $_SERVER['SERVER_NAME'] . '/index.php?category=' . 
											$category . '&page=' . $page;
	return $link;
}




function link_to_news_item_page($item){
	$link='http://' . $_SERVER['SERVER_NAME'] . '/index.php?item=' .$item;
	return $link;
}


function link_to_search(){
	$link='http://'.$_SERVER['SERVER_NAME']. '/index.php?category=search';
	return $link;
}


function link_to_add_news(){
	$link='http://'.$_SERVER['SERVER_NAME']. '/admin.php?page=add';
	return $link;
}





?>