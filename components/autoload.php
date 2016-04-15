<?php
 function __autoload($class)
 {
     $class = str_replace("\\",'/',$class);
     $path = ROOT.'/'.$class.'.php';
     if(is_readable($path)) {
         include_once $path;
   }
 }
