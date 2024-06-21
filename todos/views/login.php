<?php
session_start();

if(isset($_SESSION['log_user_error'])){
    if($_SESSION['log_user_error']){
        $log_user_result = 'Failed to login.';
        $color = 'pico-color-red-250';
    }
    else{
        $log_user_result = 'Login successfull.';
        $color = 'pico-color-jade-250';
    }
}
unset($_SESSION['log_user_error']);
?>

<header>
    <span>&#128100;<?php echo $connected_user ?></span>
    <span class=<?php echo $color?>><?php echo $log_user_result?></span>
    <?php if ($connected_user == 'Anonymous'): ?>
        <div class="login_options">
            <form action="./controllers/log_user.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" class="login_button">Login</button>
            </form>
            <form action="index.php?page=create_user" method="post">
                <button type="submit" class="create_user_button">Create user</button>
            </form>
            <form action="./controllers/switch_theme.php" method="post">
                <input type="hidden" name="theme" value="<?php echo $theme ?>">
                <button type="submit" id="<?php echo $button_theme ?>"><?php echo $theme_message ?></button>
            </form>
            <?php else: ?>
            <form action="./controllers/switch_theme.php" method="post">
                <input type="hidden" name="theme" value="<?php echo $theme ?>">
                <button type="submit" id="<?php echo $button_theme ?>"><?php echo $theme_message ?></button>
            </form>
            <form action="./controllers/logout_user.php" method="post">
                <input type="hidden" name="connected_user" value="<?php echo $connected_user ?>">
            <button type="submit" class="logout_button">Logout</button>
            </form>
        </div>
    <?php endif; ?>
</header>
