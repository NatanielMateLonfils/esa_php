<form action="./controllers/edit_task.php" method="post">
    <label>Edit your task here :</label>
    <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
    <input type="text" name="task">
    <input type="submit">
</form>
<li><a href="index.php">Home</a></li>