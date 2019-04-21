<?php

function redirect_to($location)
{
  if($location != NULL){
    header('Location:' .$location);
    exit();
  }
}

function wordslimit($s, $limit=10) {
  return preg_replace('/((\w+\W*){'.($limit-1).'}(\w+))(.*)/', '${1}', $s);   
}


