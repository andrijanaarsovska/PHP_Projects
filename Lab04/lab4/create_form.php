<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create</title>
</head>
<body>
<form action="create.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    <br/>
    <label for="date">Date:</label>
    <input type="date" name="date" id="date">
    <br/>
    <label for="price">Price:</label>
    <input type="number" name="price" id="price">
    <br/>
    <label for="type">Type:</label>
    <select id="type" name="type">
        <option value="cash">Cash</option>
        <option value="card">Card</option>
    </select>
    <br/>
    <button type="submit">Add Record</button>
</form>
</body>
