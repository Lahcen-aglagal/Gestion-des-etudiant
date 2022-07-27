<?php
    include_once "connection.php";

      if (isset($_GET['Update'])){

        if(isset($_GET['nom'])&& $_GET['nom']!=""  && isset($_GET['prenom'])&& $_GET['prenom']!="" && isset($_GET['age']) && $_GET['age']!=""){
            $id = $_GET['id'];
            $nom = $_GET['nom'];
            $prenom = $_GET['prenom'];
            $age = $_GET['age'];
            $query="UPDATE employe SET nom = :nom , prenom = :prenom , age = :age WHERE id = :id";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':nom' , $nom);
            $stmt->bindParam(':prenom' , $prenom);
            $stmt->bindParam(':age' , $age);
            $stmt->execute();
            header("location: index.php");
        }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
    }
        isset($_GET['id'])&& $_GET['id']!="" ; 
        $prstmt = $con->prepare("SELECT * FROM student WHERE id = :id");
        $id = $_GET['id'];
        $prstmt->bindParam(':id',$id);
        $prstmt->execute();
        $res= $prstmt->fetchAll();
      
  
    
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
    <form action="">
  <div class="popup">
    <a href="index.php">
        <div class="close-btn">&times;</div>
    </a>
    <h5 >Modifier l'etudiant: <i style="color: orangered;"><?php foreach ($res as $val){ $nom = $val['nom'];$prenom= $val['prenom']; echo" ${nom} ${prenom}";}?></i> </h5>
    <p class="erreur_message" style="font-size: 10px; color: red;">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <div class="">
            <label for="name" class="form-label">Nom</label>
            <input type="textarea" name="nom" class="form-control" id="Nom" placeholder="Enter votre nom" required value="<?php foreach ($res as $val){ echo $val['nom']; }?>">
        </div>
        <div class="">
            <label for="Prenom" class="form-label">Prenom</label>
            <input type="textarea" name="prenom" class="form-control" id="Prenom" placeholder="Enter votre prenom" required value="<?php foreach ($res as $val){ echo $val['prenom']; }?>">
        </div>
        <div class="">
            <label for="status" class="form-label">Age</label>
            <input type="number" class="form-control" name="Age" id="age" placeholder="Enter age" required value="<?php foreach ($res as $val){ echo $val['age']; }?>">
        </div>
        <hr>
        <div class="inputs">
            <a href=""><button type="submit" name="Update" class="btn btn-outline-success">Modifier</button></a>
            <button type="reset" class="btn btn-outline-warning">Reset</button>
            <a href="index.php"><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" id="close">Close</button></a>
        </div>
      </div>
      </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>