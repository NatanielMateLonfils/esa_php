<?php
session_start();
if(isset($_SESSION['edit_task_error'])){
    if($_SESSION['edit_task_error']){
        $edit_task_result = 'Failed to edit the task.';
        $color = 'pico-color-red-250';
    }
    else{
        $edit_task_result = 'Successfully edited the task.';
        $color = 'pico-color-jade-250';
    }
}
unset($_SESSION['edit_task_error']);
?>

<form action="./controllers/edit_task.php" method="post">
    <label>Edit your task here :</label>
    <input type="hidden" name="group" value="<?php echo $_POST['group']?>">
    <input type="hidden" name="task_id" value="<?php echo $_POST['task_id']?>">
    <input type="text" name="task" placeholder="<?php echo $tasks[$_POST['group']][$_POST['task_id']]['task']?>">
    <input type="submit" value="APPLY">
    <span class=<?php echo $color?>><?php echo $edit_task_result?></span>
</form>
<form action="../index.php">
    <button type="submit" class="cancel_button">Cancel</button>
</form>