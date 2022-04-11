<?php include("header.php");?>


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative">
      <h1>Learning Today,<br>Leading Tomorrow</h1>
      <h2>We are team of talented designers making websites with Bootstrap</h2>
      <a href="courses.html" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->

    <div class="container-fluid bg-custom-1 full-height">
        <div class="container pt-2">

            <div class="rounded-top col-md-12 mx-auto bg-light form mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-lg">  
                                <input type="text" class="form-control" onkeyup="search(this.value)">
                                
                            </div>
                        </div>
                        <div class="col">
                            <div id="content">
                                <div class="row justify-content-center rounded-top border mt-3 pt-2 pb-2">
                                    <div class="col-md-4 border-right">
                                        <img src="assets/img/profilpic_wait.png">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Tape le début du nom de ton professeur, les résultats apparaitront ici !
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        let content = document.getElementById('content')

        function search(x){
            if (x.length == 0){
                content.innerHTML= 'Recherche...'
            }
            else{
                var XML = new XMLHttpRequest();
                XML.onreadystatechange = function(){
                    console.log(XML.status);
                    console.log(XML.readyState);
                    console.log(XML.responseText);
                    content.innerHTML = XML.responseText;
                    
                };

                XML.open('GET', 'search_module.php?q='+x, true);
                XML.send();
                console.log(XML.responseText);
            }
        }
    </script>
<!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    

  </main><!-- End #main -->

<?php include("footer.php");?>