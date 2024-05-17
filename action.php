<?php
  include('./dbConnection.php');
  if(isset($_POST['action'])){
    $sql="SELECT FROM category WHERE cName !=''";
    if(isset($_POST['course '])){
        $course=implode("','",$_POST['course']);
        $sql .="AND category IN()";
    }
  }
  ?>