<?php
  include_once "connection.php";
  if(isset($_GET['button']))
  {
    // if(isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['age'])){
      extract($_GET);
      if(isset($_GET['nom'])&& $_GET['nom']!=""  && isset($_GET['prenom'])&& $_GET['prenom']!="" && isset($_GET['age']) && $_GET['age']!=""){
              $nom = $_GET['nom'];
              $prenom = $_GET['prenom'];
              $age = $_GET['age'];
              $query = "INSERT INTO student(nom,prenom,age) VALUES  (:nom , :prenom ,:age)";
              $pstmt = $con->prepare($query);
              $pstmt->bindParam(':nom' , $nom);
              $pstmt->bindParam(':prenom' , $prenom);
              $pstmt->bindParam(':age' , $age);
              if($pstmt->execute()){
                header("location: index.php");
              }else{
                $message = "Employé non ajouté";
                  }
          }else{
            $message = "Veuillez remplir tous les champs !";
          }
}
   
    ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- link css style.css -->
    <link rel="stylesheet" href="Ajouter.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="ajouter">
      <a style="text-decoration: none;" href="index.php" class="back">
      <i class="bi bi-arrow-left"></i>Retour
      </a>
      <center>
        <h2 style="font-size:25px ; padding: 10px 0 10px 0;">Ajouter un etudiant</h2>
        <p style="color:red; font-size: 12px;" class="erreur_message">
              <?php 
              // si la variable message existe , affichons son contenu
              if(isset($message)){
                  echo $message;
              }
              ?>
          </p>
        <form action="ajouter.php" method="get">
          <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
          <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prenom"  aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
          <input type="number" class="form-control" name="age" id="age" placeholder="Age" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <input type="submit" class="btn btn-outline-info" name="button">
          </div>
        </form>
        </center>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>