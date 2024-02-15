<?php
session_start();

include('../includes/config.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: courses.php");
    exit;
}

$course_id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM courses WHERE id = ?");
$stmt->execute([$course_id]);

header("Location: index.php");
exit;
?>
