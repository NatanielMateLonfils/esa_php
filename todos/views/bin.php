<?php
$total_bin = count($deleted_tasks['Ungrouped'])
?>

<form action="index.php?page=view_bin" method="post">
    <button class="bin_button">View bin (<?php echo $total_bin ?>)</button>
</form>