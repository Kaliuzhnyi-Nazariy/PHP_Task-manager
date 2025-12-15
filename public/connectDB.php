<?php
// $DB_HOST = getenv('DB_HOST');
// $DB_USER = getenv('DB_USER');
// $DB_PASSWORD = getenv('DB_PASSWORD');
// $DB_DATABASE = getenv('DB_DATABASE');

$dsn = "pgsql:host=$DB_HOST;port=5432;dbname=$DB_DATABASE";

try {
    $conn = new PDO($dsn, $DB_USER, $DB_PASSWORD);
    // $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
} catch (\Exception $e) {
    echo 'Error connecting db: ' . $e->getMessage();
}
