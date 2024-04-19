<template>
   <el-container class="reglg">
       <el-maim>
         <el-card class="cd">
            <span class="heads">
                <img src="../assets/img/2021/tub.png" alt="">
                <span>Vianimate 18</span>
            </span>
            <section class="headsbody" id="contents">
                <h4>欢迎使用Vianimate 18</h4>
                你应该知道以下规范 <br>
                1.不要用它来制作出版作品。
                2.不得使用技术手段攻击和爬取代码。
                3.这是作者权益，不允许任何人修改。
                4.你想快速学会使用它。现在，请阅读下面的一些信息。首先打开电脑浏览器，比如，火狐、谷歌Chorme。
                5.其次，输入你的账号和密码。如果您没有此帐户，您可以单击“注册”免费获得帐户。
                6.当您注册或登录时，你不用担心安全问题。我们收集您的一些信息来检查您的状态。所以，你在注册和登录前你需要阅读这个协议，看完之后会帮你自动勾选该选项。<br>
                关于我们<br>
                  2015年开始建立Vianimate，起初的名字是白云创意经过这些年的发展和变更，决定将网络工作室的名字命名为Vianimate。你有好的动画创意或推荐还有改进意见和建议，欢迎通过邮箱告诉我们(<a href="mailto:misaka0835@163.com">misaka0835@163.com</a>)。<br>
                
                Welcome to Vianimate Management System.There are some laws you should be know.<br>
                1.Don't use it to make publish works.
                2.Don't change code if you get it.
                3.It's Copyright for author don't allow anybody to change.
                
                There are some use describle for this system.
                1.This system is a manage animation and other things which someone need to use and it is pro.
                2.You want to use it quickly and you want to learn how to use.Now,read some infomation below.
                (1)First,open your broswer.Such as,FireFox,Google Chorme.
                (2)Second,input your account number and password.If you have no account for this,you can click "Register" to get the account.
                (3)Our protect your account and password certainly when you register or login.And our gather some infomation of you to scan the state of you.So,if you agree this action and protocol you can click the square over submit button.<br>
                
                About us<br>
                We are develope in 2015 and the begin name is BaiYun Creative.And after 7 years of development,we are decided the name of the work house name is Vianimate.
                If you have a good idea for animate,welcome to tell us.(<a href="mailto:misaka0835@163.com">misaka0835@163.com</a>). 
            </section>
            <el-button type="button"  class="xieyi" :disabled="form.agree">已阅读并同意以上协议</el-button>
        </el-card>
        <el-form class="logfm" :model="form" :rules="rules" ref="formRef">
            <h3 class="title">{{ form.logreg }}</h3>
            <el-form-item label="用户名称" class="inputs" prop="username">
                <el-input v-model="form.username" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item label="用户密码" class="inputs" prop="password">
                <el-input type="password" v-model="form.password" autocomplete="off"></el-input>
                </el-form-item>
                <el-form-item label="验证码" class="inputs-yanz" prop="checkcode">
                    <el-input type="text" v-model="form.checkcode"  autocomplete="off" class="yz" id="yzs"></el-input>
                    <el-button type="primary" class="yanzbtn" id="rplb" @click="rplb()">获取验证码</el-button>
                </el-form-item>
                <el-form-item>
                <span class="reback">
                    <span id="regs" title="获取一个Vianimate账户" @click="regs()">{{form.logireg}}</span>
                    <span id="rbk" title="找回您的密码">找回密码</span>
                </span>
                <el-checkbox v-model="form.agree" class="xie" @click="xie()">我已阅读并同意《Vianimate18使用服务协议》</el-checkbox>
                </el-form-item>
                <el-form-item class="btn">
                    <el-button type="primary" @click="submitForm()"  class="lgbtn">
                        {{form.logreg }}
                    </el-button>
                </el-form-item>
        </el-form>
       </el-maim>
   </el-container>
</template>
<script>
import $ from 'jquery';
import { ElMessage } from 'element-plus';
import { getCurrentInstance, reactive, ref, toRaw } from 'vue';
import {get,post} from './require'
import { useRoute } from 'vue-router';

