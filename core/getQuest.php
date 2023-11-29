<?php
    header("Access-Control-Allow-Origin: *");
    include_once "./constantes.php";
    include_once "./estructura_bd.php";
    $MYSQLI     =   _DB_HDND();
    if(isset($_POST['pregunta']) && isset($_POST['token'])){
    /****** */


        $token      =   $_POST['token']     ??  false;
        $pregunta   =   $_POST['pregunta']  ??  false;
        $hash       =   $_SESSION['token'];

        if($token && $pregunta && $hash == $token){

            $pregunta     = _clean($pregunta,   $MYSQLI);
            $dia = date("j"); 
            if ($dia == 27) {
                $dia = 1;
            }else if ($dia == 29) {
                $dia = 2;
            }else if ($dia == 30) {
                $dia = 3;
            }else if ($dia == 30) {
                $dia = 4;
            }else{
                $dia = 0;
            }
            $SQL    =   "INSERT INTO preguntas(pregunta,cat) VALUES ('$pregunta',$dia)";
            $RESULT =   _Q($SQL, $MYSQLI, 0);
            
            if($RESULT){
                echo json_encode(['code'=>0,'response'=>'Se guardo con exito','id'=>$RESULT]);
            }else{
                echo json_encode(['code'=>1,'response'=>'Error al guardar','msg'=>$RESULT]);
            }
        }else{
            echo json_encode(['code'=>2,'response'=>'No podemos atenderte en esté momento, favor de contactar al adminstrador.']);
            //echo json_encode(['code'=>2,'response'=>'No podemos atenderte en esté momento, favor de contactar al adminstrador.','token'=>$_SESSION['token'],'hash'=>$hash]);
        }
        /****** */
    }else{
        echo '<h1>¿Qué rayos haces aquí?</h1>';
    }
