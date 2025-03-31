<?php
namespace Admin\Lib;
use Exception, PDO, PDOException, ReflectionClass;

use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

define("DB_HOST", "localhost");
define("DB_USER", "bibllmga_medina");
define("DB_PASS", "devsfor2020");
define("DB_NAME", "bibllmga_bibloteka");
class Database{
    protected static $db_table;
    protected static $db_tables_fields;

    private $host   = DB_HOST;
    private $user   = DB_USER;
    private $pass   = DB_PASS;
    private $dbname = DB_NAME;
    public static $pdo;
    public function __construct(){
        $this->connectDB();
    }

    protected function connectDB(){
        try {
            $dsn="mysql:host=". $this->host . ";dbname=" . $this->dbname ;
            self::$pdo=new PDO($dsn,$this->user,$this->pass);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return self::$pdo;
        } catch (Exception $e) {
            echo "Lidhja me bazen e shenimeve deshtoi " . $e->getMessage();
        }
    }
    public function prepare($sql){
        return self::$pdo->prepare($sql);
    }

    public function getClassName(){
        $class_name = new ReflectionClass($this);
        return $class_name=ucfirst($class_name->getShortName());
    }

    protected function properties(){
        $proporties=array();
        foreach (static::$db_tables_fields as $db_field) {
            if(property_exists($this,$db_field)){
                $proporties[$db_field]=$this->$db_field;
            }
        }
        return $proporties;
    }
    public function find_all(){
        $sql="SELECT * FROM " . static::$db_table ;
        $stmt=$this->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
        return $stmt->fetchAll();
    }
    public function find_id($id){
        $sql="SELECT * FROM ". static::$db_table ." WHERE id=:id";
        $stmt=$this->prepare($sql);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
        return $stmt->fetch();
    }
    public function create(){
        try {
            $proporties=$this->properties();

            $sql="INSERT INTO " . static::$db_table . "(" . implode(", ",array_keys($proporties)) .")";
            $sql.="VALUES (:" . implode(",:", array_keys($proporties)) . ")";
            //echo $sql ."<br>";
            $stmt=$this->prepare($sql);
            //print_r($proporties);
            foreach ($proporties as $key => $value) {
                if(is_numeric($value)){
                    $stmt->bindValue(":".$key, $value,PDO::PARAM_INT);
                }else{
                    $stmt->bindValue(":".$key, $value, PDO::PARAM_STR);
                }
            }
            $stmt->execute();
            $this->id=self::$pdo->lastInsertId();
            return true;
        } catch (PDOException $e) {
            die("Error during the registration proccess" . $e->getMessage());
        }
    }
    public function update(){
        try {
            $proporties=$this->properties();
            $proporties_pair=array();
            foreach ($proporties as $key =>$value) {
                $proporties_pair[]="$key=:$key";
            }
            //print_r($proporties_pair);
            $sql="UPDATE ". static::$db_table . " SET ";
            $sql.=implode(", ", $proporties_pair);
            $sql.=" WHERE id=:id";
            $stmt=$this->prepare($sql);
            $stmt->bindParam(':id',$this->id);
            foreach ($proporties as $key => $value) {
                if(is_numeric($value)){
                    $stmt->bindValue(":".$key, $value,PDO::PARAM_INT);
                }else{
                    $stmt->bindValue(":".$key, $value, PDO::PARAM_STR);
                }
            }
            $stmt->execute();
            echo "{$this->getClassName()} modified successfully";
        } catch (PDOException $e) {
            die("Error during the modification proccess" . $e->getMessage());
        }
    }
    public function delete(){
        try {
            $sql="DELETE FROM " . static::$db_table . " WHERE id=:id";
            $stmt=$this->prepare($sql);
            $stmt->bindParam(':id',$this->id, PDO::PARAM_INT);
            $stmt->execute();
            echo "{$this->getClassName()} deleted successfully";
        } catch (PDOException $e) {
            die("Error during the deletion proccess" . $e->getMessage());
        }
    }
    
    

}
