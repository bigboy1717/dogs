<?php
class Dog{
    private $PDO;
    private $tablenameDogs = 'dogs';

    public $id_dog;
    public $nickname;
    public $breed;
    public $age;
    public $owner;
    public $image;

    public function __construct($db)
    {
        $this->PDO=$db;
    }
    public function getAll()
    {
    $query="SELECT * FROM " . $this->tablenameDogs . "
    ORDER BY id_dog ASC";
    $stmt = $this->PDO->prepare($query);
    $stmt->execute();
    return $stmt;
    }
    public function readName($id)
    {
        $this->id_dog = $id;
        $query = "SELECT * FROM " . $this->tablenameDogs . " WHERE id_dog = ? limit 0,1";
        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(1, $this->id_dog);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    function delete($id)
    {
        $this->id_dog = $id;
        $query = "DELETE FROM " . $this->tablenameDogs . "
        WHERE id-dog = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_dog);
        if ($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    function create()
    {
        $query = "INSERT INTO " . $this->tablenameDogs . "
        (`nickname`, `breed`, `age`, `owner`, `image`)
        VALUES(?,?,?,?,?)";
        $stmt = $this->PDO->prepare($query);
        $stmt = $bindParam(1, $this->nickname);
        $stmt = $bindParam(2, $this->breed);
        $stmt = $bindParam(3, $this->age);
        $stmt = $bindParam(4, $this->owner);
        $stmt = $bindParam(5,$this->image);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    function Edit($id)
    {
        $this->id_dog = $id;
        $query = "UPDATE " . $this->tablenameDogs . 
        "SET nickname=?, breed= ?, age=?, owner=?, image=? WHERE id_dog=?";
        $stmt = $this->PDO->prepare($query);
        $stmt->bindValue(1, $this->nickname);
        $stmt->bindValue(2,$this->breed);
        $stmt->bindValue(3, $this->age);
        $stmt->bindValue(4, $this->owner);
        $stmt->bindValue(5, $this->image);
        $stmt->bindValue(6, $this->id_dog);
        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>