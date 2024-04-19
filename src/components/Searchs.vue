<template>
    <el-container>
        <el-header class="header">
            <span>Vianimate Search</span>
        </el-header>
        <el-main>
            <iframe :src="upurl()" frameborder="0" id="search-m"></iframe>
        </el-main>
    </el-container>
</template>
<script>
import $ from 'jquery'
export default {
    name: 'Searchs',
    props: {
        parentMsg:{
            type:String,
            default:'true'
        }
    },
    data() {
        return {
            
        }
    },
    created() {
       $(function(){
            const url="http://localhost:5200/Vianimate18/apis/";
            //搜索及内容显示
            $('#search-m').attr('src',url+'search-api/searchbf.php');
       })
       
    },
    methods: {
       upurl(){
          if(this.parentMsg=='false'){
            const url="http://localhost:5200/Vianimate18/apis/";
            $('#search-m').attr('src',url+'search-api/searchbf.php');
          }
       }
    },
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
#search-m{
  display:block;
  width:100%;
  height:80vh;
  top:3vw;
  left:0;
  border:none;
  overflow-y:scroll;
  position:absolute;;
}
</style>