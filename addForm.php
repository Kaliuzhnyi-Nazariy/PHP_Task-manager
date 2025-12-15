<?php

$user_id = $_SESSION['id'];

if (isset($_POST['submit_add'])) {

    $title = ($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if ($title !== '' && !empty($user_id)) {
        createTask($title, $description, $user_id);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="addform">
    <label>
        <h3>Title</h3>
        <input type="text" name="title" required>
    </label>

    <label>
        <h3>Description</h3>
        <textarea name="description" style="resize:none;"></textarea>
    </label>

    <button type="submit" name="submit_add">Add</button>
</form>