<?php

namespace Admin\Lib;
use Exception, PDO, PDOException, ReflectionClass;

class Librat extends Database {

    public $id;

    public $kategoriaId;

    public $titulli;

    public $autori;

    public $stafiId;

    public $foto;

    public $isbn;

    public $rafti;

    public $faqet;

    public $signatura;

    public $vendi_botimit;
	
    public $dataEPublikimit; 

    public $number_of_pages;

    protected static $db_table = "librat";

    // fushat qe perdoren per metoden create

    protected static $db_tables_fields = array( 'kategoriaId','stafiId', 'titulli', 'autori', 'foto','isbn','rafti', 'vendi_botimit','faqet','signatura','dataEPublikimit');


    public function setId($id) {

        $this->id = $id;

    }

    public function getId() {

        return $this->id;

    }
    public function setStafiID($stafiId) {

        $this->stafiId = $stafiId;

    }

    public function getStafiID() {

        return $this->stafiId;

    }


    public function setKategoriaId($kategoriaId) {

        $this->kategoriaId = $kategoriaId;

    }

    public function getKategoriaId() {

        return $this->kategoriaId;

    }

    public function setTitulli($titulli) {

        $this->titulli = $titulli;

    }

    public function getTitulli() {

        return $this->titulli;

    }

    public function setAutori($autori) {

        $this->autori = $autori;

    }

    public function getAutori() {

        return $this->autori;

    }

    public function setFoto($foto) {

        $this->foto = $foto;

    }

    public function getFoto() {

        return $this->foto;

    }

    public function setIsbn($isbn) {

        $this->isbn = $isbn;

    }

    public function getIsbn() {

        return $this->isbn;

    }

    public function setRafti($rafti) {

        $this->rafti = $rafti;

    }

    public function getRafti() {

        return $this->rafti;

    }

    public function setFaqet($faqet) {

        $this->faqet = $faqet;

    }

    public function getFaqet() {

        return $this->faqet;

    }

    public function setSignatura($signatura) {

        $this->signatura = $signatura;

    }

    public function getSignatura() {

        return $this->signatura;

    }

    public function setVendiBotimit($vendi_botimit) {

        $this->vendi_botimit = $vendi_botimit;

    }

    public function getVendiBotimit() {

        return $this->vendi_botimit;

    }
    
    public function setDataEPublikimit($dataEPublikimit) {

        $this->dataEPublikimit = $dataEPublikimit;

    }

    public function getDataEPublikimit() {

        return $this->dataEPublikimit;

    }

    public function find_all_books(){
        $sql="SELECT count(*) as NR FROM librat" ;
        $stmt=$this->prepare($sql);
        $stmt->execute();
       
        return $stmt->fetchColumn();
    }

    public function find_lastest(){
        $sql = "SELECT * FROM librat ORDER BY `dataEPublikimit` DESC  LIMIT 6";
        $stmt=$this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}