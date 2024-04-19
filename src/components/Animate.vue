<template>
    <el-container>
        <el-header class="header">
           <span>Vianimate Animate</span>
        </el-header>
        <el-main>
            <div id="animatemenu"> 
                <div id="ani-nr">
                      <div id="ani-nr-head">
                          <el-button id="gm">国漫</el-button>
                          <el-button id="rm">日漫</el-button>
                          <el-button id="dy">电影</el-button>
                          <el-button id="jlp">纪录片</el-button>
                          <el-button id="dsj">电视剧</el-button>
                          <el-button id="dj">短剧</el-button>
                          <el-button id="kj">科技</el-button>
                          <el-button id="yy">音乐</el-button>
                          <el-button id="zs">学习</el-button>
                          <el-button id="zy">综艺</el-button>
                      </div>
                </div>
                 <div id="ifmw">
                      <iframe src="" id="cyy-nr"></iframe>
                 </div>
            </div>
        </el-main>
    </el-container>
</template>
<script>
import $ from 'jquery';
import { ElMessage } from 'element-plus';
export default {
    name:'Animate',
    data(){
        return{
            
        }
    },
    methods:{
        
    },
    created(){
        //默认
        $(function(){
            const url="http://localhost:5200/Vianimate18/apis/";
            $('#cyy-nr').attr('src',url+'m-body-animate.php');
            //观看菜单切换
            $('#gm').click(function() {
                  $('#gm').css({'background':"lightskyblue",'color':'#fff'});
                  $('#rm').css({'background':"#fff",'color':'#000'}); 
                  $('#dy').css({'background':"#fff",'color':'#000'});
                  $('#jlp').css({'background':"#fff",'color':'#000'});
                  $('#dsj').css({'background':"#fff",'color':'#000'});
                  $('#dj').css({'background':"#fff",'color':'#000'});
                  $('#kj').css({'background':"#fff",'color':'#000'});
                  $('#yy').css({'background':"#fff",'color':'#000'});
                  $('#zs').css({'background':"#fff",'color':'#000'});
                  $('#zy').css({'background':"#fff",'color':'#000'});
                  ElMessage.info("观看时点击此按钮可以返回哦！");
                  document.getElementById('cyy-nr').src = url+"m-body-animate.php";
            })
            $('#rm').click(function() {
                  $('#gm').css({'background':"#fff",'color':'#000'});
                  $('#rm').css({'background':"lightskyblue",'color':'#fff'}); 
                  $('#dy').css({'background':"#fff",'color':'#000'});
                  $('#jlp').css({'background':"#fff",'color':'#000'});
                  $('#dsj').css({'background':"#fff",'color':'#000'});
                  $('#dj').css({'background':"#fff",'color':'#000'});
                  $('#kj').css({'background':"#fff",'color':'#000'});
                  $('#yy').css({'background':"#fff",'color':'#000'});
                  $('#zs').css({'background':"#fff",'color':'#000'});
                  $('#zy').css({'background':"#fff",'color':'#000'});
                  ElMessage.info("观看时点击此按钮可以返回哦！");
                  document.getElementById('cyy-nr').src = url+"rm.php";
            })
            $('#dy').click(function() {
                  $('#gm').css({'background':"#fff",'color':'#000'});
                  $('#rm').css({'background':"#fff",'color':'#000'}); 
                  $('#dy').css({'background':"lightskyblue",'color':'#fff'});
                  $('#jlp').css({'background':"#fff",'color':'#000'});
                  $('#dsj').css({'background':"#fff",'color':'#000'});
                  $('#dj').css({'background':"#fff",'color':'#000'});
                  $('#kj').css({'background':"#fff",'color':'#000'});
                  $('#yy').css({'background':"#fff",'color':'#000'});
                  $('#zs').css({'background':"#fff",'color':'#000'});
                  $('#zy').css({'background':"#fff",'color':'#000'});
                  ElMessage.info("观看时点击此按钮可以返回哦！");
                  document.getElementById('cyy-nr').src = url+"dy.php";
            })
            $('#jlp').click(function() {
                  $('#gm').css({'background':"#fff",'color':'#000'});
                  $('#rm').css({'background':"#fff",'color':'#000'}); 
                  $('#dy').css({'background':"#fff",'color':'#000'});
                  $('#jlp').css({'background':"lightskyblue",'color':'#fff'});
                  $('#dsj').css({'background':"#fff",'color':'#000'});
                  $('#dj').css({'background':"#fff",'color':'#000'});
                  $('#kj').css({'background':"#fff",'color':'#000'});
                  $('#yy').css({'background':"#fff",'color':'#000'});
                  $('#zs').css({'background':"#fff",'color':'#000'});
                  $('#zy').css({'background':"#fff",'color':'#000'});
                  ElMessage.info("观看时点击此按钮可以返回哦！");
                  document.getElementById('cyy-nr').src = url+"jlp.php";
            })
            $('#dsj').click(function() {
                  $('#gm').css({'background':"#fff",'color':'#000'});
                  $('#rm').css({'background':"#fff",'color':'#000'}); 
                  $('#dy').css({'background':"#fff",'color':'#000'});
                  $('#jlp').css({'background':"#fff",'color':'#000'});
                  $('#dsj').css({'background':"lightskyblue",'color':'#fff'});
                  $('#dj').css({'background':"#fff",'color':'#000'});
                  $('#kj').css({'background':"#fff",'color':'#000'});
                  $('#yy').css({'background':"#fff",'color':'#000'});
                  $('#zs').css({'background':"#fff",'color':'#000'});
                  $('#zy').css({'background':"#fff",'color':'#000'});
                  ElMessage.info("观看时点击此按钮可以返回哦！");
                  document.getElementById('cyy-nr').src = url+"dsj.php";
            })
            $('#dj').click(function() {
                  $('#gm').css({'background':"#fff",'color':'#000'});
                  $('#rm').css({'background':"#fff",'color':'#000'}); 
                  $('#dy').css({'background':"#fff",'color':'#000'});
                  $('#jlp').css({'background':"#fff",'color':'#000'});
                  $('#dsj').css({'background':"#fff",'color':'#000'});
                  $('#dj').css({'background':"lightskyblue",'color':'#fff'});
                  $('#kj').css({'background':"#fff",'color':'#000'});
                  $('#yy').css({'background':"#fff",'color':'#000'});
                  $('#zs').css({'background':"#fff",'color':'#000'});
                  $('#zy').css({'background':"#fff",'color':'#000'});
                  ElMessage.info("观看时点击此按钮可以返回哦！");
                  document.getElementById('cyy-nr').src = url+"dj.php";
            })
            $('#kj').click(function() {
                  $('#gm').css({'background':"#fff",'color':'#000'});
                  $('#rm').css({'background':"#fff",'color':'#000'}); 
                  $('#dy').css({'background':"#fff",'color':'#000'});
                  $('#jlp').css({'background':"#fff",'color':'#000'});
                  $('#dsj').css({'background':"#fff",'color':'#000'});
                  $('#dj').css({'background':"#fff",'color':'#000'});
                  $('#kj').css({'background':"lightskyblue",'color':'#fff'});
                  $('#yy').css({'background':"#fff",'color':'#000'});
                  $('#zs').css({'background':"#fff",'color':'#000'});
                  $('#zy').css({'background':"#fff",'color':'#000'});
                  ElMessage.info("观看时点击此按钮可以返回哦！");
                  document.getElementById('cyy-nr').src = url+"kj.php";
            })
            $('#yy').click(function() {
                  $('#gm').css({'background':"#fff",'color':'#000'});
                  $('#rm').css({'background':"#fff",'color':'#000'}); 
                  $('#dy').css({'background':"#fff",'color':'#000'});
                  $('#jlp').css({'background':"#fff",'color':'#000'});
                  $('#dsj').css({'background':"#fff",'color':'#000'});
                  $('#dj').css({'background':"#fff",'color':'#000'});
                  $('#kj').css({'background':"#fff",'color':'#000'});
                  $('#yy').css({'background':"lightskyblue",'color':'#fff'});
                  $('#zs').css({'background':"#fff",'color':'#000'});
                  $('#zy').css({'background':"#fff",'color':'#000'});
                  ElMessage.info("观看时点击此按钮可以返回哦！");
                  document.getElementById('cyy-nr').src = url+"yy.php";
            })
            $('#zs').click(function() {
                  $('#gm').css({'background':"#fff",'color':'#000'});
                  $('#rm').css({'background':"#fff",'color':'#000'}); 
                  $('#dy').css({'background':"#fff",'color':'#000'});
                  $('#jlp').css({'background':"#fff",'color':'#000'});
                  $('#dsj').css({'background':"#fff",'color':'#000'});
                  $('#dj').css({'background':"#fff",'color':'#000'});
                  $('#kj').css({'background':"#fff",'color':'#000'});
                  $('#yy').css({'background':"#fff",'color':'#000'});
                  $('#zs').css({'background':"lightskyblue",'color':'#fff'});
                  $('#zy').css({'background':"#fff",'color':'#000'});
                  ElMessage.info("观看时点击此按钮可以返回哦！");
                  document.getElementById('cyy-nr').src = url+"zs.php";
            })
            $('#zy').click(function() {
                  $('#gm').css({'background':"#fff",'color':'#000'});
                  $('#rm').css({'background':"#fff",'color':'#000'}); 
                  $('#dy').css({'background':"#fff",'color':'#000'});
                  $('#jlp').css({'background':"#fff",'color':'#000'});
                  $('#dsj').css({'background':"#fff",'color':'#000'});
                  $('#dj').css({'background':"#fff",'color':'#000'});
                  $('#kj').css({'background':"#fff",'color':'#000'});
                  $('#yy').css({'background':"#fff",'color':'#000'});
                  $('#zs').css({'background':"#fff",'color':'#000'});
                  $('#zy').css({'background':"lightskyblue",'color':'#fff'});
                  ElMessage.info("观看时点击此按钮可以返回哦！");
                  document.getElementById('cyy-nr').src = url+"zy.php";
            })
        })
    }
}
</script>
<style scoped>
.header{
    background-color:#409EFF;
    color: white;
    font-size:20px;
    line-height:60px;
    text-align:left;
    cursor:default;
}
#animatemenu{
    margin-bottom:100px;
}
#ani-nr-head{
  display:flex;
  justify-content:center;
  align-items:center;;
  position:relative;
  z-index:999;
  margin-top:0;
  padding-left:1vw;
  padding-right:1vw;
}
#ani-nr{
  width:100%;
  height:60px;
  display:flex;
  justify-content:center;
  align-items:center;;
  background:#fff;
  position:fixed;
  top:3vw;
  left:0;
  z-index:9999;
}

#gm{
  color:#fff;
  background:lightskyblue;
}
#ifmw{
  width:101%;
  height:100vh;
  margin-top:0;
  margin-left:-1vw;
  overflow-y:scroll;
  overflow-x:hidden;
  position:absolute;
  z-index:1;
}
#cyy-nr{
    width:101%;
    height:72vh;
    position:absolute;
    left:0;
    top:0;
    border:none;
}
</style>