<?php
session_start();
if(isset($_SESSION['edit_group_error'])){
    if($_SESSION['edit_group_error']){
        $edit_group_result = 'Failed to edit the group.';
        $color = 'pico-color-red-250';
    }
    else{
        $edit_group_result = 'Successfully edited the group.';
        $color = 'pico-color-jade-250';
    }
}
unset($_SESSION['edit_group_error']);
?>

<form action="./controllers/edit_group.php" method="post">
    <label>Edit your group here :</label>
    <input type="hidden" name="group_id" value="<?php echo $_POST['group_id']?>">
    <input type="text" name="group" placeholder="<?php echo $groups[$_POST['group_id']]['group']?>">
    <input type="submit" value="APPLY">
    <span class=<?php echo $color?>><?php echo $edit_group_result?></span>
</form>
<form action="../index.php">
    <button type="submit" class="cancel_button">CANCEL</button>
</form>