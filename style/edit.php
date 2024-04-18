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
<head><link rel="stylesheet" href="style.css"></head>
<?php
require_once '../classec/DbConnect.php';
require_once '../classec/Dog.php';

$connect = new DbConnect();
$db=$connect->connect_pdo();

$dog=new Dog($db);
?>
<form action='' enctype="multipart/form-data" class='flx' method='post'>
    <?php
    $num = $_GET['num'];
    $name = $_GET['name'];
    $breed = $_GET['breed'];
    $age = $_GET['age'];
    $owner = $_GET['owner'];
    $image = $_GET['image'];
    print_r("
    <label for='name'>Имя собаки</label>
    <input type='text' name='name' value='".$name."'>
    <label for='breed'>Порода собаки</label>
    <input type='text' name='breed' value='".$breed."'>
    <label for='age'>Возраст собаки</label>
    <input type='text' name='age' value='".$age."'>
    <label for='owner'>Хозяин собаки</label>
    <input type='text' name='owner' value='".$owner."'>
    <img src='../".$image."'>
    <input type='file' accept='image/*' name='file'>");
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $owner = $_POST['owner'];
    $image = "../img/". $_FILES['file']['name'];
    ?>
    <button name='submit'>Погнали</button>
    <?php
    if(isset($_POST['submit']))
    {
        move_uploaded_file(
            $_FILES['file']['tmp_name'],$image);
        $sql1="UPDATE `dogs` SET `name`='$name',`breed`='$breed',`age`='$age',`owner`='$owner',`image`='$image' WHERE `id_dog` = '$num';";
        $rezult = $connect->getInfPDO()->query($sql1);
    }
    ?>
</form>