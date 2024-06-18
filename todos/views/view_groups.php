<?php foreach ($groups as $id => $group): ?>
    <div class="group">
        <div class="group_title">
            <h2 class="pico-color-purple-450"><?php echo $group['group']?></h2>
        </div>
        <div class="group_options">
            <form action="index.php?page=edit_group" method="post">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <button type="submit">Edit</button>
            </form>
            <form action="./controllers/delete_group.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
    <?php foreach($tasks as $id => $task): ?>
        <?php if ($task['group'] == $group['group']): ?>
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
<?php endforeach; ?>