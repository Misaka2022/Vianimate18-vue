<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link rel="stylesheet" href="../../src/assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../src/assets/build-tools/bootstrap/icons/bootstrap-icons.css">
    <script src="../../src/assets/build-tools/bootstrap/js/jquery.min.js"></script>
    <script src="../../src/assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.js"></script>
    <style>
      body{
            height:70vh;
            display:flex;
            flex-wrap:wrap;
            flex-direction:row;
            justify-content:space-between;
            align-items:center;
            background:none;
            padding:0;
            margin-top:8vh;
            overflow: hidden;
        }
        #pm{
            width:max-content;
            margin-top:5vh;
            font-size:1em;
            text-align: center;
            font-family:'Microsoft YaHei';
        }
        #pm:hover{
            width:max-content;
            margin-top:5vh;
            font-size:1em;
            text-align: center;
            font-family:'Microsoft YaHei';
            color:orange;
        }
        #img1{
            width:160px;
            height:100px;
        }
        #gm{
            width:180px;
            height:100px;
            margin-left:4vw;
        }
        #rm{
            width:180px;
            height:100px;
            margin-left:4vw;
        }
        #dy{
            width:180px;
            height:100px;
            margin-left:4vw;
          }
        #jlp{
            width:180px;
            height:100px;
            margin-left:4vw;
        }
        #dsj{
            width:180px;
            height:100px;
            margin-left:4vw;
        }
        #dj{
            width:180px;
            height:100px;
            margin-left:4vw;
        }
        #kj{
            width:180px;
            height:100px;
            margin-left:4vw;
        }
        #yy{
            width:180px;
            height:100px;
            margin-left:4vw;
        }
        #zy{
            width:180px;
            height:100px;
            margin-left:4vw;
        }
        #zs{
            width:180px;
            height:100px;
            margin-left:4vw;
        }
        #file{
            width:180px;
            height:100px;
            margin-left:4vw;
        }
        #soft{
            width:fit-content;
            height:100px;
            margin-left:1vw;
        }
        #sft{
                display:flex;
                width:fit-content;
                flex-direction:row;
                flex-wrap: wrap;
                margin-top:2vh;
                align-items:center;
        }
        #sft:hover{
                display:flex;
                flex-direction:row;
                flex-wrap: wrap;
                width:fit-content;
                margin-top:2vh;
                align-items:center;
                background:snow;
        }
        #sft>a{
            margin-left:1vw;
            color:#000;
            text-decoration:none;
        }
        #sft>a:hover{
            margin-left:1vw;
            color:#000;
            text-decoration:none;
            font-weight:bold;
        }
        #sft>a>span{
            margin-left:1vw;
            color:#000;
            text-decoration:none;
        }
    </style>
</head>
<body>
<?php
  require "../conn.php";
  error_reporting(0);

  //all query
  $keyword=@$_POST['kwd'];
  $sql0="SELECT * FROM gm where workname like '%$keyword%'";
  $sql1="SELECT * FROM rm where workname like '%$keyword%'";
  $sql2="SELECT * FROM dy where workname like '%$keyword%'"; 
  $sql3="SELECT * FROM jlp where workname like '%$keyword%'";
  $sql4="SELECT * FROM dsj where workname like '%$keyword%'";
  $sql5="SELECT * FROM dj where workname like '%$keyword%'";
  $sql6="SELECT * FROM kj where workname like '%$keyword%'";
  $sql7="SELECT * FROM yy where workname like '%$keyword%'";
  $sql8="SELECT * FROM zs where workname like '%$keyword%'";
  $sql9="SELECT * FROM zy where workname like '%$keyword%'";
  $sql10="SELECT * FROM `file` where `des` like '%$keyword%'";
  $sql11="SELECT * FROM soft where workname like '%$keyword%'";
  $qr1=$conn->query($sql0);
  $qr2=$conn->query($sql1);
  $qr3=$conn->query($sql2);
  $qr4=$conn->query($sql3);
  $qr5=$conn->query($sql4);
  $qr6=$conn->query($sql5);
  $qr7=$conn->query($sql6);
  $qr8=$conn->query($sql7);
  $qr9=$conn->query($sql8);
  $qr10=$conn->query($sql9);
  $qr11=$conn->query($sql10);
  $qr12=$conn->query($sql11);
