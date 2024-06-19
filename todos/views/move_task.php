<form action="./controllers/move_task.php" method="post">
    <label>Move your task here :</label>
    <input type="hidden" name="group" value="<?php echo $_POST['group']?>">
    <input type="hidden" name="task_id" value="<?php echo $_POST['task_id']?>">
    <select name="selectedGroup">
        <option value="Ungrouped">Ungrouped</option>
        <?php foreach($current_groups as $group): ?>
            <option value="<?php echo $group?>"><?php echo $group?></option>
        <?php endforeach?>
    </select>
    <input type="submit">
</form>
<form action="../index.php">
    <button type="submit" class="cancel_button">CANCEL</button>
</form>