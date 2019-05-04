<?php
  session_start();

  require 'admin/database.php';

  $error = [];

  if (!empty($_POST)) {
    $ville1 = $_POST['ville1'];
    $ville2 = $_POST['ville2'];
    $ville3 = $_POST['ville3'];

    if (empty($ville1)) {
      $error[] = "Erreur";
    }
    if (count($error) == 0) {
      $data = Database::connect();
      $query = $data->prepare("INSERT INTO villes (nom, superficie, id_pays) VALUES (?,0,?), (?,0,?), (?,0,?)");
      $query->execute([$id]);
      $result = $query->fetchAll();
      $last_id = $data->prepare("SELECT LAST_INSERT_ID()");
      Database::disconnect();
    }

  }

  if (!empty($_GET['id'])) {
      $id = $_GET['id'];

    $data = Database::connect();
    $query = $data->prepare("SELECT co.id, p.id as id_pays, p.nom, p.superficie FROM pays AS p, continents AS co WHERE co.id = p.id_continent AND co.id = ?");
    $query->execute([$id]);
    $statement = $query->fetchAll();
    Database::disconnect();

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

  <div class="container">
    <h2>Table des pays de l'Afrique</h2>
  <form class="form-group" action="" method="POST" enctype="multipart/form-data">
    <input class="from-control" name="ville1" placeholder="Entrez un nom">
    <input class="from-control" name="ville2" placeholder="Entrez un nom">
    <input class="from-control" name="ville3" placeholder="Entrez un nom">
    <button class="btn btn-primary">Ajouter 3 villes</button>    
  </form>
    <table class="table">
      <thead>
        <tr>
          <th>nom</th>
          <th>superficie</th>
          <th>Nombres de villes</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($statement as $value):
            $data = Database::connect();
            $query = $data->prepare("SELECT COUNT(id) as nbr_ville FROM villes WHERE id_pays = ?");
            $query->execute([$value["id_pays"]]);
            $nbr_ville = $query->fetch();
            
         ?>
        <tr>
          <td><?= $value['nom'] ?></td>
          <td><?= $value['superficie'] ?></td>
          <td><?= $nbr_ville["nbr_ville"] ?></td>
        </tr>
      </tbody>
    <?php endforeach; ?>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
