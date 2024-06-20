<?php
session_start();
if(isset($_SESSION['add_group_error'])){
    if($_SESSION['add_group_error']){
        $group_result = 'Failed to add a new group.';
        $color = 'pico-color-red-250';
    }
    else{
        $group_result = 'Successfully added a new group.';
        $color = 'pico-color-jade-250';
    }
}
unset($_SESSION['add_group_error']);
?>

<form action="./controllers/add_group.php" method="post">
    <label>Type a group :</label>
    <input type="text" name="group">
    <input type="submit" value="ADD">
    <span class=<?php echo $color?>><?php echo $group_result?></span>
</form>