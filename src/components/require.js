import axios from "axios";

const http=axios.create({
    baseURL:'http://localhost:5200/Vianimate18/apis/',
    timeout:10000
})

http.interceptors.request.use(config=>{
    return config;
},error=>{
    return Promise.reject(error);
})

http.interceptors.response.use(response=>{
    return response.data;
},error=>{
    return Promise.reject(error);
})

export const get=(url,params)=>http.get(url,{params:params});
export const post=(url,data)=>http.post(url,data);
export default http;