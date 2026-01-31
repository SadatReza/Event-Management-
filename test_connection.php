<?php
require_once('database.php');
echo "Connection successful!";
$result = $conn->query("SHOW TABLES");
echo "<pre>Tables in database: " . print_r($result->fetch_all(), true) . "</pre>";
?>