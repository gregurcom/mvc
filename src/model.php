<?php
// the logic and data access of an application is traditionally known as the "model" layer.

function open_database_connection(): PDO
{
    $dsn = "mysql:host=127.0.0.1;port=8889;dbname=mentor";
    try {
        return new PDO($dsn, 'root', 'root');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "</br>";
        die();
    }
}

function close_database_connection(PDO &$connection): void
{
    $connection = null;
}

function get_all_courses(): array
{
    $connection = open_database_connection();

    $result = $connection->query('SELECT * FROM courses');

    $courses = [];
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $courses[] = $row;
    }

    close_database_connection($connection);

    return $courses;
}

function get_course_by_id(int $id): array
{
    $connection = open_database_connection();

    $query = 'SELECT * FROM courses WHERE id = :id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $course = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$course) {
        header("Location: /mvc-cl/public/index.php");
        die();
    }

    close_database_connection($connection);

    return $course;
}