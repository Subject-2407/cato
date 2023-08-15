<?php

// Set up the database connection
$host = "localhost";
$user = "bintang10";
$pass = "990705";
$dbname = "incubator";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

// Handle GET requests for users
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Prepare SQL statement to retrieve users
    $sql = "SELECT * FROM user_catos";

    // Execute the SQL query
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the results and return as JSON
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($results);
}

?>