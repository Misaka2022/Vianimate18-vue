<?php 
header("Access-Control-Allow-Origin: *"); // 允许所有域名
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // 允许的方法
header("Access-Control-Allow-Headers: X-Requested-With");

require './conn.php'; 
?>
<?php
   $sql="SELECT * FROM `dj` ORDER BY tim DESC";
   $res=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Misaka">
    <title>dsj</title>
    <link rel="stylesheet" href="../build-tools/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../build-tools/bootstrap/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../build-tools/Hover-master/css/hover.css">
    <link rel="shortcut icon" href="../img/2021/tub.png">
    <script src="../build-tools/bootstrap/js/jquery.min.js"></script>
    <script src="../build-tools/bootstrap/js/bootstrap.js"></script>
    <script src="../js/wow.js"></script>
    <script>
        document.oncontextmenu = function() {
            return false;
        }
        document.onkeydown = function() {
            var e = window.event || arguments[0];

            if (e.keyCode == 123) {
                return false;

            } else if ((e.ctrlKey) && (e.shiftKey) && (e.keyCode == 73)) {
                return false;

            } else if ((e.shiftKey) && (e.keyCode == 121)) {
                return false;
            }
        };
        eval(function(p, a, c, k, e, r) {
            e = function(c) {
                return c.toString(a)
            };
            if (!''.replace(/^/, String)) {
                while (c--) r[e(c)] = k[c] || e(c);
                k = [function(e) {
                    return r[e]
                }];
                e = function() {
                    return '\\w+'
                };
                c = 1
            };
            while (c--)
                if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
            return p
        }('2 i=\'\',3=["e",""];(4(a){a[3[0]]=3[1]})(8);2 9=["g"];!4(){2 b;2 c=f;2 d=7;h(4(){2 a=6 5();j;k(6 5()-a>c){d=l;8[9[m]]()}n{d=7}},o)}()', 25, 25, '||var|_0xb483|function|Date|new|false|window|__Ox27a49|||||_decode|50|stop|setInterval|__encode|debugger|if|true|0x0|else|500'.split('|'), 0, {}))
    </script>
    <style>
        #img1{
            width:160px;
            height:100px;
            margin-left:4vw;
            margin-top:2vh;
        }
        #all-img{
            width:1200px;
            display:flex;
            flex-wrap:wrap;
        }
        #pm{
           margin-left:3.5vw;
           margin-top:5vh;
           font-size:1em;
           font-family:'Microsoft YaHei';
        }
        #pm:hover{
           margin-left:3.5vw;
           margin-top:5vh;
           font-size:1em;
           font-family:'Microsoft YaHei';
           color:orange;
        }
        body{
            background:rgba(255, 255, 255, 0);
        }
    </style>
    <script>
        $(function(){
            $('#img1').mouseover(function(){
                $('#jies').css('display','block')
            })
            $('#img1').mouseleave(function(){
                $('#jies').css('display','none')
            })

        })
    </script>
</head>
<body>
    <div id="all">
        <div id="all-img">
            <?php
            while($row=mysqli_fetch_assoc($res)){
                $html=<<<A
                      <a href="$row[adrr]" style='text-decoration:none;color:#000'>
                      <img src="$row[phot];" id="img1" title="$row[workname]
                      日期：$row[tim]
                      类型：$row[fenlei]
                      作者：$row[auth]
                      介绍：$row[intro]"><br>
                      <span id='pm'>$row[workname]</span>
                      </a>
          A;
          echo $html;
          }
          
          ?>
        </div>
    </div>
</body>
</html>