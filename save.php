<?php
include_once 'db.php';
if(isset($_POST['title']) && isset($_POST['body']))
{
    if(!empty($_POST['title']) && !empty($_POST['body']))
    {
        global $pdo;
        try
        {
            $s=$pdo->prepare('insert into articles set title=:title,body=:body');
            $s->bindValue(':title',$_POST['title']);
            $s->bindValue(':body',$_POST['body']);
            $s->execute();
           header('location:index.html');
           exit();
        }
        catch(PDOException $e)
        {
            echo 'insert is wrong!!!'.$e->getMessage();
        }
    }
}
else
    {
    echo 'please fill title and body';
    }