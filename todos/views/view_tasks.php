<?php foreach($tasks as $id => $task): ?>
    <?php if ($task['group'] == 'Ungrouped'): ?>
    <div class="task">
        <div class="task_title">
            <li class="column" id=<?php echo $task['completed']?>><?php echo $task['task']?></li>
        </div>
        <div class="task_options">
            <form class="column" action="./controllers/mark_task.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button type="submit">Mark</button>
            </form>
            <form class="column" action="index.php?page=edit_task" method="post">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button type="submit">Edit</button>
            </form>
            <form class="column" action="index.php?page=move_task" method="post">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button type="submit">Move</button>
            </form>
            <form class="column" action="./controllers/duplicate_task.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button type="submit">Duplicate</button>
            </form>
            <form class="column" action="./controllers/delete_task.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
    <?php endif; ?>
<?php endforeach; ?>