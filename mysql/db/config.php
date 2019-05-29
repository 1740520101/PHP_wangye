<?php
session_start();
require_once('mysql.php');
require_once('../lib/wenjianClass.php');
/* define('DBHOST','127.0.0.1');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','php');
$db = new Mysql('DBHOST','DBUSER','DBPASS','DBNAME'); */
$db = new MySQL('127.0.0.1','root','','php');