<?php
    //const for DB
    const SERVERNAME='localhost';
    const PASSWORD='';
    const USERNAME='root';
    const DBNAME='articles';
    //connect to DB
    try
    {
        $pdo=new PDO('mysql:host='.SERVERNAME.';dbname='.DBNAME,USERNAME,PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES utf8');
    }
    catch(PDOException $e)
    {        
        $erro='Unable to connect to database '.$e->getMessage();
        exit();
    }
?>