export default{
    name:'Vilogin',
    data(){
        return{
            username:'',
            password:'',
          
        }
    },
    created(){
       
    },
    mounted(){
        this.scrolls();
    },
    methods:{
        regs(){
            if(this.form.logreg==='登录'){
                this.form.logreg='注册';
                this.form.logireg='已有账号？';
            }else{
                this.form.logreg='登录';
                this.form.logireg='注册账号';
            }
        }
    },
    setup(props,{emit}){
        const formRef = ref(null);
        const agree=ref(false);
        
        const form=reactive({
            username:'',
            password:'',
            checkcode:'',
            agree:'',
            routerControl:'/',
            checks:'',
            logreg:'登录',
            pols:'',
            userList:[],
            logireg:'注册账号',
        })
        const rules={
            username:[
            {required: true, message: '请输入用户名', trigger: 'blur' },
            { min:3, max:10, message: '用户名长度在 3 到 10 个字符', trigger: 'blur' }
            ],
            password:[
            {required: true, message: '请输入密码', trigger: 'blur' },
            { min:6, max:16, message: '密码长度在 6 到 16 个字符', trigger: 'blur' }
            ],
            checkcode:[
                {
                    required:true,message:'请输入验证码',trigger:'blur'
                }
            ]
        }
        const randomString=()=>{
            return Math.random().toString(36).slice(2,8).padEnd(6,'0');
        }
        form.checks=randomString();
        const countDown=(seconds)=>{
                    let remainingTime =seconds;
                    const interval = setInterval(() => {
                    remainingTime--;
                    if (remainingTime === 0) {
                        clearInterval(interval);
                        document.getElementById('rplb').innerHTML='获取验证';
                        document.getElementById('rplb').disabled=false;
                        document.getElementById('rplb').style.cursor="pointer";
                        document.getElementById('rplb').style.pointerEvents='auto';
                    } else {
                        
                        document.getElementById('rplb').innerHTML=remainingTime+'s后获取';
                        document.getElementById('rplb').disabled=true;
                        document.getElementById('rplb').style.cursor="not-allowed";
                        document.getElementById('rplb').style.pointerEvents='none';
                    }
            },1000);
        }
        const rplb=()=>{
                ElMessage.success('本次的验证码是：'+form.checks);
                countDown(60);
            }

        const submitForm=()=>{
            if(form.agree===true && form.checkcode===form.checks){
                if(form.username==='' || form.password===''){
                    ElMessage.error('请输入账号或密码！');
                }else{
                    if(form.logreg==='登录'){
                        post('/user.php',{
                            username:form.username,
                            password:form.password
                        }).then(response=>{
                            if(response.status===true){
                                ElMessage.success('登录成功！');
                                emit('change-event',true);
                            }else{
                                ElMessage.error('登录失败！');
                            }
                        })
                    }else{
                        post('/user.php',{
                            username:form.username,
                            password:form.password
                        }).then(response=>{
                            console.log(response.status)
                            if(response.status===true){
                                ElMessage.success('注册成功！');
                            }else{
                                ElMessage.error('注册失败！');
                            }
                        })
                    }
                }
            }else{
                if(form.checkcode!==form.checks){
                    ElMessage.error('验证码错误！');
                }else{
                    if(form.agree===false){
                        ElMessage.error('请先阅读并同意《Vianimate18使用服务协议》！');
                       }
                    }
                }   
            }

        const xie=()=>{
            form.agree=true;
            ElMessage.error('请先滑动阅读左边的协议！');
        }
        const scrolls=()=>{
            let contents=document.getElementById('contents');
            contents.addEventListener('scroll',()=>{
                if(contents.scrollHeight-contents.scrollTop===contents.clientHeight){
                    form.agree=true;
                    ElMessage.success('您已阅读完成！');
                }
            })
        }
        return{
            formRef,
            form,
            rules,
            agree,
            submitForm,
            xie,
            scrolls,
            rplb
        }
   }
}
       

</script>
<style scoped>
.reglg{
    width:45vw;
    height:45%;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-wrap:wrap;
    border-radius:12px;
    background:rgba(255, 255, 255, 0.5);
    -webkit-backdrop-filter:blur(4px);
    backdrop-filter:blur(4px);
    position:absolute;
    overflow:hidden;
    left:28vw;
}
.heads{
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:row;
    cursor:default;
    margin-left:2.5vw;
    user-select:none;
    img{
        width:50px;
        height:50px;
        margin-right:1vw;
    }
}
.reback{
    display:flex;
    flex-direction:row;
    justify-content:space-between;
    text-decoration:none;
    cursor:default;
    padding-left:6.5vw;
    position: relative;
    #regs{
        margin-left:2.6vw;
    }
    #rbk{
        margin-left:2vw;
    }
    #regs:hover{
        color:lightskyblue;
        cursor: pointer;
        margin-left:2.6vw;
    }
    #rbk:hover{
        color:lightskyblue;
        cursor: pointer;
        margin-left:2vw;
    }
}
    .xie{
        margin-left:4.8vw;
    }

.logfm{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    width:24vw;
    height:30vh;
    margin-left:21vw;
    position:relative;
}
.yz{
    width:52%;
    margin-left:0.8vw;
    margin-right:0.8vw;
}
.inputs-yanz{
    width:75%;
}
.inputs{
    width:75%;
}
.btn{
    width:100%;
}
.lgbtn{
    width:75%;
    margin-left:3.8vw;
}
.title {
  text-align: center;
  margin: 20px 0;
  margin-left:3vw;
  letter-spacing:1em;
}
.cd{
    width:24vw;
    position:fixed;
    top:0;
    left:-3.5vw;
    border:none;
    background:none;
}
.headsbody{
    width:18vw;
    height:35vh;
    overflow-y:scroll;
    padding-left:1vw;
    padding-right:1vw;
    margin-left:2.5vw;
    margin-top:0.5vw;
    user-select: none;
    cursor:default;
    font-size:14px;
}
.xieyi{
    display:none;
    margin-left:1.5vw;
    margin-top:0.9vw;
}
</style>