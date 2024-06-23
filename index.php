<!DOCTYPE html>
<html lang="en">

<head>
    <title>Task Management Application</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<!-- Form for adding tasks -->
<nav>
	<a class="heading" href="#">Task Management Appliaction</a>
</nav>
<div class="container">
	<div class="input-area">
	<form method="POST" action="add_task.php">
		<input type="text" name="task"
				placeholder="Write your Task Name here..." required /><br><br/>
        <textarea style="border-radius:10px;padding:7px;" type="text" name="description"
				placeholder="Description" rows="7" cols="65" required ></textarea><br><br/>
        <input type="date" name="deadline"
				placeholder="Deadline" required /><br><br/>
		<button class="btn" name="add">
			Add Task
		</button>
	</form>
	</div>
	<table class="table">
	<thead>
		<tr>
		<th>ID</th>
		<th>Tasks</th>
        <th>Description</th>
		<th>Deadline</th>
		<th>Action</th>
		</tr>
	</thead>
	<tbody>
<!--Featching the add details-->
		<?php
				require 'config.php';
				$fetchingtasks = 
mysqli_query($db, "SELECT * FROM `task` ORDER BY `task_id` ASC")
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
		<td colspan="2" class="action">
        <a href=
"update_task.php?task_id=<?php echo $fetch['task_id'] ?>" 
			class="">
			Update
			</a>
			<a href=
"delete_task.php?task_id=<?php echo $fetch['task_id'] ?>" 
			class="btn-remove">
			Delete
			</a>
		</td>
		</tr>
		<?php
				}
			?>
	</tbody>
	</table>
</div>
</body>

</html>
