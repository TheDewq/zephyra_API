<?php
        
    
    function db_connect(){ 
        try{
            $pdo = new PDO("mysql:dbname=zephyra;host=localhost", "root", "");
            return $pdo;
        }catch(PDOException $e){
            header("HTTP/1.1 500 error interno");
        }
    }