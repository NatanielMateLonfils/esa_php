<?php foreach($tasks as $group_name => $group): ?>
    <?php foreach($group as $task_id => $task): ?>
        <?php if (($task['group'] == 'Ungrouped') && ($task['property'] == $connected_user)): ?>
        <div class="task">
            <div class="task_title">
                <li class="column" id=<?php echo $tasks[$group_name][$task_id]['completed']?>><?php echo $tasks[$group_name][$task_id]['task']?></li>
            </div>
            <div class="task_options">
                <?php if(!(isLowestTask($tasks, $group_name, $task_id, $connected_user))): ?>
                    <form class="column" action="./controllers/swing_task.php" method="post">
                        <input type="hidden" name="property" value="<?php echo $connected_user ?>">
                        <input type="hidden" name="group" value="<?php echo $group_name?>">
                        <input type="hidden" name="task_id" value="<?php echo $task_id?>">
                        <input type="hidden" name="direction" value="up">
                        <button type="submit" id="arrow">&#8593;</button>
                    </form>
                <?php endif; ?>
                <?php if(!(isHighestTask($tasks, $group_name, $task_id, $connected_user))): ?>
                    <form class="column" action="./controllers/swing_task.php" method="post">
                        <input type="hidden" name="property" value="<?php echo $connected_user ?>">
                        <input type="hidden" name="group" value="<?php echo $group_name?>">
                        <input type="hidden" name="task_id" value="<?php echo $task_id?>">
                        <input type="hidden" name="direction" value="down">
                        <button type="submit" id="arrow">&#8595;</button>
                    </form>
                <?php endif; ?>
                <form class="column" action="./controllers/mark_task.php" method="post">
                    <input type="hidden" name="group" value="<?php echo $group_name?>">
                    <input type="hidden" name="task_id" value="<?php echo $task_id?>">
                    <button type="submit">Mark</button>
                </form>
                <form class="column" action="index.php?page=edit_task" method="post">
                    <input type="hidden" name="group" value="<?php echo $group_name?>">
                    <input type="hidden" name="task_id" value="<?php echo $task_id?>">
                    <button type="submit">Edit</button>
                </form>
                <form class="column" action="index.php?page=move_task" method="post">
                    <input type="hidden" name="group" value="<?php echo $group_name?>">
                    <input type="hidden" name="task_id" value="<?php echo $task_id?>">
                    <button type="submit">Move</button>
                </form>
                <form class="column" action="./controllers/duplicate_task.php" method="post">
                    <input type="hidden" name="group" value="<?php echo $group_name?>">
                    <input type="hidden" name="task_id" value="<?php echo $task_id?>">
                    <button type="submit">Duplicate</button>
                </form>
                <form class="column" action="./controllers/delete_task.php" method="post">
                    <input type="hidden" name="group" value="<?php echo $group_name?>">
                    <input type="hidden" name="task_id" value="<?php echo $task_id?>">
                    <button type="submit" class="delete_button">Delete</button>
                </form>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>