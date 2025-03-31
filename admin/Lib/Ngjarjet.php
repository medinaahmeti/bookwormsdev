<?php

namespace Admin\Lib;
use Exception, PDO, PDOException, ReflectionClass;

class Ngjarjet extends Database {

    public $id;

    public $stafiId;

    public $titulli;

    public $permbajtja;

    public $ora;

    public $data;


    // emri i tabeles

    protected static $db_table = "ngjarjet";

    // fushat qe perdoren per metoden create

    protected static $db_tables_fields = array('stafiId', 'titulli', 'permbajtja', 'ora', 'data');


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

    public function setTitulli($titulli) {

        $this->titulli = $titulli;

    }

    public function getTitulli() {

        return $this->titulli;

    }

    public function setPermbajtja($permbajtja) {

        $this->permbajtja = $permbajtja;

    }

    public function getPermbajtja() {

        return $this->permbajtja;

    }

    public function setOra($ora) {

        $this->ora = $ora;

    }

    public function getOra() {

        return $this->ora;

    }

    public function setData ($data) {

        $this->data = $data;

    }

    public function getData() {

        return $this->data;

    }

    
    public function find_all_ngjarjet(){
        $sql="SELECT count(*) as NR FROM ngjarjet" ;
        $stmt=$this->prepare($sql);
        $stmt->execute();
       
        return $stmt->fetchColumn();
    }
    
    public function find_lastest(){
        $sql = "SELECT * FROM ngjarjet ORDER BY `data` DESC  LIMIT 6";
        $stmt=$this->prepare($sql);
        // $stmt->bindParam(1, $startpos, PDO::PARAM_INT);
        // $stmt->bindParam(2, $endpos, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
 }