<?php
require_once 'classec/DbConnect.php';
require_once 'classec/Dog.php';

$connect = new DbConnect();

$db=$connect->connect_pdo();

$dog=new Dog($db);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:#00CED1;
        }
        .container{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }
    .card{
        background-color:aquamarine;
        border: 3px solid blue;
        padding: 5px;
    }
    .imgdogs{
        width: 280px;
        height: 240px;
    }
    </style>
</head>
<body>
<a href="index.php">Выбор карточки</a>
        <div>
        <h3>Выберите породу собаки</h3>
        <form method="POST" action="#">
            <select name="breed" id="breed">

            
        <?php
        $breed = "SELECT distinct breed FROM dogs";
        $rezult = $connect->getInfPDO()->query($breed);

        while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$rows['breed']."'>".$rows['breed'] ."</option>";
        }
        ?>
        </select>
        <button id="inp" name="inpu">Показать</button><br><br>
        </form>
        </div>



        <div class="container">

<?php

if(isset($_POST['inpu'])){
    $x = $_POST["breed"];

 $breedd = "SELECT * FROM dogs WHERE breed='$x'";
 $rows = $connect->getInfPDO()->query($breedd);
 foreach($rows as $arry){
?>

<div class="card" id="<?=$arry['id_dog']?>">
    <h3>Карточка № <?=$arry['id_dog']?></h3>
    <hr>
    <img src="<?=$arry['image']?>" alt="" class="imgdogs">
    <h3>Кличка: <?=$arry['nickname']?></h3>
    <h3>Порода: <?=$arry['breed']?></h3>
    <h3>Возраст: <?=$arry['age']?></h3>
    <h3>ФИО хозяина: <?=$arry['owner']?></h3>
</div>

<?php
 }}
?>
</div>
</body>
</html>