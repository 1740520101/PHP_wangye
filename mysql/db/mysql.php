<?php
    class MySQL{
        private $db;
        public function __construct($host,$user,$pass,$dbname){
            $this->db=mysqli_connect($host,$user,$pass,$dbname);
        }

        public function query($sql){
            $query = mysqli_query($this->db,$sql);
            if(!$query){
                die($this->getError());//查询错误，退出查询
            }
            return $query;
        }

        public function getRow($sql){
            $query = $this->query($sql);
            $info = mysqli_fetch_array($query);
            return $info;
        }

        public function getRows($sql){
            $query = $this->query($sql);
            $data=array();
            while($info = mysqli_fetch_array($query)){
                $data[] = $info;
            }
            return $data;
        }

        public function getInsertedId(){
            return mysqli_insert_id($this->db);
        }

        public function getError(){
            return mysqli_error($this->db);
        }
    }