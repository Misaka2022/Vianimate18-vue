<?php
  ####连接数据库####
  $server="localhost:3306";
  $username="root";
  $password="Misaka0835";
  $database="vianimate";

  $conn=mysqli_connect($server,$username,$password,$database) or die(mysqli_error($conn));

  ####获取页面标题####
  $sql="SELECT * FROM sys where id=12";
  $qre=mysqli_query($conn,$sql);
  $fe=mysqli_fetch_assoc($qre);

  $sql1="SELECT * FROM sys where id=3";
  $qre1=mysqli_query($conn,$sql1);
  $login=mysqli_fetch_assoc($qre1);

  $sql2="SELECT * FROM sys where id=1";
  $qre2=mysqli_query($conn,$sql2);
  $fet=mysqli_fetch_assoc($qre2);
