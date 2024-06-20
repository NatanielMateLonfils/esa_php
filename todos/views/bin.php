<?php
$total_bin = countUserBin($deleted_tasks, $connected_user);
?>

<form action="index.php?page=view_bin" method="post">
    <button class="bin_button">&#128465; View bin (<?php echo $total_bin ?>)</button>
</form>