<template>
  <el-container class="desk">
      <el-menu mode="horizontal" class="desktopnav">
          <el-menu-item class="starting" @click="wstarting()">
            <img src="../assets/img/2021/tub.png" alt="" class="starticon">
          </el-menu-item>
          <el-menu-item class="search" @click="wsearch()">
            <i class="bi bi-search"></i>
          </el-menu-item>
          <el-menu-item class="animate" @click="wani()">
            <i class="bi bi-tv"></i>
          </el-menu-item>
          <el-menu-item class="music" @click="wmusic()">
            <i class="bi bi-music-note-beamed"></i>
          </el-menu-item>
          <el-menu-item class="shortvideo" @click="wsvideo()">
            <i class="bi bi-play-btn-fill"></i>
          </el-menu-item>
          <el-menu-item class="games" @click="wgames()">
            <i class="bi bi-xbox"></i>
          </el-menu-item>
          <el-menu-item class="sources" @click="wsources()">
            <i class="bi bi-archive"></i>
          </el-menu-item>
          <el-menu-item class="danmu" @click="wdanmu()">
            <i class="bi bi-chat-dots-fill"></i>
          </el-menu-item>
          <el-menu-item class="timess">
             <span id="sh">{{ currentTime }}</span>
          </el-menu-item>
      </el-menu>
       <div id="starting">
         <span @click="stkg()" class="kg" title="关闭"><i class="bi bi-x"></i></span>
       </div>
       <div id="search">
         <span @click="sckg()" class="kg" title="关闭"><i class="bi bi-x"></i></span>
         <Searchs :parent-msg="switchs"/>
       </div>
        <div id="wanimate"> 
          <span @click="swkg()" class="kg" title="关闭"><i class="bi bi-x"></i></span>
          <Animate/>
        </div>
        <div id="music">
         <span @click="mskg()" class="kg" title="关闭"><i class="bi bi-x"></i></span>
         <Musics/>
       </div>
       <div id="shortvideo">
         <span @click="stvkg()" class="kg" title="关闭"><i class="bi bi-x"></i></span>
       </div>
       <div id="games">
         <span @click="gmkg()" class="kg" title="关闭"><i class="bi bi-x"></i></span>
       </div>
       <div id="sources">
         <span @click="sourkg()" class="kg" title="关闭"><i class="bi bi-x"></i></span>
       </div>
       <div id="danmu">
         <span @click="dmkg()" class="kg" title="关闭"><i class="bi bi-x"></i></span>
       </div>
  </el-container>
