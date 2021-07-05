<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include_once 'connection/connection.php';
        include_once 'includes/head.php';
    ?>
</head>

<?php
    
    $sql = "UPDATE `user` SET `status`='Blocked' WHERE `id`='" . $_GET["id"] . "'";
    if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript">';
        echo ' alert("User Deactivated Successfully")';
        header('Location: all-user.php');
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>