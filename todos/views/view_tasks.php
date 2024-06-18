<h1>Tasks list</h1>

<?php foreach($tasks as $id => $task): ?>
    <div class="container">
        <div class="row">
            <li class="column" id=<?php echo $task['completed']?>><?php echo $task['task']?></li>
            <form class="column" action="./controllers/mark_task.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button type="submit">Mark</button>
            </form>
            <form class="column" action="index.php?page=edit_task" method="post">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button type="submit">Edit</button>
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
    
<?php endforeach; ?>