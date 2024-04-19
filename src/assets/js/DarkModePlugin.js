
// Vue夜间模式插件
const DarkModePlugin = {
    // 插件安装方法
    install(Vue,options) {
      // 设置默认选项
      const defaultOptions = {
        darkClass: 'dark-mode', // 夜间模式的CSS类
        lightClass: 'light-mode', // 日间模式的CSS类
        storageKey: 'user-dark-mode-preference', // 本地存储的键名
        storageType: 'local', // 本地存储类型，可以是'local'或'session'
      };
   
      // 合并用户选项和默认选项
      const { darkClass, lightClass, storageKey, storageType } = Object.assign({}, defaultOptions, options);
   
      // 获取初始模式
      const initialMode = (() => {
        if (storageType === 'local') {
          return localStorage.getItem(storageKey) || 'auto';
        } else if (storageType === 'session') {
          return sessionStorage.getItem(storageKey) || 'auto';
        }
        return 'auto';
      })();
   
      // 应用模式类
      const applyMode = (mode) => {
        const bodyClassList = document.body.classList;
        if (mode === 'dark') {
          bodyClassList.add(darkClass);
          bodyClassList.remove(lightClass);
        } else if (mode === 'light') {
          bodyClassList.add(lightClass);
          bodyClassList.remove(darkClass);
        }
      };
      // 监听模式改变
      $toggleDarkMode = (mode) => {
        if (mode === 'toggle') {
          mode = (document.body.classList.contains(darkClass) ? 'light' : 'dark');
        }
        applyMode(mode);
        if (storageType === 'local') {
          localStorage.setItem(storageKey, mode);
        } else if (storageType === 'session') {
          sessionStorage.setItem(storageKey, mode);
        }
      };
   
      // 初始应用模式
      applyMode(initialMode);
    }
    
  };
  export default DarkModePlugin;