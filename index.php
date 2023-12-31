<?php
session_start();
if (isset($_SESSION['usrs']) && isset($_SESSION['token'])) {
  echo session_id();
include './core/constantes.php';
include './core/estructura_bd.php';
var_dump($_SESSION);
session_destroy();
?>
<!doctype html>
<html lang="es_MX">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Playeras</title>
  </head>
  <body class="bg-gy">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand mx-auto" href="#">
            <img src="img/icono.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
            Playeras
          </a>
        </div>
      </nav>
    <!-- Optional JavaScript; choose one of the two! -->
    <section class="container ">
        <div class="flex-md-equal w-100 mb-md-3 ps-md-3 align-self-center ">
            <div class="bg-light me-md-3 text-center overflow-hidden shadow">
              <div class="my-3 p-3">
                <h2 class="display-5">Escoge tu talla y diseño.</h2>
                <!-- <p class="lead">And an even wittier subheading.</p> -->
              </div>
              <div class="shadow-lg mx-auto containerBlack d-flex">
                <div class="col-6 position-relative d-flex align-items-center justify-content-center">
                  <!-- <h3>Tipo de playera</h3> -->
                  <img src="img/hombre/bla.png" class="img-fluid w-50 imgMuestra">
                  <img src="img/disenos/260.png" class="img-fluid imgDesign position-absolute">
                </div>
                <div class="col-6 py-3 bg-dark">
                  <input type="hidden" id="inSx" value="hombre">
                  <h5 class="text-white my-3">Corte</h5>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary rounded-0 btnMujer">Mujer</button>
                    <button type="button" class="btn btn-secondary rounded-0 btnHombre">Hombre</button>
                    <button type="button" class="btn btn-secondary rounded-0 btnNino">Niño</button>
                  </div>
                  <h5 class="text-white my-3">Color</h5>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary rounded-0 btnBla">Blanco</button>
                    <button type="button" class="btn btn-secondary rounded-0 btnNeg">Negro</button>
                  </div>
                  <h5 class="text-white my-3">Diseño</h5>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary rounded-0 btnDesignUno">1</button>
                    <button type="button" class="btn btn-secondary rounded-0 btnDesignDos">2</button>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
      <script>
        let imgMuestra    = document.querySelector('.imgMuestra')
        let imgDesign     = document.querySelector('.imgDesign')
        let btnMujer      = document.querySelector('.btnMujer')
        let btnHombre     = document.querySelector('.btnHombre')
        let btnNino       = document.querySelector('.btnNino')
        let btnBla        = document.querySelector('.btnBla')
        let btnNeg        = document.querySelector('.btnNeg')
        let btnDesignUno  = document.querySelector('.btnDesignUno')
        let btnDesignDos =  document.querySelector('.btnDesignDos')

        btnMujer.addEventListener('click', e => {
          imgMuestra.setAttribute('src','img/mujer/bla.png')
          document.querySelector('#inSx').value = 'mujer'
        })

        btnHombre.addEventListener('click', e => {
          imgMuestra.setAttribute('src','img/hombre/bla.png');
          document.querySelector('#inSx').value = 'hombre';
        })

        btnNino.addEventListener('click', e => {
          imgMuestra.setAttribute('src','img/nino/bla.png')
          document.querySelector('#inSx').value = 'nino'
        })

        btnBla.addEventListener('click', e => {
          if(document.querySelector("#inSx").value == 'mujer'){
              imgMuestra.setAttribute('src','img/mujer/bla.png')
          }else if(document.querySelector("#inSx").value == 'nino'){
              imgMuestra.setAttribute('src','img/nino/bla.png')
          }else{
            imgMuestra.setAttribute('src','img/hombre/bla.png')
          }
        })

        btnNeg.addEventListener('click', e => {
          if(document.querySelector("#inSx").value == 'hombre'){
              imgMuestra.setAttribute('src','img/hombre/neg.png')
          }else if(document.querySelector("#inSx").value == 'mujer'){
              imgMuestra.setAttribute('src','img/mujer/neg.png')
          }else{
            imgMuestra.setAttribute('src','img/nino/neg.png')
          }
        })
        

        btnMujer.addEventListener('click', e => {
          imgDesign.setAttribute('src','img/disenos/260.png')
        })
        btnDesignUno.addEventListener('click', e => {
          imgDesign.setAttribute('src','img/disenos/260.png')
        })
        
        btnDesignDos.addEventListener('click', e => {
          imgDesign.setAttribute('src','img/disenos/1111.png')
        })
      </script>
  </body>
</html>
<?php
}else{
    header('Location: ./login.php');
}
?>