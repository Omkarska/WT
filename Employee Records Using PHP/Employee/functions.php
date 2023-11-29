<?php
include 'config.php';

function registerEmployee($username, $password, $full_name, $email)
{
    global $pdo;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO employees (username, password, full_name, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$username, $hashedPassword, $full_name, $email]);
}

function loginEmployee($username, $password)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }
}

function getAllEmployees()
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM employees");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateEmployee($id, $full_name, $email)
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE employees SET full_name = ?, email = ? WHERE id = ?");
    $stmt->execute([$full_name, $email, $id]);
}

function getEmployeeById($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deleteEmployee($id)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM employees WHERE id = ?");
    $stmt->execute([$id]);
}
?>
