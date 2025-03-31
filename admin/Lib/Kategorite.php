<?php

namespace Admin\Lib;
use Exception, PDO, PDOException, ReflectionClass;

class Kategorite extends Database {

    public $id;

    public $emri;

    // emri i tabeles

    protected static $db_table = "kategorite";

    // fushat qe perdoren per metoden create

    protected static $db_tables_fields = array('emri');


    public function setId($id) {

        $this->id = $id;

    }

    public function getId() {

        return $this->id;

    }

    public function setEmri($emri) {

        $this->emri = $emri;

    }

    public function getEmri() {

        return $this->emri;

    }
}