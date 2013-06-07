<?php
require_once('include/common.php');
require_once('include/database.php');

ini_set('display_errors', 'On');
	error_reporting(E_ALL);

if (isset($_POST['cookie_level'])){
	echo "WE GOT SOMETHING!";
	print_r($_POST['cookie_level']);

	$db = connect();
    try {
        $stmt = $db->prepare('INSERT INTO CookieJar(cookie_level, time_posted) VALUES (:input, CURRENT_TIMESTAMP)');
        $stmt->bindValue(':input', $_POST['cookie_level'], PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        $stmt->closeCursor();
    } catch (PDOException $e) { 
        print "Error checking login: " . $e->getMessage(); 
    }
}
else{
	echo "NO DATA BRO";
}

?>