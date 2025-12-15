<?php
require_once 'connectDB.php';

function getAllTasks(int $owner_id): array
{
    global $conn;
    $stmt = $conn->query("SELECT * FROM tasks where owner = $owner_id");
    return $stmt->fetch_all(MYSQLI_ASSOC);
}

function createTask(string $title, string $description, int $id)
{
    global $conn;
    $req = $conn->prepare("INSERT INTO tasks (title, description, owner) VALUES (?, ?, ?)");
    $req->bind_param('ssi', $title, $description, $id);
    $req->execute();
    return $req;
}

function updateStatus(string $status, int $id)
{
    global $conn;
    $req = $conn->prepare("UPDATE tasks SET STATUS = ? WHERE id = ?");
    $req->bind_param('si', $status, $id);
    $req->execute();
    return $req;
}

function deleteTask(int $id)
{
    global $conn;
    $req = $conn->prepare("DELETE FROM tasks where id=?;");
    $req->bind_param('i', $id);
    $req->execute();
    return $req;
}
