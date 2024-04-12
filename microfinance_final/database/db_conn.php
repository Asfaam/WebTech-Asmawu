<?php
require('db_cred.php');

class DbConnection {
    public $db = null;
    public $results = null;

    //connection
    function db_connect(){
        //connection
        $this->db = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
        
        if (mysqli_connect_errno()){
            return false;
        }else{
            return true;
        }
    }

    function db_query($sqlQuery){
        if (!$this->db_connect()){
            return false;
        }

        elseif ($this->db==null){
            return false;
        }

        $this->results = mysqli_query($this->db, $sqlQuery);
        if ($this->results == false){
            return true;
        }else{
            return false;
        }
    }

    function db_fetch(){
        if($this->results == null){
            return false;
        }
        else if($this->results == false){
            return false;
        }
        //return a record
        return mysqli_fetch_all($this->results, MYSQLI_ASSOC);
    }
}
?>