<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $db = connectDatabase();

    $stmt = $db->prepare("SELECT * FROM small_firm WHERE id = :id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $record = $result->fetchArray(SQLITE3_ASSOC);

    $db->close();
} else {
    die("Invalid record ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
</head>
<body>
<h1>Update Record</h1>

<?php if ($record): ?>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($record['id']); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($record['name']); ?>" required><br><br>
        <label for="date">Date:</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($record['date']); ?>" required><br><br>
        <label for="price">Price:</label>
        <input type="number" name="price" value="<?php echo htmlspecialchars($record['price']); ?>" required><br><br>
        <label for="type">Type:</label>
        <select id="type" name="type">
            <option  value="<?php echo htmlspecialchars($record['type']); ?>"></option>
            <option  value="<?php echo htmlspecialchars($record['type']); ?>"></option>

<!--            <option value="card">Card</option>-->
        </select>
        <button type="submit">Update Record</button>
    </form>
<?php else: ?>
    <p>Product not found.</p>
<?php endif; ?>
</body>
</html>
