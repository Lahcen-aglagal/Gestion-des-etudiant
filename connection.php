<?php 
    session_start();
    $servername = "localhost";
    $dbname = "todo";
    $username = "root";
    $password = "";

  try{
    $con = new pdo( "mysql:dbhost=$servername;dbname=$dbname", $username, $password,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    $ex->getMessage();
    echo <<< END
    <script>
        alert ("connection failed");
    </script>
    END;
    // die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}
?>