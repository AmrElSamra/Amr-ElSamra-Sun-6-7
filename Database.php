<?php
    
    class DataBase{
        public $conn, $query, $runQuery, $result;
        public function __construct()
        {
            $this->conn = mysqli_connect("localhost", "root", "", "route_c34") ;
        }
        public function selectAll($table){
            $this -> query = "SELECT * FROM $table LIMIT 5";
            $this -> runQuery = mysqli_query($this->conn, $this->query);
            $this -> result = mysqli_fetch_all($this->runQuery, MYSQLI_ASSOC);
            return $this -> result;
            
        }
        public function selectColumn($table, $columns){
            $this -> query = "SELECT $columns FROM $table LIMIT 5";
            $this -> runQuery = mysqli_query($this->conn, $this->query);
            $this -> result = mysqli_fetch_all($this->runQuery, MYSQLI_ASSOC);
            return $this -> result;
        }
        public function closeTheConnection(){
            mysqli_close($this->conn);
        }
    }
    $test = new DataBase;
    $data = $test -> selectColumn('customers', 'customerName');
    print_r($data);
    $test -> closeTheConnection();
        

?>