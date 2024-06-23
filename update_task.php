<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['task_id']) && !empty($_GET['task_id'])) {
    if (isset($_POST['task']) && isset($_POST['description']) && isset($_POST['deadline'])) {
        $task_id = mysqli_real_escape_string($db, $_GET['task_id']);
        $task = mysqli_real_escape_string($db, $_POST['task']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $deadline = mysqli_real_escape_string($db, $_POST['deadline']);

        // Prepare the SQL statement for Updating
        $stmt = $db->prepare("UPDATE `task` SET `task` = ?, `description` = ?, `deadline` = ? WHERE `task_id` = ?");
        if ($stmt === false) {
            echo "Error preparing statement: " . $db->error;
            exit;
        }

        $stmt->bind_param('sssi', $task, $description, $deadline, $task_id);

        // Execute the statement
        if ($stmt->execute()) {
            header('Location: index.php');
            exit;
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Required fields are missing.";
    }
} else {
    echo "";
}

// Close the database connection
$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Task</title>
    <link rel="stylesheet"
		type="text/css" href="style.css" />
</head>
<body>
<div class="container">
<!--Printing the selected id for update-->
<nav>
	<a style="margin-top:2px;" class="heading" href="#">Update Task List</a>
</nav>
<table class="table">
	<thead>
		<tr>
		<th>ID</th>
		<th>Tasks</th>
        <th>Description</th>
		<th>Deadline</th>
		</tr>
	</thead>
	<tbody>
		<?php
				require 'config.php';
				$fetchingtasks = mysqli_query($db, "SELECT * FROM `task` ORDER BY `task_id`ASC ")
or die(mysqli_error($db));
				$count = 1;
				while ($fetch = $fetchingtasks->fetch_array()) {
					?>
		<tr class="border-bottom">
		<td>
			<?php echo $count++ ?>
		</td>
		<td>
			<?php echo $fetch['task'] ?>
		</td>
        <td>
			<?php echo $fetch['description'] ?>
		</td>
		<td>
			<?php echo $fetch['deadline'] ?>
		</td>

		</tr>
		<?php
				}
			?>
	</tbody>
	</table>
            <!--Updation Form-->
<div style="margin-top:40px">
<form method="post" action="update_task.php?task_id=<?php echo htmlspecialchars($_GET['task_id']); ?>">
    <input type="text" name="task"  placeholder="Task Name" required><br><br>
    <textarea style="border-radius:10px;padding:7px;" type="text" name="description"
				placeholder="Description" rows="7" cols="64" required ></textarea><br><br/>
    <input type="date" name="deadline"  placeholder="Deadline" required><br><br>
    <input class="btn" type="submit" value="Update Task" onclick="index.php">
</form>
</div>
</div> 
</body>
</html>
