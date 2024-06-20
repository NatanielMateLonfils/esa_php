<?php
session_start();
if(isset($_SESSION['add_task_error'])){
    if($_SESSION['add_task_error']){
        $task_result = 'Failed to add a new task.';
        $color = 'pico-color-red-250';
    }
    else{
        $task_result = 'Successfully added a new task.';
        $color = 'pico-color-jade-250';
    }
}
unset($_SESSION['add_task_error']);
?>

<form action="./controllers/add_task.php" method="post">
    <label>Add a task</label>
    <input type="hidden" name="property" value="<?php echo $connected_user ?>">
    <input type="text" name="task" placeholder="Type your task here...">
    <label>Select a group</label>
    <select name="selectedGroup">
        <option value="Ungrouped">Ungrouped</option>
        <?php foreach($current_groups as $group): ?>
            <option value="<?php echo $group?>"><?php echo $group?></option>
        <?php endforeach?>
    </select>
    <input type="submit" value="ADD">
    <span class=<?php echo $color?>><?php echo $task_result?></span>
</form>