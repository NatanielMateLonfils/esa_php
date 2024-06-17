<?php
session_start();
if(isset($_SESSION['error'])){
    if($_SESSION['error']){
        $result = 'Failed to edit the task.';
        $color = 'pico-color-red-250';
    }
    else{
        $result = 'Successfully edited the task.';
        $color = 'pico-color-jade-250';
    }
}
unset($_SESSION['error']);
?>

<form action="./controllers/edit_task.php" method="post">
    <label>Edit your task here :</label>
    <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
    <input type="text" name="task">
    <input type="submit">
    <span class=<?php echo $color?>><?php echo $result?></span>
</form>
<li><a href="index.php">Home</a></li>