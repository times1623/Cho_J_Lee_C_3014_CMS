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

function greeting(){
  date_default_timezone_set('America/Toronto');
  $now = date('G');
  // echo $now;
  if($now < 12){
    return "<h3>Good Mourning</h3>";
    
  } elseif($now >= 12 && $now < 18){
    return "<h3>Good Afternoon</h3>";
  } elseif($now >= 18 && $now < 22){
    return "<h3>Good Evening</h3>";
  } else {
    return "<h3>Good Night</h3>";
  }
}


//! Image Resize
function imageResize($imageResourceId, $width, $height){
  $targetWidth = 300;
  $targetHeight = 300;
  $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);

  imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

  return $targetLayer;
}