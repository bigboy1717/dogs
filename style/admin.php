<style>
    img{
        width: 150px;
        height: 100px;
        border-radius: 15px;
        box-shadow: 3px 3px 3px 3px blue;
    }
    body, select, button, a, p, td, tr{
        background-color: darkcyan;
        color: white;
        font-size: 30px;
        text-decoration: none;
    }
</style>
<?php
require_once '../classec/DbConnect.php';
require_once '../classec/Dog.php';

$connect = new DbConnect();
$db=$connect->connect_pdo();

$dog=new Dog($db)
?>
<h1>Страница админа клуба собак "Белка и стрелка"</h1>
<a href="index.php#pageGL">Назад</a><br>
<a href="new.php">Добавить новую собачку</a>
<table border='1' style='margin:auto'> 
<?php
$tablDogs = $dog->getAll();
$rows = $tablDogs->fetchall();
foreach ($rows as $arry)
{
    echo "<tr><td>" . $arry['id_dog'] . "</td>
    <td>"  . $arry['nickname'] . "</td>
    <td>" . $arry['breed'] . "</td>
    <td align='center'>" . $arry['age'] . "</td>
    <td>"  . $arry['owner'] . "</td>
    <td align='center'>
    <img src='../".$arry['image']."' width='120px' alt=''></td> <td><div class='green'><a href='edit.php?num=".$arry['id_dog']."&amp;name=".$arry['nickname']."&amp;breed=".$arry['breed']."&amp;age=".$arry['age']."&amp;owner=".$arry['owner']."&amp;image=".$arry['image']."'>Редактировать</a></div><div class='red'><a href='?IDDELETE=".$arry['id_dog']."'>Удалить</a></div></td></tr>";
}
if(!empty($_GET['IDDELETE']))
{
    $numdel = $_GET['IDDELETE'];
    $sql1="SELECT * FROM dogs WHERE id_dog = $numdel ";
    unlink($arry['image']);
    $sql1="DELETE FROM `dogs` WHERE id_dog = $numdel";
    $rezult = $connect->getInfPDO()->query($sql1);
}
?></table>