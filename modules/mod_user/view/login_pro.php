<?php


	// session_start();


	$_SESSION["id"] = $_POST["id"];
	$_SESSION["name"] = $_POST["name"];
	$_SESSION["email"] = $_POST["email"];


	// $mysqli = new mysqli("localhost", "root", "root", "test");


	$sql = "SELECT * FROM dtm_googlelogin WHERE email='".$_POST["email"]."'";
	$result = $mysqli->query($sql);


	if(!empty($result->fetch_assoc())){
		$sql2 = "UPDATE dtm_googlelogindtm_googlelogin SET google_id='".$_POST["id"]."' WHERE email='".$_POST["email"]."'";
	}else{
		$sql2 = "INSERT INTO dtm_googlelogin (name, email, google_id) VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["id"]."')";
	}


	$mysqli->query($sql2);


	echo "Updated Successful";
?>