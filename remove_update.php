<?php
include_once 'db.php';
global $pdo;
//delete rows
if(isset($_POST['deletebtn']))
{
    try {
        $s = $pdo->prepare('delete from articles where id=:id');
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
        header('location:showArticle.php');
        exit();
    }
    catch (PDOException $e)
    {
        echo 'delete is wrong'.$e->getMessage();
    }
}
//update row
if(isset($_POST['editbtn'])):
        $s=$pdo->prepare("select * from articles where id=:id");
        $s->bindValue(':id',$_POST['id']);
        $s->execute();
        $row=$s->fetch();
    ?>
    <style>textarea{width: 1100px;height: 500px;}input{display: block;width: 1100px;}</style>
    <form action="?edit" method="post">
        <input type="text" name="titleedit" value="<?php echo $row['title'] ?>">
        <textarea type="text" name="bodyedit"><?php echo $row['body'] ?></textarea>
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="submit" name="edit" value="edit">
    </form>
<?php endif; ?>
<?php
if (isset($_GET['edit'])) {
    try {
    $s = $pdo->prepare('update articles set title=:title,body=:body where id=:id');
    $s->bindValue(':title', $_POST['titleedit']);
    $s->bindValue(':body', $_POST['bodyedit']);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
    header('location:showArticle.php');
    exit();
} catch (PDOException $e) {
    echo 'update is wrong' . $e->getMessage();
    }
}
