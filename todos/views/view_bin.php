<h1>BIN</h1>
<form action="../index.php">
    <button type="submit" class="cancel_button">Cancel</button>
</form>
<?php if (empty($deleted_tasks['Ungrouped'])): ?>
    <p>The bin is currently empty...</p>
<?php endif; ?>
<?php foreach($deleted_tasks as $group_name => $group): ?>
    <?php foreach($group as $task_id => $task): ?>
        <div class="task">
            <div class="task_title">
                <li class="column"><?php echo $deleted_tasks[$group_name][$task_id]['task']?></li>
            </div>
            <div class="task_options">
                <form class="column" action="./controllers/restore_task.php" method="post">
                    <input type="hidden" name="group" value="<?php echo $group_name?>">
                    <input type="hidden" name="task_id" value="<?php echo $task_id?>">
                    <button type="submit" class="restore_button">Restore</button>
                </form>
                <form class="column" action="./controllers/delete_forever.php" method="post">
                    <input type="hidden" name="group" value="<?php echo $group_name?>">
                    <input type="hidden" name="task_id" value="<?php echo $task_id?>">
                    <button type="submit" class="delete_forever_button">Delete forever</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>