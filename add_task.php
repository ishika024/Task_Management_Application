<!--Add the list rows -->

<?php
require_once 'config.php';
if (isset($_POST['add'])) {
	if ($_POST['task'] != "") {
		$task = $_POST['task'];
		$description = $_POST['description'];
		$deadline = $_POST['deadline'];
		$addtasks = mysqli_query($db, 
			"INSERT INTO `task` VALUES('', '$task', '$description','$deadline')")
			or
			die(mysqli_error($db));
		header('location:index.php');
	}
}
?>
