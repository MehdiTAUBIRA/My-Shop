<?php
include_once("database.php");
$database = new Database();
$id = $_GET['id'];

if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
    $res= $database->deleteUser($id);
    header("Location: deleteUser.php");
} elseif (isset($_POST['confirm']) && $_POST['confirm'] == 'no') {
    header("Location: deleteUser.php");
}
?>

<?php if (!isset($_POST['confirm'])): ?>


    
    <form method="POST" >
        Are you sure you want to delete this user?<br />
        <input type="submit" name="confirm" value="yes">
        <input type="submit" name="confirm" value="no">
    </form>
<?php else: ?>
<?php endif; ?>
