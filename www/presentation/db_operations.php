<?php


  function connect_db() {
  	mysql_connect(HOST, DB_USER, DB_PASS) or die("could not connect" . mysql_error());
	mysql_query("SET NAMES 'utf8'"); 
	mysql_query("SET CHARACTER SET utf8");
 	mysql_select_db(DB_NAME) or die("Could not select database: ".mysql_error());
 }


 function result_to_array($result){
	$resA = array ();
	while($res=mysql_fetch_array($result))
		$resA[] = $res;
	return $resA;
}


 function get_categories(){
	 	connect_db();
	 	$query="SELECT * FROM category";
		$result=mysql_query($query);
		$result=result_to_array($result);
	return $result;
}

 function get_category_title($cat_id){
	 	connect_db();
	 	 $query=sprintf("SELECT name FROM category WHERE category_id='%s'",
	 					mysql_real_escape_string($cat_id));
	 	 $result=mysql_query($query);
	 	$result=mysql_fetch_row($result);
	return $result[0];
}

function get_news($cat, $page=1){
	 	connect_db();
	 	$from=($page-1) * HOW_MUCH_NEWS_ON_PAGE;
		$query=sprintf("SELECT * FROM news 
						WHERE category = '%s' 
						LIMIT $from, " . HOW_MUCH_NEWS_ON_PAGE, mysql_real_escape_string($cat));
		$result=mysql_query($query);
		$result=result_to_array($result);
	return $result;
}

function get_news_item($news_item){
	 	connect_db();
		$query=sprintf("SELECT * FROM news WHERE news_id = '%s'", mysql_real_escape_string($news_item));
		$result=mysql_query($query);
		$result=mysql_fetch_array($result);
	return $result;
}

function get_last_news($page=1){
	 	connect_db();
	 	$from=($page-1)* HOW_MUCH_NEWS_ON_PAGE;
 		$query=sprintf("SELECT * FROM news  
 						ORDER BY  published DESC
 						LIMIT $from, ". HOW_MUCH_NEWS_ON_PAGE);
		$result=mysql_query($query);
		$result=result_to_array($result);
	return $result;
}


function get_count_pages($cat=NULL, $search_string=NULL){
	connect_db();
		if ($cat) {
			if ($cat=="search" )
				$query=sprintf("SELECT COUNT(*) from news 
								WHERE MATCH (description, tags) AGAINST ('%s' IN BOOLEAN MODE)",
								mysql_real_escape_string($search_string));
			else
				$query=sprintf("SELECT COUNT(*) FROM news 
								WHERE category='%s'", mysql_real_escape_string($cat));
		}
		else
			$query="SELECT COUNT(*) FROM news";
		$result=mysql_query($query);
		$result=mysql_fetch_row($result);
	return $result[0];
}


function add_news_item ($name, $announ, $description, $image, $tags, $category){
	connect_db();
	$query=sprintf("INSERT INTO news (name, announ, description, image, tags, category, published)
					VALUES ('%s','%s','%s','%s','%s','%s', NOW())",
					mysql_real_escape_string($name),
					mysql_real_escape_string($announ),
					mysql_real_escape_string($description),
					mysql_real_escape_string($image),
					mysql_real_escape_string($tags),
					mysql_real_escape_string($category)		);
	if (mysql_query($query)) return true;
}


function get_search_result($search_string, $page=1){
	connect_db();
	$from=($page-1)* HOW_MUCH_NEWS_ON_PAGE;
	$query=sprintf("SELECT * from news 
					WHERE MATCH (description, tags) AGAINST ('%s' IN BOOLEAN MODE) 
					LIMIT $from, ". HOW_MUCH_NEWS_ON_PAGE, 
					mysql_real_escape_string($search_string));
	$result=mysql_query($query);
	$result=result_to_array($result);
	return $result;
}


?>