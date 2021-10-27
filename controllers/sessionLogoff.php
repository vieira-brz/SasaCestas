<?php

  session_start();

  $lastId = session_id();
  
  unset($_SESSION[$lastId]);
  session_regenerate_id(true);

  if(!$_SESSION[$lastId])
  {
    echo 0;
  }
  else
  {
    echo 1;  
  }

?>