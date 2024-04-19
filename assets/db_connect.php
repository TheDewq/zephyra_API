<?php
        
    
    function db_connect(){ 
        try{
            $pdo = new PDO("mysql:dbname=if0_36394609_zephyra;host=	sql213.infinityfree.com", "if0_36394609", "Jy4lG8pW7cirI");
            return $pdo;
        }catch(PDOException $e){
            header("HTTP/1.1 500 error interno");
        }
    }