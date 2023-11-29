<?php 
header("Access-Control-Allow-Origin: *");
// session_start();
// session_destroy();
// echo 'OMG!!!';
include_once "./constantes.php";
include_once "./estructura_bd.php";
// die();
$MYSQLI     =   _DB_HDND();

// $token      =   $_POST['tkn']     ??  false;
$usr        =   $_POST['usr']       ??  false;
$password   =   $_POST['password']  ??  false;
// $hash       =   $_SESSION['token'];
//  echo json_encode(['code'=>$usr,'response'=>$password,'id'=>"RESULT"]);


if($usr && $password){
//    $token     =  _clean($token,   $MYSQLI);
   $usr       =  _clean($usr,  $MYSQLI);
   $password  =  _clean($password,     $MYSQLI);

    $SQL    =   "SELECT 1 FROM `tshirts`.`tusrs` WHERE `usuario`= '$usr' && `contrasena` = '$password';";

   //  $SQL    =   "INSERT INTO `tusrs`(`usuario`, `contrasena`, `status`) VALUES ('sysadmin','21232f297a57a5a743894a0e4a801fc3',1);
   //  INSERT INTO cantos(nombre,content,tags) VALUES ('$titulo','$content','$tags')";
    $RESULT =   _Q($SQL, $MYSQLI, 2);
    
    if($RESULT){
        session_start();
        // echo session_id();
        // session_destroy();
        // if(!isset($_SESSION['token'])){
        //     $u= uniqid(rand());
        //     $token= trim(md5($u));
        //     $_SESSION['token']=$token;
        // }
        $_SESSION['token']= session_id();
        $_SESSION['usrs']=$usr;
        echo json_encode(['code'=>0,'response'=>'Logeado','id'=>$RESULT,'sess'=> $_SESSION]);
    }else{
        echo json_encode(['code'=>1,'response'=>'Error al loguear','msg'=>$RESULT,'QUERY'=> $SQL]);
    }
}else{
    echo json_encode(['code'=>2,'response'=>'No podemos atenderte en esté momento, favor de contactar al adminstrador.','token'=>$_SESSION['token'],'hash'=>$hash]);
}

?>