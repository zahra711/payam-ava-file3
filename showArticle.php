<?php
include_once 'db.php';
global $pdo;
//select from article table
$result=$pdo->query('select * from articles');
$rows=$result->fetchAll(PDO::FETCH_ASSOC);
?>
<table border="1">
    <thead>
    <tr>
        <td>id</td>
        <td>title</td>
        <td>body</td>
        <td>delete\update</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $row): ?>
    <tr>
        <td>
            <?php echo $row['id']; ?>
        </td>
        <td>
            <?php echo $row['title']; ?>
        </td>
        <td>
            <?php echo $row['body']; ?>
        </td>
        <td>
            <form method="post" action="remove_update.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="submit"  name="deletebtn" value="delete">
                <input type="submit"  name="editbtn" value="edit">
            </form>
        </td>
    <?php endforeach; ?>
        </tr>
    </tbody>
</table>
