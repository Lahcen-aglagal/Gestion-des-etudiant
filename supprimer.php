<?php
    include_once "connection.php";
    // if (isset($_GET['supprimer'])){
        $id=$_GET['id'];
        echo $id;
        $query ="DELETE FROM student WHERE id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        header("location: index.php");
    // }
?>