</template>
<script>
import $ from 'jquery';
import {get} from './require';
import {ref} from 'vue';
import { ElMessage } from 'element-plus';
import Musics from './Musics.vue';
import Animate from './Animate.vue';
import Searchs from './Searchs.vue';
export default{
    name:'Desktop',
    components:{
      Musics,
      Animate,
      Searchs
    },
    data(){
        return{
            currentTime:'',
            contents:'',
            popoverVisible:false,
            dataList:[],
            ani:'',
            switchs:'true'
        }
    },
    created(){
        $(function(){
            $('.starting').attr('title','开始');
            $('.search').attr('title','搜索');
            $('.animate').attr('title','动漫');
            $('.music').attr('title','音乐');
            $('.shortvideo').attr('title','短视频');
            $('.games').attr('title','游戏');
            $('.sources').attr('title','资源');
            $('.danmu').attr('title','弹幕');
            $('.timess').attr('title','时间与日期');
          
        })
        
    },
    methods:{
        wstarting(){
          $('#starting').css('display','block');
        },
        stkg(){
          $('#starting').css('display','none');
        },
        mskg(){
          $('#music').css('display','none');
        },
        wmusic(){
          $('#music').css('display','block');
        },
        stvkg(){
          $('#shortvideo').css('display','none');
        },
        wsvideo(){
          $('#shortvideo').css('display','block');
        },
        gmkg(){
          $('#games').css('display','none');
        },
        wgames(){
          $('#games').css('display','block');
        },
        sourkg(){
          $('#sources').css('display','none');
        },
        wsources(){
          $('#sources').css('display','block');
        },
        dmkg(){
          $('#danmu').css('display','none');
        },
        wdanmu(){
          $('#danmu').css('display','block');
        },
        week(){
              var weeks = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六");
              var now = new Date();
              var day = now.getDay();
              var week = weeks[day];
              return week;
        },
        times(){
            //时间日期//获取时间，因为系统中时间是以毫秒计算的， 所以秒要通过余60000得到。 //然后，将得到的毫秒数再处理成秒
            setInterval(()=>{
              let now = new Date(); 
              let yy = now.getFullYear();
              let mm = now.getMonth() + 1;
              let dd = now.getDate(); 
              let cal = yy + "/" + mm + "/" + dd;
              let hh = now.getHours(); 
              let min = now.getMinutes(); 
              // let ss = now.getTime() % 60000;
              // ss = (ss - (ss % 1000)) / 1000;
              let clock = hh + ':'; 
              if (min < 10) clock += '0';
              clock += min;
              // if (ss < 10) clock += '0';
              // clock += ss;
              document.getElementById('sh').innerHTML=clock+'<br>'+cal+'<br>'+this.week();
            },1000);
        },
        swkg(){
            $('#wanimate').css('display','none');
        },
        wani(){
            $('#wanimate').css('display','block');
        },
        sckg(){
            $('#search').css('display','none');
            this.switchs='false';
        },
        wsearch(){
            $('#search').css('display','block');
        }
    },
    mounted(){
      //shijian
        this.times();
        
       
    },
    beforeUnmount(){
        if(this._intervalId){
          clearTimeout(this._intervalId);
        }
    },
    setup(){
      
    }
}
</script>
<style scoped>
@import url('../assets/build-tools/bootstrap/icons/bootstrap-icons.css');


.kg{
  font-size:30px;
  right:1.5vw;
  top:0.3vw;
  position:absolute;
  cursor: pointer;
  z-index:99999;
  &:hover{
    color:tomato;
    transform:rotate(180deg);
    transition:all 1s ease;
    cursor: pointer;
  }
}
.desk{
    display:flex;
    justify-content:center;
    align-items:center;
}
.contented{
  width:10vw;
  height:280px;
  margin-top:20px;
  background:rgba(255, 255, 255, 0.8);
  backdrop-filter:blur(4px);
  -webkit-backdrop-filter:blur(4px);
  overflow-y:scroll;
  overflow-x:hidden;
  cursor:pointer;
}
.searchcontent{
  width:100%;
  padding:0.5vw;
}
.searchcontent:hover{
   cursor: pointer;
   color:antiquewhite;
   background:rgba(67, 67, 67, 0.7);
}
#starting{
  width:72vw;
  height:80vh;
  display:none;
  flex-direction:row;
  background-color:rgba(255, 255, 255, 0.5);
  backdrop-filter:blur(4px);
  border-radius:18px;
  position:absolute;
  margin-left:11.5vw;
  margin-top:-5.5vw;
  overflow-y:scroll;
  overflow-x:hidden;
}
#search{
  width:72vw;
  height:80vh;
  display:none;
  flex-direction:row;
  background-color:rgba(255, 255, 255, 0.5);
  backdrop-filter:blur(4px);
  border-radius:18px;
  position:absolute;
  margin-left:11.5vw;
  margin-top:-5.5vw;
  overflow-y:hidden;
  overflow-x:hidden;
}
#music{
  width:72vw;
  height:80vh;
  display:none;
  flex-direction:row;
  background-color:rgba(255, 255, 255, 0.5);
  backdrop-filter:blur(4px);
  border-radius:18px;
  position:absolute;
  margin-left:11.5vw;
  margin-top:-5.5vw;
  overflow-y:scroll;
  overflow-x:hidden;
}
#shortvideo{
  width:72vw;
  height:80vh;
  display:none;
  flex-direction:row;
  background-color:rgba(255, 255, 255, 0.5);
  backdrop-filter:blur(4px);
  border-radius:18px;
  position:absolute;
  margin-left:11.5vw;
  margin-top:-5.5vw;
  overflow-y:scroll;
  overflow-x:hidden;
}
#games{
  width:72vw;
  height:80vh;
  display:none;
  flex-direction:row;
  background-color:rgba(255, 255, 255, 0.5);
  backdrop-filter:blur(4px);
  border-radius:18px;
  position:absolute;
  margin-left:11.5vw;
  margin-top:-5.5vw;
  overflow-y:scroll;
  overflow-x:hidden;
}
#sources{
  width:72vw;
  height:80vh;
  display:none;
  flex-direction:row;
  background-color:rgba(255, 255, 255, 0.5);
  backdrop-filter:blur(4px);
  border-radius:18px;
  position:absolute;
  margin-left:11.5vw;
  margin-top:-5.5vw;
  overflow-y:scroll;
  overflow-x:hidden;
}
#danmu{
  width:72vw;
  height:80vh;
  display:none;
  flex-direction:row;
  background-color:rgba(255, 255, 255, 0.5);
  backdrop-filter:blur(4px);
  border-radius:18px;
  position:absolute;
  margin-left:11.5vw;
  margin-top:-5.5vw;
  overflow-y:scroll;
  overflow-x:hidden;
}

