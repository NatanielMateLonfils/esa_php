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
    <label>Add a group</label>
    <input type="hidden" name="property" value="<?php echo $connected_user ?>">
    <input type="text" name="group" placeholder="Type your group here...">
    <input type="submit" value="ADD">
    <span class=<?php echo $color?>><?php echo $group_result?></span>
</form>