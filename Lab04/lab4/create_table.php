<!--- Име на трошок-->
<!---->
<!--- Датум на трошок-->
<!---->
<!--- Износ на трошок-->
<!---->
<!--- Начин на плаќање (кеш или картичка)  -->

<?php

$db = new SQLite3(__DIR__ . '/database/db.sqlite');

$createTableQuery = <<<SQL
CREATE TABLE IF NOT EXISTS small_firm (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    date TEXT UNIQUE NOT NULL,
    price INTEGER NOT NULL,
    type TEXT NOT NULL
);
SQL;


if ($db->exec($createTableQuery)) {
    echo "Table created successfully.";
} else {
    echo "Error creating table: " . $db->lastErrorMsg();
}

$db->close();
?>