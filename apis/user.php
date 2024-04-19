<?php 
header("Access-Control-Allow-Origin: *"); // 允许所有域名
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // 允许的方法
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type");
  require "./conn.php";

  $response=[
    'status'=>true,
    'message'=>'Unknown error'
  ];
  if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['data'])){
    $action=$_POST['data'];
    $data=json_decode(file_get_contents('php://input'),true);
    $response=[
      'status'=>false,
      'message'=>'Unknown error'
    ];
    switch($action){
      case 'login':
          $username=isset($data['username'])?$data['username']:'';
          $password=isset($data['password'])?$data['password']:'';
          if(!empty($username) && !empty($password)){
              $sql="SELECT * FROM user WHERE workname='$username' AND psw='$password'";
              $result=mysqli_query($conn,$sql);
              if(mysqli_num_rows($result)>0){
                 echo "true";
                 $response['status']=true;
              }else{
                echo "false";
              }
          }else{
            echo "false+";
          }
      break;
      case 'register':
        $username=isset($data['username'])?$data['username']:'';
        $password=isset($data['password'])?$data['password']:'';
        if(!empty($username) && !empty($password)){
            $sql="INSERT INTO user (workname,psw) VALUES ('$username','$password')";
            $result=mysqli_query($conn,$sql);
            if($result){
              echo "true";
              $response['status']=true;
            }else{
              echo "false";
            }
        }else{
          echo "false+";
        }
      break;
      default:
        $response['message']="Unknown action";
      break;
    }
    
  }
echo json_encode($response);
exit();
?>