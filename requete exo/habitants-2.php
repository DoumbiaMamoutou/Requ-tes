<?php
  session_start();

  require 'admin/database.php';

  if (!empty($_GET['id'])) {
    $id = $_GET['id'];


  $data = Database::connect();
  $query = $data->prepare("SELECT co.id AS id_cont, p.id AS id_pa, v.id AS id_vi, c.id AS id_co, h.id, h.nom, h.prenom, h.solde, h.numero, h.id_quartier, q.nom AS quartier, c.nom AS commune FROM  continents AS co, pays AS p, villes AS v, habitants AS h, communes AS c, quartiers AS q WHERE co.id = ? AND p.id_continent = co.id AND v.id_pays = p.id AND v.id = c.id_ville AND c.id = q.id_commune AND q.id = h.id_quartier ORDER BY h.solde DESC
");
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
    <h2>Table des habitants de l'Afrique</h2>

    <table class="table">
      <thead>
        <tr>
          <th>nom</th>
          <th>prenom</th>
          <th>commune</th>
          <th>solde</th>
          <th>numéro</th>
        </tr>
      </thead>
       <tbody>
          <?php foreach ($statement as $value): 
            $data = Database::connect();
            $query = $data->prepare("SELECT SUM(solde) as solde FROM habitants");
            $query->execute([$value["solde"]]);
            $solde = $query->fetch();
            ?>
          <tr>
            <td><?= $value['nom']; ?></td>
            <td><?= $value['prenom']; ?></td>
            <td><?= $value['commune']; ?></td>
            <td><?= $value['solde']; ?></td>
            <td><?= $value['numero']; ?></td>
            <td><button class="btn btn-danger">Supprimer</button></td>
          </tr>
        </tbody>
        <?php endforeach; ?>
      <tfooter>
        <tr>
          <th>Total</th>
          <th></th>
          <th></th>
          <th><?= $solde["solde"]; ?></th>
          <th></th>
        </tr>
      </tfooter>
      
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
