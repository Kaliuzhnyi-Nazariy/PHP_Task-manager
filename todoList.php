<?php
if (isset($_POST['update_status'])) {
    $taskId = (int)($_POST['task_id']);
    $status = $_POST['new_status'];
    $newStatus = '';

    if (empty($taskId) || empty($status)) {
        return;
    }

    if ($status == 'todo') {
        $newStatus = 'in_progress';
    } elseif ($status == 'in_progress') {
        $newStatus = 'completed';
    } else {
        return;
    }

    updateStatus($newStatus, $taskId);

    header("Location: " . $_SERVER['PHP_SELF']);

    exit();
}

function statusText(string $status): string
{
    if ($status == 'todo') {
        return 'to-do';
    } elseif ($status == 'in_progress') {
        return 'in progres';
    } else {
        return 'finish';
    }
}

function statusTextButton(string $status): string
{
    if ($status == 'todo') {
        return 'update status to in progres';
    } elseif ($status == 'in_progress') {
        return 'update status to finish';
    } else {
        return 'accomplished';
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete_task'])) {
    deleteTask($_POST['id']);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$tasks = getAllTasks($_SESSION['id']);
?>

<?php if (!empty($tasks)):  ?>
    <ul id="taskList" class="todoList">
        <?php
        foreach ($tasks as $task): ?>
            <li class="todoItem">
                <div class="info">
                    <div style="width:100%;"><b>Title</b>: <?= htmlspecialchars($task['title']) ?></div>
                    <?= htmlspecialchars("Status: " . statusText($task['status'])) ?>
                    <?php if (!empty($task['description'])): ?>
                        <b>Description: </b>
                        <article><?= htmlspecialchars($task['description']) ?></article>
                    <?php endif; ?>
                </div>

                <div class="buttons">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="task_id" value="<?= $task['id'] ?>">

                        <input type="hidden" name="new_status"
                            value="<?= $task['status']  ?>">

                        <button name='update_status' type="submit" <?= $task['status'] === 'completed' ? 'disabled' : '' ?>><?= htmlspecialchars(statusTextButton($task['status'])) ?></button>

                    </form>

                    <form action="<?= $_SERVER['PHP_SELF'] ?>  ?>" method="post">
                        <input type="hidden" name="id" value="<?= $task['id'] ?>">
                        <button type="submit" name='delete_task'>Delete</button>
                    </form>
                </div>

            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No tasks so far!</p>
<?php endif; ?>