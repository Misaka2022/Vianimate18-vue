// 导出 routes
const routes = [
    {
        path: "/",
        name:'home',
        components:()=>import('../components/Vilogin.vue'),
        meta:{title:'Vianimate登录 v18.1'}
    },
    {
        path:"/desktop",
        name:'desktop',
        components:()=>import('../components/Desktop.vue'),
        meta:{title:'Vianimate桌面 v18.1'}
    }
]
export default routes