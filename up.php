<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include_once 'connection/connection.php';
        include_once 'includes/head.php';
    ?>
</head>
    <?php
        $id = $_GET['id'];
        $owner = $_POST["owner"];
        $status = $_POST["status"];	
        $record = mysqli_query($conn,"UPDATE `asset` SET `asset_owner`='$owner',`status`='$status' WHERE `id`='$id'");
        if($record){
            echo '<script type="text/javascript">';
            echo ' alert("Asset Details Updated Successfully")';
            header('Location: all-asset.php');
            echo '</script>';
        }else{
            echo "Error: " . $record . " " . mysqli_error($conn);
        }
    ?>