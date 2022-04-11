
    <?php
    include('navbar.php');
    require_once 'verif_admin.php';
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
        <h2>Bienvenue dans votre espace administrateur. Vous avez accès à la liste des étudiants/professeurs ainsi qu'à la liste des messages écrit par les utilisateurs.</h2>
      </div>
    </div>
  </body>
</html>
