<?php
require_once 'classec/DbConnect.php';
require_once 'classec/Dog.php';

$connect = new DbConnect();
$db=$connect->connect_pdo();

$dog=new Dog($db);

$part = $_GET['part'];
$tablDog = $dog->readName($part);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            background-color:#FFCC99;
        }
       .contain{
            width:100%;
            margin:2px;
            padding:10px;
            display:flex;
            flex-direction:column;
       }
       
       .dog{
        witdh:100%;
        border-radius:15px;
       }
    </style>
</head>
<body>
    <div class="contain">

 <div class="text">
 <h4>Карточка № <?=$tablDog['id_dog'] ?></h4>
 <hr>
<h4>Кличка: <?= $tablDog['nickname'] ?></h4>
<h4>Порода: <?= $tablDog['breed'] ?></h4>
<h4>Возраст: <?= $tablDog['age'] ?></h4>
<h4>Хозяин: <?= $tablDog['owner'] ?></h4>
</div>
<div>
<img src="<?= $tablDog['image']?>" class="dog" alt="">
<h4><a href="index.php">Назад</a></h4>
</div>

</div>
</body>
</html>
