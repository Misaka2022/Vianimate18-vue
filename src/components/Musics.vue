<template>
   <el-container>
       <el-header class="header">
           <span>Vianimate Music</span>
       </el-header>
       <el-main>
           <div id="music-menu">
              <ul class="music-list">
                 <li v-for="(item,index) in musicList" :key="index" @click="playMusic(item.url)">
                     <span>{{item.name}}</span>
                     <span>{{item.singer}}</span>
                 </li>
              </ul>
           </div>
           <div id="music-main">
              <img :src="musicImg" id="music-img">
              <span id="music-name">{{musicName}}</span>
              <span id="music-singer">{{musicSinger}}</span>
           </div>
           <div id="music-player">
              <audio :src="musicUrl" @play="play" @pause="pause" :loop="loop" id="music-audio"></audio>
              <button id="music-prev" @click="prev">上一首</button>
              <button id="music-play" @click="play">播放</button>
              <button id="music-pause" @click="pause">暂停</button>
              <button id="music-next" @click="next">下一首</button>
              <button id="music-loop" @click="loop">循环</button>
              <button id="music-random" @click="random">随机</button>
           </div>
       </el-main>
   </el-container>
</template>
<script>

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
</style>