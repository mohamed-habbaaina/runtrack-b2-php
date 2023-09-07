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

function insert_student(string $email, string $fullname, string $gender, $birthdate, $gradeId,) : void
{
    $queInsertStudent = "INSERT INTO `student` (`grade_id`, `email`, `fullname`, `birthdate`, `gender`) VALUES (:grade_id, :email, :fullname, :birthdate, :gender)";
    $insertStudent = getDb()->prepare($queInsertStudent);
    $insertStudent->bindParam(':grade_id', $gradeId);
    $insertStudent->bindParam(':email', $email);
    $insertStudent->bindParam(':fullname', $fullname);
    $insertStudent->bindParam(':birthdate', $birthdate);
    $insertStudent->bindParam(':gender', $gender);
    $insertStudent->execute();

}
if(isset($_GET['envoyer'])){
    if(isset($_GET['input-email']) && isset($_GET['input-fullname']) && isset($_GET['input-gender']) && isset($_GET['input-birthdate']) && isset($_GET['input-grade_id']))
    {
        insert_student($_GET['input-email'], $_GET['input-fullname'], $_GET['input-gender'], $_GET['input-birthdate'], $_GET['input-grade_id']);
    } else 
    {
        $message = 'please enter all input data';
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jour 02 | job 03</title>
</head>
<body>
<!-- input type email, name = input-email -->
<!-- - input type text, name = input-fullname -->
<!-- - select avec deux option (male, female), name = input-gender -->
<!-- - input type date, name = input-birthdate -->
<!-- - input type number, name = input-grade_id -->
<?php 
    if(isset($message))
    {
        echo $message;
    }
?>
    <form action="" method="get">

        <label for="input-email">Email</label>
        <input type="email" name="input-email" placeholder="Email ...">

        <label for="input-fullname">Full name</label>
        <input type="text" name="input-fullname" placeholder="Full name ...">

        <label for="input-gender">Gender</label>
        <select name="input-gender" id="input-gender">
            <option value="">--Please choose an option--</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label for="input-birthdate">Birthdate</label>
        <input type="date" name="input-birthdate" placeholder="Birthdate ...">

        <label for="input-grade_id">Grade id</label>
        <input type="number" name="input-grade_id" placeholder="Grade id ...">

        <input type="submit" name="envoyer" value="Envoyer"></input>
    </form>
</body>
</html>