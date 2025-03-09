<?php
//
//<!--- Име на трошок-->
//<!---->
//<!--- Датум на трошок-->
//<!---->
//<!--- Износ на трошок-->
//<!---->
//<!--- Начин на плаќање (кеш или картичка)  -->

// Include the database connection file
include 'db_connection.php';

// Check if the request method is POST to handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form values from the POST request, with basic validation
    $name = $_POST['name'] ?? '';
    $date = $_POST['date'] ?? '';
    $price = (int)($_POST['price'] ?? 0);
    $type = ($_POST['type'] ?? 0);

    // Validate required fields
    if (empty($name) || empty($date)  || empty($type)|| $price <= 0) {
        echo "Please fill in all required fields correctly.";
        exit;
    }

    // Connect to the SQLite database
    $db = connectDatabase();

    // Prepare and execute the insert statement
    $stmt = $db->prepare("INSERT INTO small_firm (name, date, price,type) VALUES (:name, :date, :price, :type)");
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':date', $date, SQLITE3_TEXT);
    $stmt->bindValue(':price', $price, SQLITE3_INTEGER);
    $stmt->bindValue(':type', $type, SQLITE3_TEXT);


    // Execute the statement and check for success
    if ($stmt->execute()) {
        // Redirect back to the view page
        header("Location: index.php");
    } else {
        echo "Error adding record: " . $db->lastErrorMsg();
    }

    // Close the database connection
    $db->close();
} else {
    // If not a POST request, display an error message
    echo "Invalid request method. Please submit the form to add a record.";
}

