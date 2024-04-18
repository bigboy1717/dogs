<style>
    img{
        width: 400px;
        height: 300px;
        border-radius: 15px;
        box-shadow: 3px 3px 3px 3px blue;
    }
    body, select, button, a{
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
<h1>Клуб любителей собак: 'Белка и стрелка'</h1>
<form action="" method='get'>
<select name="breeds" id="breeds">
    <?php
        $sql1="SELECT * FROM dogs";
        $rezult = $connect->getInfPDO()->query($sql1);
        $i = 0;
        $arr = [];
        while($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
                $arr[$i] = $rows['breed'];
                $i++;
            }
            $arrr = array_unique($arr);
            foreach($arrr as $item)
            {
                    print_r("<option>".$item."</option>");
            }
    ?>
</select>
<button type='submit' name='submit'>ЛЕСГОУ</button>
</form>
<?php
echo "<a href='/index.php#pageGL'>Назад</a></div>";
if(isset($_GET['submit']))
{
    $gt = $_GET['breeds'];
    $sql1="SELECT * FROM dogs WHERE breed = '$gt' ";
    $rezult = $connect->getInfPDO()->query($sql1);

    while($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
        print_r ("<div><img src='../".$rows['image']."' alt=''></div>");
        print_r("<div id='innercard'><p>Карточка № ". $rows['id_dog']. "<p>Кличка: ". $rows['nickname'] . "<br><p>Порода: ". $rows['breed'] . "<br><p>Лет: ". $rows['age'] . "<br> 
        ");
    }
}
?>