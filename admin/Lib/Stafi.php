<?php

namespace Admin\Lib;
use Exception, PDO, PDOException, ReflectionClass;

class Stafi extends Database {

    public $id;

    public $emri;

    public $mbiemri;

    public $adresa;

    public $email;

    public $password;

    public $telefoni;

    public $roli;

    // emri i tabeles

    protected static $db_table = "stafi";

    // fushat qe perdoren per metoden create

    protected static $db_tables_fields = array('emri', 'mbiemri', 'adresa', 'email', 'password', 'telefoni', 'roli');


    public function setId($id) {

        $this->id = $id;

    }

    public function getId() {

        return $this->id;

    }

    public function setRoli($roli) {

        $this->roli = $roli;

    }

    public function getRoli() {

        return $this->roli;

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

    public function setPassword ($password) {

        $this->password = $password;

    }

    public function getPassword() {

        return $this->password;

    }

    public function setTelefoni ($telefoni) {

        $this->telefoni = $telefoni;

    }

    public function getTelefoni() {

        return $this->telefoni;

    }

    public function verify_user($email,$password){
        $sql="SELECT * FROM stafi WHERE email=:email AND password=:password";
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

    public function find_all_stafi(){
        $sql="SELECT count(*) as NR FROM stafi" ;
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
}