<?php
session_start();
if(isset($_SESSION['create_user_error'])){
    if($_SESSION['create_user_error']){
        $create_user_result = 'Failed to create a user.';
        $color = 'pico-color-red-250';
    }
}
unset($_SESSION['create_user_error']);
?>
<h2>User creation</h2>
<form action="./controllers/create_user.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Create">
    <span class=<?php echo $color?>><?php echo $create_user_result?></span>
</form>
<form action="../index.php">
    <button type="submit" class="cancel_button">Cancel</button>
</form>