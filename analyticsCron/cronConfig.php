<?php	
	
	
	require_once("../config.php");
	//require_once("../load.php");
	require_once("../libraries/application.php");	
	require_once("../libraries/db/db.class.php");	
	require_once("../libraries/uri.php");
	require_once("../libraries/utility.php");
	require_once("../libraries/uri.php");
	require_once("../libraries/string.php");
	require_once("../libraries/core.php");
	//require_once("../libraries/ImageUpload.class.php");
	
	DB::$host = CFG::$host;
	DB::$user = CFG::$user;
	DB::$password = CFG::$password;
	DB::$dbName = CFG::$db;