<?php
  require "../conn.php";
  
?>
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
        background:none;
      }
      #search{
        display:flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        width:100%;
        height:100%;
        overflow:hidden;
      }
      #sc{
        width:100%;
        height:80px;
        background: #fff;
        box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
        padding:20px;
        padding-top:35px;
        top:0;
        left:0;
        display:flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        z-index:9999;
        position:fixed;
      }
      #sccontent{
        width:100%; 
        height:100%;
        top:0;
        left:0;
        position:absolute;
      }
    </style>
</head>
<body>
  <div id="search">
      <div id="sc">
            <form action="search-end.php" method="post" target="sccontent">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search for..." name="kwd" aria-label="Search for..." aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                </div>
              </form>
        </div>
      <iframe name="sccontent" id="sccontent" src="search-end.php"></iframe>
  </div>
</body>
</html>