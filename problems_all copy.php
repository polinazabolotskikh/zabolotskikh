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
    <title>Все заявки</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
        <h1>000 Техносервис</h1>
    </header>
    <nav>
        <?php
         require_once('db.php');
         if(!empty($_SESSION['full_name'])){
                echo "<a href='index.php'>Главная</a>
                <a href='problems.php'>Подать заявку</a>
                <a href='problems_all copy.php'>Все заявки</a>
                <a href='logout.php'>Выход</a>";
            }
        else{
            
            echo "<a href='admin.php'>Главная</a>
            <a href='insert_worker.php'>Добавить исполнителя</a>
            <a href='update.php'>Изменить статус заявки</a>
            <a href='update_problem.php'>Изменить описание проблемы</a>
            <a href='problems.php'>Подать заявку</a>
            <a href='logout.php'>Выход</a>";
        }
        
        ?>
        
    </nav>
    <main>
    <h2>Все заявки</h2>
    <table class="table1">
        <tr>
            <th>Номер заявки</th>
            <th>Дата добавления</th>
            <th>Оборудование</th>
            <th>Тип неисправности</th>
            <th>Описание проблемы</th>
            <th>ФИО клиента</th>
            <th>Статус заявки</th>
        </tr>
        <?php
        if(!empty($_SESSION['full_name'])){
            $search = mysqli_query($link, "SELECT * FROM problems WHERE full_name='$_SESSION[full_name]'");
            while($res=mysqli_fetch_assoc($search)){
                echo "<tr>
                <td>$res[id]</td>
                <td>$res[date_start]</td>
                <td>$res[equipment]</td>
                <td>$res[problem]</td>
                <td>$res[descript]</td>
                <td>$res[full_name]</td>
                <td>$res[status]</td></tr>";
            }
        }
        else{
            $result=mysqli_query($link,"SELECT * FROM problems ORDER BY id DESC");
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>$row[id]</td>
            <td>$row[date_start]</td>
            <td>$row[equipment]</td>
            <td>$row[problem]</td>
            <td>$row[descript]</td>
            <td>$row[full_name]</td>
            <td>$row[status]</td></tr>";
        }
        }
        ?>
    </table>
    </main>
 
</body>
</html>