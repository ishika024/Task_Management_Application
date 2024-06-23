<!--DataBase Connecetion-->
<!--database name - todo -->

<?php
$db = mysqli_connect("localhost", "root", "", "todo")
    or
    die("Connection failed: " . mysqli_connect_error());
?> 
