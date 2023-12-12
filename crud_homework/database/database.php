<?php
/**
 * Connect to database
 */
$pdo = db();
function db() {
    $host = 'localhost';
    $dbname = 'studentmanagement';
    $username = 'root';
    $password = '';
    
    // PDO connection string
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    // PDO options
    try {
        $pdo = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        // Handle connection errors
        die("Connection failed: " . $e->getMessage());
    }
    return $pdo;
}   

/**
 * Create new student record
 */
function createStudent($value) {
    global $pdo;
    $sql = "INSERT INTO student (name, age, email, profile) VALUES (:name, :age, :email, :profile)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $value['name'],
        ':age' => $value['age'],
        ':email' => $value['email'],
        ':profile' => $value['profile'],
        // Add other columns as needed
    ]);
}

/**
 * Get all data from table student
 */
function selectAllStudents() {
    global $pdo;
    $sql = "SELECT * FROM student";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $students = $stmt->fetchAll();

    return $students;
}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
    global $pdo;
    $sql = "SELECT * FROM student WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id,
    ]);

    $students = $stmt->fetchAll();

    return $students;
}

/**
 * Delete student by id
 */
function deleteStudent($id) {
    global $pdo;
    $sql = "DELETE FROM student WHERE id = :id";
        // Prepare and execute the query with the provided ID
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
        ]);

        // Handle query errors
}

/**
 * Update students
 * 
 */
function updateStudent($value) {
    global $pdo;
    $sql = "UPDATE student SET name = :name, age = :age, email = :email, profile = :profile  WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $value["id"],
        ':name' => $value['name'],
        ':age' => $value['age'],
        ':email' => $value['email'],
        ':profile' => $value['profile'],
        // Add other columns as needed
    ]);
}
