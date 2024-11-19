<?php
session_start();
if(empty($_SESSION['auth'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить статус заявки</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
        <h1>000 Техносервис</h1>
    </header>
    <nav>
        <a href="admin.php">Главная</a>
        <a href="insert_worker.php">Добавить исполнителя</a>
        <a href="update.php">Изменить статус заявки</a>
        <a href="update_problem.php">Изменить описание проблемы</a>
        <a href="problems.php">Подать заявку</a>
        <a href="logout.php">Выход</a>
    </nav>
    <main>
    <h2>Изменить статус заявки</h2>
    <form class="form1" action="" method="POST">
        <table>
            <tr>
                <td>Номер заявки</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>Сменить статус заявки</td>
                <td>
                    <select name="status">
                        <option value="в ожидании">в ожидании</option>
                        <option value="в работе">в работе</option>
                        <option value="выполнено">выполнено</option>
                    </select>
                </td>
            </tr>
            <tr>
            <td></td>
            <td><button name="button">Изменить</button></td>
            </tr>
        </table>
    </form>
    <?php
    require_once("db.php");
    if (isset($_POST['button'])){
    if(!empty($_POST['id']) && !empty($_POST['status'])){
        $id=$_POST['id'];
        $status=$_POST['status'];
        $result=mysqli_query($link,"UPDATE problems SET status='$status' WHERE id='$id'");
        $q=mysqli_query($link,"UPDATE problems SET date_end = NOW() WHERE status='выполнено' AND id='$id'");
        if($result=='true'){
            header("Location:admin.php");
        }
    } else {
        echo "Все поля должны быть заполнены";
    }
    }
    ?>
    </main>
 
</body>
</html>