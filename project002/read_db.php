<?php

  $arr = array(4, 7, 0, 5, 10);

  if(isexistinArray($arr, 3)) {
    echo "exist";
  } else {
    echo "not exist";
  }

  function isexistinArray($arr, $val) {

    foreach ($arr as $key) {
      if ($key === $val) {
        return true;
      }
    }

    return false;

  }

?>
