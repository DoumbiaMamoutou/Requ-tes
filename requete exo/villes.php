<?php
  session_start();

  require 'admin/database.php';

   if (!empty($_GET['id'])) {
      $id = $_GET['id'];
      
      $data = Database::connect();
      $query = $data->prepare("SELECT c.id, v.nom, v.superficie, p.nom as nomp FROM villes AS v, pays AS p, continents AS c WHERE v.id_pays = p.id AND p.id_continent = c.id AND c.id = ?
");
      $query->execute([$id]);
      $statement = $query->fetchAll();
      Database::disconnect();

    }

    $error = [];

  if (!empty($_POST)) {
    $superficie = $_POST['superficie'];
    //var_dump($_POST);
    if (count($error) == 0) {
      $data = Database::connect();
      $statement = $data->prepare("UPDATE continents AS c, pays AS p, villes AS v SET v.superficie = ? WHERE c.id = p.id_continent AND p.id = v.id_pays AND p.id_pays = ?");
      //$statement->execute(array($superficie));    
      Database::disconnect();
    }
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
    <h2>Table des villes de l'Afrique</h2>
  
  <form id="form" class="form-group" method="POST" action="" enctype="multipart/form-data">
      <input class="form-control" id="superficie" name="superficie" placeholder="Entrez une Taille en km2">
      <div class="row">
          <div class="col-md-6">
            <select class="form-control">
            <option value="volvo">Abidjan</option>
            <option value="saab">Bouake</option>
            <option value="vw">Yamoussoukro</option>
            </select>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Modifier la superficie</button>
          </div>
      </div>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th>nom</th>
          <th>superficie</th>
          <th>Pays</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($statement as $value): ?>
        <tr>
          <td><?= $value['nom'] ?></td>
          <td><?= $value['superficie'] ?></td>
          <td><?= $value['nomp'] ?></td>
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