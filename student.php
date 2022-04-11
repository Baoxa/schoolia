
    <?php
    include('navbar.php');
    include('verif_admin.php');
     ?>
    <div class="container-fluid mt-3 mb-3">
      <div class="row flex-xl-nowrap">
        <div class="col-md-3 col-xl-2 bd-sidebar">
          <div class="collapse d-md-block shadow p-3 mb-5 bg-white bg-custom-1" id="bd-docs-nav">
            <nav class="bd-links" aria-label="Main navigation">
              <div class="bd-toc-item">
                <a class="bd-toc-link text-white" href="student.php">Liste étudiants</a>
              </div>
              <div class="bd-toc-item">
                <a class="bd-toc-link text-white" href="sensei.php">Liste tuteur</a>
              </div>
              <div class="bd-toc-item">
                <a class="bd-toc-link text-white" href="graph.php">Graphique de connexions</a>
              </div>
              <!-- <div class="bd-toc-item">
                <a class="bd-toc-link text-decoration-none text-white" href="#">Liste messagerie</a>
              </div> -->
            </nav>
          </div>
        </div>
        <div>
          <h1>Liste des étudiants</h1>
          <?php
            $req = $db->query('SELECT * FROM student WHERE type ="Etudiant" ORDER BY name ASC');

            $students = $req->fetchAll();
            ?>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">Email</th>
                  <th scope="col">Date de naissance</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">Code postal</th>
                  <th scope="col">Ville</th>
                  <th scope="col"></th>
                </tr>
              </thead>
            <?php foreach ($students as $student):  ?>
                <tbody>
                  <tr>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['firstname'] ?></td>
                    <td><?= $student['mail'] ?></td>
                    <td><?php $dateMySQL = $student['birthday']; echo date("d-m-Y", strtotime($dateMySQL));?></td>
                    <td><?= $student['address'] ?></td>
                    <td><?= $student['postal'] ?></td>
                    <td><?= $student['city'] ?></td>
                    <td><a class="btn btn-dark" href="modify_profil.php?id=<?= $student['id'] ?>" role="button">Modifier</a></td>
                    <td><a class="btn btn-dark" href="delete_profil.php?id=<?= $student['id'] ?>" role="button">Supprimer</a></td>
                  </tr>
                </tbody>
            <?php endforeach ?>
            </table>

        </div>
      </div>
    </div>
  </body>
</html>
