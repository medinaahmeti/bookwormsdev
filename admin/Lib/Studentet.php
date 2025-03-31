<?php

namespace Admin\Lib;
use Exception, PDO, PDOException, ReflectionClass;

class Studentet extends Database {

    public $id;
    
    public $nr_serik;

    public $stafiId;

    public $emri;

    public $mbiemri;

    public $adresa;

    public $email;

    public $telefoni;

    public $password;

    public $roli;

    // emri i tabeles

    protected static $db_table = "studentet";

    // fushat qe perdoren per metoden create

    protected static $db_tables_fields = array('stafiId','nr_serik', 'emri', 'mbiemri', 'adresa', 'email', 'password','telefoni','roli');


    public function setId($id) {

        $this->id = $id;

    }

    public function getId() {

        return $this->id;

    }
    
      public function setNrSerik($nr_serik) {

        $this->nr_serik = $nr_serik;

    }

    public function getNrSerik() {

        return $this->nr_serik;

    }


    public function setRoli($roli) {

        $this->roli = $roli;

    }

    public function getRoli() {

        return $this->roli;

    }
    
    public function setStafiID($stafiId) {

        $this->stafiId = $stafiId;

    }

    public function getStafiID() {

        return $this->stafiId;

    }

    public function setEmri($emri) {

        $this->emri = $emri;

    }

    public function getEmri() {

        return $this->emri;

    }

    public function setMbiemri($mbiemri) {

        $this->mbiemri = $mbiemri;

    }

    public function getMbiemri() {

        return $this->mbiemri;

    }

    public function setAdresa($adresa) {

        $this->adresa = $adresa;

    }

    public function getAdresa() {

        return $this->adresa;

    }

    public function setEmail ($email) {

        $this->email = $email;

    }

    public function getEmail() {

        return $this->email;

    }

    public function setTelefoni ($telefoni) {

        $this->telefoni = $telefoni;

    }

    public function getTelefoni() {

        return $this->telefoni;

    }
    public function setPassword ($password) {

        $this->password = $password;

    }

    public function getPassword() {

        return $this->password;

    }

    public function find_all_students(){
        $sql="SELECT count(*) as NR FROM studentet" ;
        $stmt=$this->prepare($sql);
        $stmt->execute();
       
        return $stmt->fetchColumn();
    }

     //Check if user already registred
     public function user_exist($email){
        $sql = "SELECT email FROM stafi WHERE email = :email";
        $stmt = $this->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function verify_user($email,$password){
        $sql="SELECT * FROM studentet WHERE email=:email AND password=:password";
        $stmt=$this->prepare($sql);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->bindValue(':password',$password,PDO::PARAM_STR);
        try {
           
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
            return $stmt->fetch();
        }catch (Exception $e) {
            echo "Gabim " . $e->getMessage();
        }
    }


}