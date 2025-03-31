<?php

namespace Admin\Lib;
use Exception, PDO, PDOException, ReflectionClass;

class Huate extends Database {

    public $id;

    public $studentiId;

    public $stafiId;

    public $libriId;
    
    public $dataEMarrjes;

    public $dataEKthimit;

    public $statusi;

    protected static $db_table = "huate";

    // fushat qe perdoren per metoden create

    protected static $db_tables_fields = array( 'studentiId', 'stafiId', 'libriId', 'dataEMarrjes','dataEKthimit','statusi');


    public function setId($id) {

        $this->id = $id;

    }

    public function getId() {

        return $this->id;

    }


    public function setStudentiId($studentiId) {

        $this->studentiId = $studentiId;

    }

    public function getStudentiId() {

        return $this->studentiId;

    }

    public function setStafiId($stafiId) {

        $this->stafiId = $stafiId;

    }

    public function getStafiId() {

        return $this->stafiId;

    }

    public function setLibriId($libriId) {

        $this->libriId = $libriId;

    }

    public function getLibriId() {

        return $this->libriId;

    }

    

    public function setdataEMarrjes($dataEMarrjes) {

        $this->dataEMarrjes = $dataEMarrjes;

    }

    public function getdataEMarrjes() {

        return $this->dataEMarrjes;

    }
    
    public function setdataEKthimit($dataEKthimit) {

        $this->dataEKthimit = $dataEKthimit;

    }

    public function getdataEKthimit() {

        return $this->dataEKthimit;

    }

    public function setStatusi($statusi) {

        $this->statusi = $statusi;

    }

    public function getStatusi() {

        return $this->statusi;

    }

    public function find_all_huate(){
        $sql="SELECT count(*) as NR FROM huate" ;
        $stmt=$this->prepare($sql);
        $stmt->execute();
       
        return $stmt->fetchColumn();
    }

    public function find_all_students_with_pay(){
        $sql="SELECT s.id, s.emri, s.mbiemri from studentet s inner join pagesa p where s.id = p.studentiId AND p.dataESkadimit >= CURRENT_DATE" ;
        $stmt=$this->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }

    public function find_huat_studentid($id){
        $sql="SELECT * FROM huate WHERE studentiId = $id";
        $stmt=$this->prepare($sql);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }
    


}