#wanimate{
  width:72vw;
  height:80vh;
  display:none;
  flex-direction:row;
  background-color:rgba(255, 255, 255, 0.5);
  backdrop-filter:blur(4px);
  border-radius:18px;
  position:absolute;
  margin-left:11.5vw;
  margin-top:-5.5vw;
  overflow-y:hidden;
  overflow-x:hidden;
}

#sh{
  text-align:center;
  height:100%;
  line-height:1.6;
  padding:0;
  margin-top:0.7vw;
}
.desktopnav{
    display:flex;
    justify-content:space-evenly;
    align-items:center;
    width:72vw;
    height:80px;
    border-radius:24px;
    margin-left:11.5vw;
    margin-top:42vw;
    background:rgba(255, 255, 255, 0.7);
    backdrop-filter:blur(4px);
    -webkit-backdrop-filter:blur(4px);
    position:fixed;
    overflow:hidden;
}
.starticon{
    width:50px;
    height:50px;
}
.starting:hover{
  opacity:0.7;
}
.search{
  display:flex;
  width:50px;
  height:50px;
  justify-content:center;
  align-items:center;
  position:relative;
  cursor:pointer;
  &:hover{
      opacity:0.7;
  }
  i{
      font-size:18px;
      font-weight:600;
  }
}
.animate{
  display:flex;
  width:50px;
  height:50px;
  justify-content:center;
  align-items:center;
  position:relative;
  cursor:pointer;
  &:hover{
      opacity:0.7;
  }
  i{
      font-size:18px;
      font-weight:600;
  }
}
.music{
  display:flex;
  width:50px;
  height:50px;
  justify-content:center;
  align-items:center;
  position:relative;
  cursor:pointer;
  &:hover{
      opacity:0.7;
  }
  i{
      font-size:18px;
      font-weight:600;
  }
}
.shortvideo{
  display:flex;
  width:50px;
  height:50px;
  justify-content:center;
  align-items:center;
  position:relative;
  cursor:pointer;
  &:hover{
      opacity:0.7;
  }
  i{
      font-size:18px;
      font-weight:600;
  }
}
.games{
  display:flex;
  width:50px;
  height:50px;
  justify-content:center;
  align-items:center;
  position:relative;
  cursor:pointer;
  &:hover{
      opacity:0.7;
  }
  i{
      font-size:18px;
      font-weight:600;
  }
}
.sources{
  display:flex;
  width:50px;
  height:50px;
  justify-content:center;
  align-items:center;
  position:relative;
  cursor:pointer;
  &:hover{
      opacity:0.7;
  }
  i{
      font-size:18px;
      font-weight:600;
  }
}
.danmu{
  display:flex;
  width:50px;
  height:50px;
  justify-content:center;
  align-items:center;
  position:relative;
  cursor:pointer;
  &:hover{
      opacity:0.7;
  }
  i{
      font-size:18px;
      font-weight:600;
  }
}
</style>