<?php
  session_start();

  require 'admin/database.php';

  $data = Database::connect();
  $query = $data->prepare("SELECT * FROM continents");
  $query->execute([]);
  $statement = $query->fetchAll();
  Database::disconnect();

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
    <h2>Table des continents</h2>      
    <table class="table">
      <thead>
        <tr>
          <th>nom</th>
          <th>superficie</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($statement as $value): ?>
        <tr>
          <td><?= $value['nom'] ?></td>
          <td><?= $value['superficie'] ?></td>
          <td>
            <a class="btn btn-primary" href="pays.php?id=<?=$value['id'];?>"><span class="glyphicon glyphicon-eye-open"></span> Voir pays</a>
            <a class="btn btn-success" href="villes.php?id=<?=$value['id'];?>"><span class="glyphicon glyphicon-eye-open"></span> Voir villes</a>
            <a class="btn btn-danger" href="habitants-2.php?id=<?=$value['id'];?>"><span class="glyphicon glyphicon-eye-open"></span> Voir habitants</a> 
          </td>
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