if(!empty($keyword)){
    if(mysqli_num_rows($qr1)>0){
        while($row=mysqli_fetch_assoc($qr1)){
          $html=<<<A
              <div id="gm">
                <a href="$row[adrr]" style='text-decoration:none;color:#000'>
                  <img src="$row[phot]" id="img1" title="$row[workname]
                    日期：$row[tim]
                    类型：$row[fenlei]
                    作者：$row[auth]
                    介绍：$row[intro]">                      
                    <br>
                    <span id='pm'>$row[workname]</span>
                  </a>
              </div>
          A;
          echo $html;
      }
    }else if(mysqli_num_rows($qr2)>0){
       while($row=mysqli_fetch_assoc($qr2)){
        $html=<<<A
              <div id="rm">
                <a href="$row[adrr]" style='text-decoration:none;color:#000'>
                  <img src="$row[phot]" id="img1" title="$row[workname]
                    日期：$row[tim]
                    类型：$row[fenlei]
                    作者：$row[auth]
                    介绍：$row[intro]">                      
                    <br>
                    <span id='pm'>$row[workname]</span>
                  </a>
              </div>
          A;
          echo $html;
       }
    }else if(mysqli_num_rows($qr3)>0){
        while($row=mysqli_fetch_assoc($qr3)){
         $html=<<<A
               <div id="dy">
                 <a href="$row[adrr]" style='text-decoration:none;color:#000'>
                   <img src="$row[phot]" id="img1" title="$row[workname]
                     日期：$row[tim]
                     类型：$row[fenlei]
                     作者：$row[auth]
                     介绍：$row[intro]">                      
                     <br>
                     <span id='pm'>$row[workname]</span>
                   </a>
               </div>
           A;
           echo $html;
        }
     }else if(mysqli_num_rows($qr4)>0){
        while($row=mysqli_fetch_assoc($qr4)){
         $html=<<<A
               <div id="jlp">
                 <a href="$row[adrr]" style='text-decoration:none;color:#000'>
                   <img src="$row[phot]" id="img1" title="$row[workname]
                     日期：$row[tim]
                     类型：$row[fenlei]
                     作者：$row[auth]
                     介绍：$row[intro]">                      
                     <br>
                     <span id='pm'>$row[workname]</span>
                   </a>
               </div>
           A;
           echo $html;
        }
     }else if(mysqli_num_rows($qr5)>0){
        while($row=mysqli_fetch_assoc($qr5)){
         $html=<<<A
               <div id="dsj">
                 <a href="$row[adrr]" style='text-decoration:none;color:#000'>
                   <img src="$row[phot]" id="img1" title="$row[workname]
                     日期：$row[tim]
                     类型：$row[fenlei]
                     作者：$row[auth]
                     介绍：$row[intro]">                      
                     <br>
                     <span id='pm'>$row[workname]</span>
                   </a>
               </div>
           A;
           echo $html;
        }
     }else if(mysqli_num_rows($qr6)>0){
        while($row=mysqli_fetch_assoc($qr6)){
         $html=<<<A
               <div id="dj">
                 <a href="$row[adrr]" style='text-decoration:none;color:#000'>
                   <img src="$row[phot]" id="img1" title="$row[workname]
                     日期：$row[tim]
                     类型：$row[fenlei]
                     作者：$row[auth]
                     介绍：$row[intro]">                      
                     <br>
                     <span id='pm'>$row[workname]</span>
                   </a>
               </div>
           A;
           echo $html;
        }
     }else if(mysqli_num_rows($qr7)>0){
        while($row=mysqli_fetch_assoc($qr7)){
         $html=<<<A
               <div id="kj">
                 <a href="$row[adrr]" style='text-decoration:none;color:#000'>
                   <img src="$row[phot]" id="img1" title="$row[workname]
                     日期：$row[tim]
                     类型：$row[fenlei]
                     作者：$row[auth]
                     介绍：$row[intro]">                      
                     <br>
                     <span id='pm'>$row[workname]</span>
                   </a>
               </div>
           A;
           echo $html;
        }
     }else if(mysqli_num_rows($qr8)>0){
        while($row=mysqli_fetch_assoc($qr8)){
         $html=<<<A
               <div id="yy">
                 <a href="$row[adrr]" style='text-decoration:none;color:#000'>
                   <img src="$row[phot]" id="img1" title="$row[workname]
                     日期：$row[tim]
                     类型：$row[fenlei]
                     作者：$row[auth]
                     介绍：$row[intro]">                      
                     <br>
                     <span id='pm'>$row[workname]</span>
                   </a>
               </div>
           A;
           echo $html;
        }
     }else if(mysqli_num_rows($qr9)>0){
        while($row=mysqli_fetch_assoc($qr9)){
         $html=<<<A
               <div id="zs">
                 <a href="$row[adrr]" style='text-decoration:none;color:#000'>
                   <img src="$row[phot]" id="img1" title="$row[workname]
                     日期：$row[tim]
                     类型：$row[fenlei]
                     作者：$row[auth]
                     介绍：$row[intro]">                      
                     <br>
                     <span id='pm'>$row[workname]</span>
                   </a>
               </div>
           A;
           echo $html;
        }
     }else if(mysqli_num_rows($qr10)>0){
        while($row=mysqli_fetch_assoc($qr10)){
         $html=<<<A
               <div id="zy">
                 <a href="$row[adrr]" style='text-decoration:none;color:#000'>
                   <img src="$row[phot]" id="img1" title="$row[workname]
                     日期：$row[tim]
                     类型：$row[fenlei]
                     作者：$row[auth]
                     介绍：$row[intro]">                      
                     <br>
                     <span id='pm'>$row[workname]</span>
                   </a>
               </div>
           A;
           echo $html;
        }
     }else if(mysqli_num_rows($qr11)>0){
        while($row=mysqli_fetch_assoc($qr11)){
         $html=<<<A
               <div id="file">
                   <img src="$row[workname]" id="img1" title="
                     介绍：$row[des]">                      
                     <br>
                     <span id='pm'>$row[des]</span>
               </div>
           A;
           echo $html;
        }
     }else if(mysqli_num_rows($qr12)>0){
        while($row=mysqli_fetch_assoc($qr12)){
         $html=<<<A
               <div id="soft">
                    <iframe src='' name='softs' id='softs' style='display:none'></iframe>
                    <a href='$row[urls]' target="softs" style="color:#000;text-decoration:none">
                        <li id="sft">
                            <span style="flex-direction:row;display:flex;text-align:center;font-size:16px;margin-left:2vw;margin-top:0.5vh;cursor:pointer">
                                <img src="$row[pic]" style="width:30px;height:30px;border-radius:24px;margin-right:6vw;margin-left:2vw">
                                $row[workname]
                            </span>
                        </li>
                    </a>
               </div>
           A;
           echo $html;
        }
     }else{
         echo "没有找到相关内容";
     }
  }else{
    echo "搜索内容不能为空！";
  }
?>
</body>
</html>