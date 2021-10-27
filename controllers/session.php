<?php

    session_start();
    $id = session_id();

    $retorno = array();

    $usId = $_SESSION[$id]['id'];
    $email = $_SESSION[$id]['email'];
    $user = $_SESSION[$id]['usuario'];

    $retorno['ID'] = $usId;
    $retorno['EMAIL'] = $email;
    $retorno['USUARIO'] = $user;

    echo json_encode($retorno);

?>