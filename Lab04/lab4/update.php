<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $date = $_POST['date'];
    $price = intval($_POST['price']);
    $type = intval($_POST['type']);

    $db = connectDatabase();

    // Update student details
    $stmt = $db->prepare("UPDATE small_firm SET name = :name, date = :date, price = :price, type = :type WHERE id = :id");
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':date', $date, SQLITE3_TEXT);
    $stmt->bindValue(':price', $price, SQLITE3_INTEGER);
    $stmt->bindValue(':type', $type, SQLITE3_INTEGER);
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();

    // Close the database connection
    $db->close();

    // Redirect back to the view page
    header("Location: index.php");
    exit();
} else {
    echo "Invalid request.";
}
?>

