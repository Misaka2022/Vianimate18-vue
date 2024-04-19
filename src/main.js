import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import $ from 'jquery'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import router from './router/index'


createApp(App).
use($).
use(ElementPlus).
use(router).
mount('#app')
