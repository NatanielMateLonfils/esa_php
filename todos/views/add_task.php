<?php
session_start();
if(isset($_SESSION['error'])){
    if($_SESSION['error']){
        $result = 'Failed to add a new task.';
        $color = 'pico-color-red-250';
    }
    else{
        $result = 'Successfully added a new task.';
        $color = 'pico-color-jade-250';
    }
}
unset($_SESSION['error']);
?>

<form action="./controllers/add_task.php" method="post">
    <label>Add a task here :</label>
    <input type="text" name="task">
    <input type="submit">
    <span class=<?php echo $color?>><?php echo $result?></span>
</form>