<?php
session_start();

function loginIsRequried(){
   if(!isset($_SESSION['id_user'])){
    header('Location: ../login.php');
   } 
}