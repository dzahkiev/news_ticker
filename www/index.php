<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once 'config/conf.php';
require_once SITE_ROOT . '/presentation/db_operations.php';
require_once SITE_ROOT . '/presentation/link.php';
include SITE_ROOT . '/presentation/templates/main.php';




?>