// 导入router所需的方法
import { createRouter, createWebHashHistory } from 'vue-router';

// 路由参数配置
const router = createRouter({
    // 使用hash(createWebHashHistory)模式，(createWebHistory是HTML5历史模式，支持SEO)
    history:createWebHashHistory(),
    routes:[
        {
            path:"/",
            name:'home',
            component:()=>import('../components/Vilogin.vue'),
            meta:{title:'Vianimate登录 v18.1'}
        },
        {
            path:'/desktop',
            name:'desktop',
            component:()=>import('../components/Desktop.vue'),
            meta:{title:'Vianimate桌面 v18.1'}
        }
    ],
    // scrollBehavior(to, from, savedPosition) {
    //     // 始终滚动到顶部
    //     return { top: 0 };
    // }
})
 
// 全局前置守卫，这里可以加入用户登录判断
router.beforeEach((to, from, next) => {
    if(to.meta.title){
        document.title = to.meta.title
    }
    next()
})
 
// // 全局后置钩子，这里可以加入改变页面标题等操作
// router.afterEach((to, from) => {
//     const _title = to.meta.title
//     if (_title) {
//         window.document.title = _title
//     }
// })
 
// 导出默认值
export default router