<template>
   <el-container class="app">
      <Vilogin @change-event="changes" v-show="logs"></Vilogin>
      <Desktop v-show="displays"></Desktop>
   </el-container>
   <Petgirl class="kanbn"/>
   <Background/>
</template>
<script>
import Vilogin from './components/Vilogin.vue';
import Desktop from './components/Desktop.vue';
import Background from './components/Background.vue';
import Petgirl from './components/Petgirl.vue';
import $ from 'jquery';
export default{
    name:'App',
    components:{
      Vilogin,
      Desktop,
      Background,
      Petgirl
    },
    data(){
      return{
         displays:'',
         logs:'true'
      }
    },
    created(){
        if(this.logs==true){
          this.$router.replace('/');
          $('title').html('Vianimate登录 v18.1');
        }
    },
    methods:{
       changes(){
        this.displays=true;
        this.logs=false;
        this.$router.replace('/desktop');
        $('title').html('Vianimate桌面 v18.1');
       }
    }
}

</script>
<style scoped>
 .app{
   display:flex;
   justify-content:center;
   align-items:center;
   width:100%;
   height:auto;
   overflow:hidden;
 }
 .kanbn{
    width:240px;
    height:320px;
    overflow:hidden;
    position:absolute;
    z-index:9999;
 }

</style>
