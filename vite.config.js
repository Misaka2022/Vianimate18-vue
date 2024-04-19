import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  server: {
    proxy: {
      '/api': {
        target: 'http://localhost:5173', // 目标服务器地址
        changeOrigin: true, // 是否改变源地址
        secure: true, // 是否支持https
        // 其他代理选项
      }
    }
  }
})
