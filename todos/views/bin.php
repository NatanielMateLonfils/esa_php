<?php
$total_bin = countUserBin($deleted_tasks, $connected_user);
?>

<div class="bin_field">
    <form action="index.php?page=view_bin" method="post">
        <button class="bin_button">&#128465; View bin (<?php echo $total_bin ?>)</button>
    </form>
    <form action="./controllers/empty_bin.php" method="post">
        <input type="hidden" name="connected_user" value="<?php echo $connected_user ?>">
        <button class="empty_bin_button">Empty bin</button>
    </form>
    <form action="./controllers/restore_bin.php" method="post">
        <input type="hidden" name="connected_user" value="<?php echo $connected_user ?>">
        <button class="restore_bin_button">Restore bin</button>
    </form>
</div>