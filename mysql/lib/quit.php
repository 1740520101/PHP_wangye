<?php
require_once('../db/config.php');
$_SESSION['username'] = '';
$_SESSION['password'] = '';
$_SESSION['nickname'] = '';
$_SESSION['heading'] = '';
header('location:index.php');