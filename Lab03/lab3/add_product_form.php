<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
</head>
<body>
<form action="add_product.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <br/>
    <label for="description">Description:</label>
    <input type="text" name="description" id="description" required>
    <br/>
    <label for="price">Price:</label>
    <input type="number" name="price" id="price" required>
    <br/>
    <button type="submit">Add Product</button>
</form>
</body>
