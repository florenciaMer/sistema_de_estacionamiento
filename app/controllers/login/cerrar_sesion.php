<?php

include_once('../../config.php');


session_start();
if(isset($_SESSION['usuario_sesion'])) {
    session_destroy();
}
header("Location: ".$URL."/");
?>