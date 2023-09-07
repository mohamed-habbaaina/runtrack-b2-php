<?php

function getDb()
{
    $servername = 'localhost';
    $username_b = 'root';
    $password_b = '';
    $database = 'lp_official';
    $_db = null;

    if (!$_db) {
        try {
            $_db = new PDO('mysql:dbname=' . $database . ';host=' . $servername . ';charset=utf8mb4', $username_b, $password_b);
            // prevent emulation of prepared requests
            $_db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            header("HTTP/1.1 403 Acces refused to the database");
            die();
        }
    }
    return $_db;
}
function find_all_students() : array
{
    $que = "SELECT * FROM `student`";
    $dataAllStudents = getDb()->prepare($que);
    $dataAllStudents->execute();
    return $dataAllStudents->fetchAll(PDO::FETCH_ASSOC);

}
// var_dump(find_all_students());
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jour 02 | job 01</title>
</head>
<body>

<table>
    <thead>
        <th>ID</th>
        <th>GRADE_ID</th>
        <th>EMAIL</th>
        <th>FULL NAME</th>
        <th>BIRTHDATE</th>
        <th>GENDER</th>
    </thead>
    <tbody>
        <?php
        $dataAllStudents = find_all_students();
        $i = 0;
        while(isset($dataAllStudents[$i]))
        {?>
        <tr>
        <td><?= $dataAllStudents[$i]['id']; ?></td>
        <td><?= $dataAllStudents[$i]['grade_id']; ?></td>
        <td><?= $dataAllStudents[$i]['email']; ?></td>
        <td><?= $dataAllStudents[$i]['fullname']; ?></td>
        <td><?= $dataAllStudents[$i]['gender']; ?></td>
        </tr>
        <?php 
        $i++;
        };?>
    </tbody>
</table>
    
</body>
</html>