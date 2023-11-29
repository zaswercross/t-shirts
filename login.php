<?php
 session_start();
if (!isset($_SESSION['usrs']) && !isset($_SESSION['token'])) {

var_dump($_SESSION);
//$sess = $_SESSION['token'];

?>
<!DOCTYPE html>
<html lang="es_MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="playeras/assets/css/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="playeras/assets/css/styles.css">
    <title>Login - playeras personalizadas</title>
</head>
<body>
    <div class="login">
        <img src="playeras/assets/img/login-bg.png" alt="image" class="login_bg">
        <form action="" class="login_form">
            <h1 class="login_title">Inicio</h1>
            <div class="login_inputs">
                <div class="login_box">
                    <input type="usuario" name="usr" id="usr" placeholder="Usuario" required class="login_input">
                    <!-- <i class="ri-mail-fill"></i> -->
                </div>
                <div class="login_box">
                    <input type="password" name="password" id="password" placeholder="Contraseña" required class="login_input">
                    <!-- <i class="ri-lock-2-fill"></i> -->
                </div>
            </div>
            <div class="login_check">
                <!-- <div class="login_check-box">
                    <input type="checkbox" class="login_check-input" id="user-check">
                    <label for="user-check" class="login_check-label">Recordar Contraseña</label> 
                </div> -->
                <!-- <a href="#" class="login_forgot">Olvidaste la Contraseña?</a> -->
            </div>
            <button type="submit" class="login_button">Iniciar</button>
            <div class="login_register">
                Todavia no tienes una cuenta? <a href="#">Registrate</a>
            </div>
        </form>
    </div>
</body>
<script src="js/md5.min.js"></script>
    <script>
        let login_form = document.querySelector('.login_form');
        
        login_form.addEventListener('submit', e=> {
            e.preventDefault();
            let password = document.querySelector('#password').value;
            let usr = document.querySelector('#usr').value;
            password = md5(password);
            let formData = new FormData();
            formData.append('password',password)
            formData.append('usr',usr)

            fetch('./core/lgn.php',{
                method:"POST",
                body: formData
            })
                .then(resp => resp.json)
                .then(data => {
                    console.log(data);
                    if (data.code == 0) {
                        location.reload();
                    }
                })

        })
    </script>
</html>

<?php
}else{
    header('Location: ./index.php');
}
?>