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

            $_db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        } catch (PDOException $e) {
            header("HTTP/1.1 403 Acces refused to the database");
            die();
        }
    }
    return $_db;
}
function find_one_student(string $email) : array
{
    {
        $queOneStudent = "SELECT * FROM `student` WHERE email = :email";
        $dataOneStudent = getDb()->prepare($queOneStudent);
        $dataOneStudent->bindParam(':email', $email);
        $dataOneStudent->execute();
        return $dataOneStudent->fetchAll(PDO::FETCH_ASSOC);
    }
}
if (isset($_GET['input-email-student'])) 
{

    $email = $_GET['input-email-student'];
    // var_dump(find_one_student($email));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jour 02 | job 02</title>
</head>
<body>
    <form action="" method="get">
        <label for="input-email-student">Email</label>
        <input type="text" name="input-email-student" placeholder="Entre l'email ...">
        <button>Envoyer</button>
    </form>
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
    if(isset($_GET['input-email-student']))
    {; 
        $dataOneStudent = find_one_student($email);

        if(isset($dataOneStudent[0])){
    ?>
        <tr>
        <td><?= $dataOneStudent[0]['id']; ?></td>
        <td><?= $dataOneStudent[0]['grade_id']; ?></td>
        <td><?= $dataOneStudent[0]['email']; ?></td>
        <td><?= $dataOneStudent[0]['fullname']; ?></td>
        <td><?= $dataOneStudent[0]['gender']; ?></td>
        </tr>


    <?php } else {; ?>
    <tr>
        <td>id</td>
        <td>grade_id</td>
        <td>email</td>
        <td>full name</td>
        <td>birthdate</td>
        <td>gender</td>

    </tr>
    <?php }};
    ?>
    </tbody>
    </table>
</body>
</html>