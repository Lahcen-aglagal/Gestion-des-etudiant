<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="table-responsive">
  <a href="ajouter.php">
  <button 
class="btn-add"><i class="fa fa-plus"></i> ADD</button>
  </a>
    <table>
        <header>
          <tr>
              <th>id</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Age</th>
              <th>Modifier</th>
              <th>Supprimer</th>
          </tr>
        </header>
        <tbody>
          
          <?php
              include_once "connection.php";
              $query ="select * from todo.student";
              $pstmt = $con->prepare($query);
              $pstmt->execute();
              $res = $pstmt->fetchAll();
              if (empty($res)) {
                echo <<< END
                    <H5 style="text-align: center; margin-top: 20px;">Il n'y a pas encore d'etudiant ajouter !</H5>
                  END;
              }else{
              $i=1;
              foreach ($res as $row){
                  echo <<< END
                  <tr>
                      <td>$i</td>
                      <td>{$row['nom']}</td>
                      <td>{$row['prenom']}</td>
                      <td>{$row['age']}</td>
                      <td>
                      <a href="modifier.php?id={$row['id']}">
                        <button id="modifier">
                        <i style="font-size: 23px;color: black;"id ="icon" class="bi bi-pencil-square"></i>
                        </button>
                      </a>
                      </td>
                      <td>
                        <a href="supprimer.php?id={$row['id']}">
                        <button style="border-color: transparent; background-color: transparent;outline: none;" name="supprimer">
                        <i class="bi bi-trash" style="font-size: 23px;color: black;"></i></button></a>
                      </td>
                  END;
                $i=$i+1;
              } 
            }
              ?>
          </tbody>
    </table>
    
</div>
        <!-- <td><a href="modifier.php?id=<?=$row['id']?>"><img src="images/pen.png"></a></td>
        <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="images/trash.png"></a></td> -->
    <!-- Optional JavaScript -->
    <script src="index.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>