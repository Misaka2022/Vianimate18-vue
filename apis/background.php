<?php
  header("Access-Control-Allow-Origin: *"); // 允许所有域名
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // 允许的方法
  header("Access-Control-Allow-Headers: X-Requested-With");
  header('Content-Type: application/json');

  require './conn.php';

  $background="SELECT workname FROM `file`";
  $bkgdq=mysqli_query($conn,$background);
  $data=$bkgdq->fetch_all();
  echo json_encode($data);

 