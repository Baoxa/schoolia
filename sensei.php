
    <?php
    include('navbar.php');
    include('verif_admin.php');
          ?>

    </nav>
    <div class="container-fluid mt-3 mb-3">
      <div class="row flex-xl-nowrap">
        <div class="col-md-3 col-xl-2 bd-sidebar">
          <div class="collapse d-md-block shadow p-3 mb-5 bg-white rounded bg-custom-1" id="bd-docs-nav">
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
          <h1>Liste des tuteurs</h1>
          <?php
            $req = $db->query('SELECT * FROM student WHERE type ="Tuteur" ORDER BY admin DESC');

            $tutors = $req->fetchAll();
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
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
            <?php foreach ($tutors as $tutor):  ?>
                <tbody>
                  <tr>
                    <td><?= $tutor['name'] ?></td>
                    <td><?= $tutor['firstname'] ?></td>
                    <td><?= $tutor['mail'] ?></td>
                    <td><?php $dateMySQL = $tutor['birthday']; echo date("d-m-Y", strtotime($dateMySQL));?></td>
                    <td><?= $tutor['address'] ?></td>
                    <td><?= $tutor['postal'] ?></td>
                    <td><?= $tutor['city'] ?></td>
                    <td><a class="btn btn-dark" href="modify_profil.php?id=<?= $tutor['id'] ?>" role="button">Modifier</a></td>
                    <td><a class="btn btn-dark" href="delete_profil.php?id=<?= $tutor['id'] ?>" role="button">Supprimer</a></td>
                    <!--<td><a class="btn btn-dark" oneclick="putAdmin(<?php/* $db ?>,<?php $tutor['id'] */?>)" role="button">Admin</a></td>-->
                    <?php if($tutor['admin'] != 1){
                            echo '<td><a class="btn btn-dark" href="putadmin.php?id='.$tutor['id'].'" role="button">Admin</a></td>';
                          }else {
                            echo '<td><a class="btn btn-outline-dark" href="deleteadmin.php?id='.$tutor['id'].'" role="button">Retirer admin</a></td>';
                          }?>
                  </tr>
                </tbody>
            <?php endforeach ?>
            </table>

        </div>
      </div>
    </div>
  </body>
</html>
