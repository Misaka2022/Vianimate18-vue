<template>
   <el-container>
        <div class="waifu" style="margin-left:66vw;top:14.5vw;position:absolute">
                <div class="waifu-tips"></div>
                <div id="fullsc">
                        <canvas id="live2d" class="live2d" title="点我可以体验全屏哦!"></canvas>
                </div>
                <div class="waifu-tool">
                    <span class="fui-home"></span>
                    <span class="fui-chat" id="ChatGPT" title="点击打开ChatGPT"></span>
                    <span class="fui-eye"></span>
                    <span class="fui-user"></span>
                    <span class="fui-photo"></span>
                    <span class="fui-info-circle"></span>
                    <span class="bi bi-x" id="gui-cro" style="font-size:24px;font-weight:600;margin-left:-1vw"></span>
                    <!-- fui-cross -->
                </div>
        </div>
   </el-container>
</template>
<script>
import '../assets/build-tools/bootstrap/js/jquery.min.js';
import '../assets/desktopets/jquery-ui.min.js';
import '../assets/desktopets/autoload.js';
import '../assets/desktopets/waifu-tips.min.js?v=1.4.2';
import '../assets/desktopets/live2d.min.js?v=1.0.5';

export default{
    name:'Petgirl',
    data(){
        return{
            wwf:''
        }
    },
    setup(){

// settings
        live2d_settings['modelId']=4;                  // 默认模型 ID
        live2d_settings['modelTexturesId']=75;         // 默认材质 ID
        live2d_settings['modelStorage'] = false;         // 不储存模型 ID
        live2d_settings['canCloseLive2d'] = true;       // 隐藏 关闭看板娘 按钮
        live2d_settings['canTurnToHomePage'] = false;    // 隐藏 返回首页 按钮
        live2d_settings['waifuSize'] = '220x310';        // 看板娘大小
        live2d_settings['waifuTipsSize'] = '220x100';    // 提示框大小
        live2d_settings['waifuFontSize'] = '20px';       // 提示框字体
        live2d_settings['waifuToolFont'] = '20px';       // 工具栏字体
        live2d_settings['waifuToolLine'] = '36px';       // 工具栏行高
        live2d_settings['waifuToolTop'] = '20px';       // 工具栏顶部边距
        live2d_settings['waifuDraggable'] = 'unlimited';    // 拖拽样式
        live2d_settings['waifuDraggableRevert'] = false;
        /* 在 initModel 前添加 */
        initModel("./waifu-tips.json?v=1.4.2");

         // waifufunction
        window.live2d_settings = Array(); 
        String.prototype.render = function(context) {
        var tokenReg = /(\\)?\{([^\{\}\\]+)(\\)?\}/g;
        return this.replace(tokenReg, function (word, slash1, token, slash2) {
            if (slash1 || slash2) { return word.replace('\\', ''); }
            var variables = token.replace(/\s/g, '').split('.');
            var currentObject = context;
            var i, length, variable;
            for (i = 0, length = variables.length; i < length; ++i) {
                variable = variables[i];
                currentObject = currentObject[variable];
                if (currentObject === undefined || currentObject === null) return '';
            }
            return currentObject;
        });
    };
    var re = /x/;
    // console.log(re);
    function empty(obj) {return typeof obj=="undefined"||obj==null||obj==""?true:false}
    function getRandText(text) {return Array.isArray(text) ? text[Math.floor(Math.random() * text.length + 1)-1] : text}
    function showMessage(text, timeout, flag) {
        if(flag || sessionStorage.getItem('waifu-text') === '' || sessionStorage.getItem('waifu-text') === null){
            if(Array.isArray(text)) text = text[Math.floor(Math.random() * text.length + 1)-1];
            if (live2d_settings.showF12Message) console.log('[Message]', text.replace(/<[^<>]+>/g,''));
            
            if(flag) sessionStorage.setItem('waifu-text', text);
            
            $('.waifu-tips').stop();
            $('.waifu-tips').html(text).fadeTo(200, 1);
            if (timeout === undefined) timeout = 5000;
            hideMessage(timeout);
        }
    }
    function hideMessage(timeout) {
        $('.waifu-tips').stop().css('opacity',1);
        if (timeout === undefined) timeout = 5000;
        window.setTimeout(function() {sessionStorage.removeItem('waifu-text')}, timeout);
        $('.waifu-tips').delay(timeout).fadeTo(200, 0);
    }
    function initModel(waifuPath, type) {
        /* console welcome message */
        eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('8.d(" ");8.d("\\U,.\\y\\5.\\1\\1\\1\\1/\\1,\\u\\2 \\H\\n\\1\\1\\1\\1\\1\\b \', !-\\r\\j-i\\1/\\1/\\g\\n\\1\\1\\1 \\1 \\a\\4\\f\'\\1\\1\\1 L/\\a\\4\\5\\2\\n\\1\\1 \\1 /\\1 \\a,\\1 /|\\1 ,\\1 ,\\1\\1\\1 \',\\n\\1\\1\\1\\q \\1/ /-\\j/\\1\\h\\E \\9 \\5!\\1 i\\n\\1\\1\\1 \\3 \\6 7\\q\\4\\c\\1 \\3\'\\s-\\c\\2!\\t|\\1 |\\n\\1\\1\\1\\1 !,/7 \'0\'\\1\\1 \\X\\w| \\1 |\\1\\1\\1\\n\\1\\1\\1\\1 |.\\x\\"\\1\\l\\1\\1 ,,,, / |./ \\1 |\\n\\1\\1\\1\\1 \\3\'| i\\z.\\2,,A\\l,.\\B / \\1.i \\1|\\n\\1\\1\\1\\1\\1 \\3\'| | / C\\D/\\3\'\\5,\\1\\9.\\1|\\n\\1\\1\\1\\1\\1\\1 | |/i \\m|/\\1 i\\1,.\\6 |\\F\\1|\\n\\1\\1\\1\\1\\1\\1.|/ /\\1\\h\\G \\1 \\6!\\1\\1\\b\\1|\\n\\1\\1\\1 \\1 \\1 k\\5>\\2\\9 \\1 o,.\\6\\2 \\1 /\\2!\\n\\1\\1\\1\\1\\1\\1 !\'\\m//\\4\\I\\g\', \\b \\4\'7\'\\J\'\\n\\1\\1\\1\\1\\1\\1 \\3\'\\K|M,p,\\O\\3|\\P\\n\\1\\1\\1\\1\\1 \\1\\1\\1\\c-,/\\1|p./\\n\\1\\1\\1\\1\\1 \\1\\1\\1\'\\f\'\\1\\1!o,.:\\Q \\R\\S\\T v"+e.V+" / W "+e.N);8.d(" ");',60,60,'|u3000|uff64|uff9a|uff40|u30fd|uff8d||console|uff8a|uff0f|uff3c|uff84|log|live2d_settings|uff70|u00b4|uff49||u2010||u3000_|u3008||_|___|uff72|u2500|uff67|u30cf|u30fc||u30bd|u4ece|u30d8|uff1e|__|u30a4|k_|uff17_|u3000L_|u3000i|uff1a|u3009|uff34|uff70r|u30fdL__||___i|l2dVerDate|u30f3|u30ce|nLive2D|u770b|u677f|u5a18|u304f__|l2dVersion|FGHRSH|u00b40i'.split('|'),0,{}));
        
        /* 判断 JQuery */
        if (typeof($.ajax) != 'function') typeof(jQuery.ajax) == 'function' ? window.$ = jQuery : console.log('[Error] JQuery is not defined.');
        
        /* 加载看板娘样式 */
        live2d_settings.waifuSize = live2d_settings.waifuSize.split('x');
        live2d_settings.waifuTipsSize = live2d_settings.waifuTipsSize.split('x');
        live2d_settings.waifuEdgeSide = live2d_settings.waifuEdgeSide.split(':');
        
        $("#live2d").attr("width",live2d_settings.waifuSize[0]);
        $("#live2d").attr("height",live2d_settings.waifuSize[1]);
        $(".waifu-tips").width(live2d_settings.waifuTipsSize[0]);
        $(".waifu-tips").height(live2d_settings.waifuTipsSize[1]);
        $(".waifu-tips").css("top",live2d_settings.waifuToolTop);
        $(".waifu-tips").css("font-size",live2d_settings.waifuFontSize);
        $(".waifu-tool").css("font-size",live2d_settings.waifuToolFont);
        $(".waifu-tool span").css("line-height",live2d_settings.waifuToolLine);
        
        if (live2d_settings.waifuEdgeSide[0] == 'left') $(".waifu").css("left",live2d_settings.waifuEdgeSide[1]+'px');
        else if (live2d_settings.waifuEdgeSide[0] == 'right') $(".waifu").css("right",live2d_settings.waifuEdgeSide[1]+'px');
        
        window.waifuResize = function() { $(window).width() <= Number(live2d_settings.waifuMinWidth.replace('px','')) ? $(".waifu").hide() : $(".waifu").show(); };
        if (live2d_settings.waifuMinWidth != 'disable') { waifuResize(); $(window).resize(function() {waifuResize()}); }
        
        try {
            if (live2d_settings.waifuDraggable == 'axis-x') $(".waifu").draggable({ axis: "x", revert: live2d_settings.waifuDraggableRevert });
            else if (live2d_settings.waifuDraggable == 'unlimited') $(".waifu").draggable({ revert: live2d_settings.waifuDraggableRevert });
            else $(".waifu").css("transition", 'all .3s ease-in-out');
        } catch(err) { console.log('[Error] JQuery UI is not defined.') }
        
        live2d_settings.homePageUrl == 'auto' ? window.location.protocol+'//'+window.location.hostname+'/' : live2d_settings.homePageUrl;
        if (window.location.protocol == 'file:' && live2d_settings.modelAPI.substr(0,2) == '//') live2d_settings.modelAPI = 'http:'+live2d_settings.modelAPI;
        
        $('.waifu-tool .fui-home').click(function (){
            //window.location = 'https://www.fghrsh.net/';
            window.location = live2d_settings.homePageUrl;
        });
        $('.waifu-tool .fui-info-circle').click(function (){
            //window.open('https://imjad.cn/archives/lab/add-dynamic-poster-girl-with-live2d-to-your-blog-02');
            window.open(live2d_settings.aboutPageUrl);
        });
        if (typeof(waifuPath) == "object") loadTipsMessage(waifuPath); else {
            $.ajax({
                cache: true,
                url: waifuPath == '' ? live2d_settings.tipsMessage : (waifuPath.substr(waifuPath.length-15)=='waifu-tips.json'?waifuPath:waifuPath+'waifu-tips.json'),
                dataType: "json",
                success: function (result){ loadTipsMessage(result); }
            });
        }
        if (!live2d_settings.showToolMenu) $('.waifu-tool').hide();
        if (!live2d_settings.canCloseLive2d) $('.waifu-tool .fui-cross').hide();
        if (!live2d_settings.canSwitchModel) $('.waifu-tool .fui-eye').hide();
        if (!live2d_settings.canSwitchTextures) $('.waifu-tool .fui-user').hide();
        if (!live2d_settings.canSwitchHitokoto) $('.waifu-tool .fui-chat').hide();
        if (!live2d_settings.canTakeScreenshot) $('.waifu-tool .fui-photo').hide();
        if (!live2d_settings.canTurnToHomePage) $('.waifu-tool .fui-home').hide();
        if (!live2d_settings.canTurnToAboutPage) $('.waifu-tool .fui-info-circle').hide();

        if (waifuPath === undefined) waifuPath = '';
        var modelId = localStorage.getItem('modelId');
        var modelTexturesId = localStorage.getItem('modelTexturesId');
        
        if (!live2d_settings.modelStorage || modelId == null) {
            var modelId = live2d_settings.modelId;
            var modelTexturesId = live2d_settings.modelTexturesId;
        } loadModel(modelId, modelTexturesId);
    }
    function loadModel(modelId, modelTexturesId=0) {
    if (live2d_settings.modelStorage) {
        localStorage.setItem('modelId', modelId);
        localStorage.setItem('modelTexturesId', modelTexturesId);
    } else {
        sessionStorage.setItem('modelId', modelId);
        sessionStorage.setItem('modelTexturesId', modelTexturesId);
    } loadlive2d('live2d', live2d_settings.modelAPI+'get/?id='+modelId+'-'+modelTexturesId, (live2d_settings.showF12Status ? console.log('[Status]','live2d','模型',modelId+'-'+modelTexturesId,'加载完成'):null));
    }
    function loadTipsMessage(result) {
        window.waifu_tips = result;
        
        $.each(result.mouseover, function (index, tips){
            $(document).on("mouseover", tips.selector, function (){
                var text = getRandText(tips.text);
                text = text.render({text: $(this).text()});
                showMessage(text, 3000);
            });
        });
        $.each(result.click, function (index, tips){
            $(document).on("click", tips.selector, function (){
                var text = getRandText(tips.text);
                text = text.render({text: $(this).text()});
                showMessage(text, 3000, true);
            });
        });
        $.each(result.seasons, function (index, tips){
            var now = new Date();
            var after = tips.date.split('-')[0];
            var before = tips.date.split('-')[1] || after;
            
            if((after.split('/')[0] <= now.getMonth()+1 && now.getMonth()+1 <= before.split('/')[0]) && 
            (after.split('/')[1] <= now.getDate() && now.getDate() <= before.split('/')[1])){
                var text = getRandText(tips.text);
                text = text.render({year: now.getFullYear()});
                showMessage(text, 6000, true);
            }
        });
        
        if (live2d_settings.showF12OpenMsg) {
            re.toString = function() {
                showMessage(getRandText(result.waifu.console_open_msg), 5000, true);
                return '';
            };
        }
        
        if (live2d_settings.showCopyMessage) {
            $(document).on('copy', function() {
                showMessage(getRandText(result.waifu.copy_message), 5000, true);
            });
        }
        
        $('.waifu-tool .fui-photo').click(function(){
            showMessage(getRandText(result.waifu.screenshot_message), 5000, true);
            window.Live2D.captureName = live2d_settings.screenshotCaptureName;
            window.Live2D.captureFrame = true;
        });
        
        $('.waifu-tool .fui-cross').click(function(){
            sessionStorage.setItem('waifu-dsiplay', 'none');
            showMessage(getRandText(result.waifu.hidden_message), 1300, true);
            window.setTimeout(function() {$('.waifu').hide();}, 1300);
        });
        $('#yonghu #kjs4').click(function(){
            sessionStorage.setItem('waifu-dsiplay', 'block');
            showMessage(getRandText(result.waifu.show_message), 1300, true);
            window.setTimeout(function() {$('.waifu').show();}, 1300);
        });
        
        window.showWelcomeMessage = function(result) {
            var text;
            if (window.location.href == live2d_settings.homePageUrl) {
                var now = (new Date()).getHours();
                if (now > 23 || now <= 5) text = getRandText(result.waifu.hour_tips.t23-5);
                else if (now > 5 && now <= 7) text = getRandText(result.waifu.hour_tips.t5-7);
                else if (now > 7 && now <= 11) text = getRandText(result.waifu.hour_tips.t7-11);
                else if (now > 11 && now <= 14) text = getRandText(result.waifu.hour_tips.t11-14);
                else if (now > 14 && now <= 17) text = getRandText(result.waifu.hour_tips.t14-17);
                else if (now > 17 && now <= 19) text = getRandText(result.waifu.hour_tips.t17-19);
                else if (now > 19 && now <= 21) text = getRandText(result.waifu.hour_tips.t19-21);
                else if (now > 21 && now <= 23) text = getRandText(result.waifu.hour_tips.t21-23);
                else text = getRandText(result.waifu.hour_tips.default);
            } else {
                var referrer_message = result.waifu.referrer_message;
                if (document.referrer !== '') {
                    var referrer = document.createElement('a');
                    referrer.href = document.referrer;
                    var domain = referrer.hostname.split('.')[1];
                    if (window.location.hostname == referrer.hostname)
                        text = referrer_message.localhost[0] + document.title.split(referrer_message.localhost[2])[0] + referrer_message.localhost[1];
                    else if (domain == 'baidu')
                        text = referrer_message.baidu[0] + referrer.search.split('&wd=')[1].split('&')[0] + referrer_message.baidu[1];
                    else if (domain == 'so')
                        text = referrer_message.so[0] + referrer.search.split('&q=')[1].split('&')[0] + referrer_message.so[1];
                    else if (domain == 'google')
                        text = referrer_message.google[0] + document.title.split(referrer_message.google[2])[0] + referrer_message.google[1];
                    else {
                        $.each(result.waifu.referrer_hostname, function(i,val) {if (i==referrer.hostname) referrer.hostname = getRandText(val)});
                        text = referrer_message.default[0] + referrer.hostname + referrer_message.default[1];
                    }
                } else text = referrer_message.none[0] + document.title.split(referrer_message.none[2])[0] + referrer_message.none[1];
            }
            showMessage(text, 6000);
        }; if (live2d_settings.showWelcomeMessage) showWelcomeMessage(result);
        
        var waifu_tips = result.waifu;
        
        function loadOtherModel() {
            var modelId = modelStorageGetItem('modelId');
            var modelRandMode = live2d_settings.modelRandMode;
            
            $.ajax({
                cache: modelRandMode == 'switch' ? true : false,
                url: live2d_settings.modelAPI+modelRandMode+'/?id='+modelId,
                dataType: "json",
                success: function(result) {
                    loadModel(result.model['id']);
                    var message = result.model['message'];
                    $.each(waifu_tips.model_message, function(i,val) {if (i==result.model['id']) message = getRandText(val)});
                    showMessage(message, 3000, true);
                }
            });
        }
        
        function loadRandTextures() {
            var modelId = modelStorageGetItem('modelId');
            var modelTexturesId = modelStorageGetItem('modelTexturesId');
            var modelTexturesRandMode = live2d_settings.modelTexturesRandMode;
            
            $.ajax({
                cache: modelTexturesRandMode == 'switch' ? true : false,
                url: live2d_settings.modelAPI+modelTexturesRandMode+'_textures/?id='+modelId+'-'+modelTexturesId,
                dataType: "json",
                success: function(result) {
                    if (result.textures['id'] == 1 && (modelTexturesId == 1 || modelTexturesId == 0))
                        showMessage(waifu_tips.load_rand_textures[0], 3000, true);
                    else showMessage(waifu_tips.load_rand_textures[1], 3000, true);
                    loadModel(modelId, result.textures['id']);
                }
            });
        }
        
        function modelStorageGetItem(key) { return live2d_settings.modelStorage ? localStorage.getItem(key) : sessionStorage.getItem(key); }
        
        /* 检测用户活动状态，并在空闲时显示一言 */
        if (live2d_settings.showHitokoto) {
            window.getActed = false; window.hitokotoTimer = 0; window.hitokotoInterval = false;
            $(document).mousemove(function(e){getActed = true;}).keydown(function(){getActed = true;});
            setInterval(function(){ if (!getActed) ifActed(); else elseActed(); }, 1000);
        }
        
        function ifActed() {
            if (!hitokotoInterval) {
                hitokotoInterval = true;
                hitokotoTimer = window.setInterval(showHitokotoActed, 30000);
            }
        }
        
        function elseActed() {
            getActed = hitokotoInterval = false;
            window.clearInterval(hitokotoTimer);
        }
        
        function showHitokotoActed() {
            if ($(document)[0].visibilityState == 'visible') showHitokoto();
        }
        
        function showHitokoto() {
            switch(live2d_settings.hitokotoAPI) {
                case 'lwl12.com':
                    $.getJSON('https://api.lwl12.com/hitokoto/v1?encode=realjson',function(result){
                        if (!empty(result.source)) {
                            var text = waifu_tips.hitokoto_api_message['lwl12.com'][0];
                            if (!empty(result.author)) text += waifu_tips.hitokoto_api_message['lwl12.com'][1];
                            text = text.render({source: result.source, creator: result.author});
                            window.setTimeout(function() {showMessage(text+waifu_tips.hitokoto_api_message['lwl12.com'][2], 3000, true);}, 5000);
                        } showMessage(result.text, 5000, true);
                    });break;
                case 'fghrsh.net':
                    $.getJSON('https://api.fghrsh.net/hitokoto/rand/?encode=jsc&uid=3335',function(result){
                        if (!empty(result.source)) {
                            var text = waifu_tips.hitokoto_api_message['fghrsh.net'][0];
                            text = text.render({source: result.source, date: result.date});
                            window.setTimeout(function() {showMessage(text, 3000, true);}, 5000);
                            showMessage(result.hitokoto, 5000, true);
                        }
                    });break;
                case 'jinrishici.com':
                    $.ajax({
                        url: 'https://v2.jinrishici.com/one.json',
                        xhrFields: {withCredentials: true},
                        success: function (result, status) {
                            if (!empty(result.data.origin.title)) {
                                var text = waifu_tips.hitokoto_api_message['jinrishici.com'][0];
                                text = text.render({title: result.data.origin.title, dynasty: result.data.origin.dynasty, author:result.data.origin.author});
                                window.setTimeout(function() {showMessage(text, 3000, true);}, 5000);
                            } showMessage(result.data.content, 5000, true);
                        }
                    });break;
                    // case 'https://cdn.jsdelivr.net/':
                    //     $.ajax({
                    //         url: 'https://cdn.jsdelivr.net/gh/xiaoski/live2d_models_collection/mikoto/mikoto.model.json',
                    //         xhrFields: {withCredentials: true},
                    //         success: function (result, status) {
                    //             if (!empty(result.from)) {
                    //                 var text = waifu_tips.hitokoto_api_message['https://cdn.jsdelivr.net/'][0];
                    //                 text = text.render({title: result.data.origin.title, dynasty: result.data.origin.dynasty, author:result.data.origin.author});
                    //                 window.setTimeout(function() {showMessage(text, 3000, true);}, 5000);
                    //             } showMessage(result.jsdelivr, 5000, true);
                    //         }
                    //     });break;
                
                default:
                    $.getJSON('https://v1.hitokoto.cn',function(result){
                        if (!empty(result.from)) {
                            var text = waifu_tips.hitokoto_api_message['hitokoto.cn'][0];
                            text = text.render({source: result.from, creator: result.creator});
                            window.setTimeout(function(){showMessage(text, 3000, true);}, 5000);
                        }
                        showMessage(result.hitokoto, 5000, true);
                    });
            }
        }
        $('.waifu-tool .fui-eye').click(()=>{loadOtherModel()});
        $('.waifu-tool .fui-user').click(()=>{loadRandTextures()});
        $('.waifu-tool .fui-chat').click(()=>{showHitokoto()});
    }
    }
}

</script>
<style scoped>
@import url('../assets/build-tools/bootstrap/icons/bootstrap-icons.css');

.waifu {
    position: fixed;
    bottom: 0;
    z-index: 1;
    font-size: 0;
    -webkit-transform: translateY(3px);
    transform: translateY(3px);
}
.waifu:hover {
    -webkit-transform: translateY(0);
    transform: translateY(0);
}
.waifu-tips {
    opacity: 0;
    margin: -20px 20px;
    padding: 5px 10px;
    border: 1px solid rgba(224, 186, 140, 0.62);
    border-radius: 12px;
    background-color: rgba(236, 217, 188, 0.5);
    box-shadow: 0 3px 15px 2px rgba(191, 158, 118, 0.2);
    text-overflow: ellipsis;
    overflow: hidden;
    position: absolute;
    animation-delay: 5s;
    animation-duration: 50s;
    animation-iteration-count: infinite;
    animation-name: shake;
    animation-timing-function: ease-in-out;
}
.waifu-tool {
    display: none;
    color: #aaa;
    top: 50px;
    right: 10px;
    position: absolute;
}
.waifu:hover .waifu-tool {
    display: block;
}
.waifu-tool span {
    display: block;
    cursor: pointer;
    color: #5b6c7d;
    transition: 0.2s;
}
.waifu-tool span:hover {
    color: #34495e;
}
.waifu #live2d{
    position: relative;
}

@keyframes shake {
    2% {
        transform: translate(0.5px, -1.5px) rotate(-0.5deg);
    }

    4% {
        transform: translate(0.5px, 1.5px) rotate(1.5deg);
    }

    6% {
        transform: translate(1.5px, 1.5px) rotate(1.5deg);
    }

    8% {
        transform: translate(2.5px, 1.5px) rotate(0.5deg);
    }

    10% {
        transform: translate(0.5px, 2.5px) rotate(0.5deg);
    }

    12% {
        transform: translate(1.5px, 1.5px) rotate(0.5deg);
    }

    14% {
        transform: translate(0.5px, 0.5px) rotate(0.5deg);
    }

    16% {
        transform: translate(-1.5px, -0.5px) rotate(1.5deg);
    }

    18% {
        transform: translate(0.5px, 0.5px) rotate(1.5deg);
    }

    20% {
        transform: translate(2.5px, 2.5px) rotate(1.5deg);
    }

    22% {
        transform: translate(0.5px, -1.5px) rotate(1.5deg);
    }

    24% {
        transform: translate(-1.5px, 1.5px) rotate(-0.5deg);
    }

    26% {
        transform: translate(1.5px, 0.5px) rotate(1.5deg);
    }

    28% {
        transform: translate(-0.5px, -0.5px) rotate(-0.5deg);
    }

    30% {
        transform: translate(1.5px, -0.5px) rotate(-0.5deg);
    }

    32% {
        transform: translate(2.5px, -1.5px) rotate(1.5deg);
    }

    34% {
        transform: translate(2.5px, 2.5px) rotate(-0.5deg);
    }

    36% {
        transform: translate(0.5px, -1.5px) rotate(0.5deg);
    }

    38% {
        transform: translate(2.5px, -0.5px) rotate(-0.5deg);
    }

    40% {
        transform: translate(-0.5px, 2.5px) rotate(0.5deg);
    }

    42% {
        transform: translate(-1.5px, 2.5px) rotate(0.5deg);
    }

    44% {
        transform: translate(-1.5px, 1.5px) rotate(0.5deg);
    }

    46% {
        transform: translate(1.5px, -0.5px) rotate(-0.5deg);
    }

    48% {
        transform: translate(2.5px, -0.5px) rotate(0.5deg);
    }

    50% {
        transform: translate(-1.5px, 1.5px) rotate(0.5deg);
    }

    52% {
        transform: translate(-0.5px, 1.5px) rotate(0.5deg);
    }

    54% {
        transform: translate(-1.5px, 1.5px) rotate(0.5deg);
    }

    56% {
        transform: translate(0.5px, 2.5px) rotate(1.5deg);
    }

    58% {
        transform: translate(2.5px, 2.5px) rotate(0.5deg);
    }

    60% {
        transform: translate(2.5px, -1.5px) rotate(1.5deg);
    }

    62% {
        transform: translate(-1.5px, 0.5px) rotate(1.5deg);
    }

    64% {
        transform: translate(-1.5px, 1.5px) rotate(1.5deg);
    }

    66% {
        transform: translate(0.5px, 2.5px) rotate(1.5deg);
    }

    68% {
        transform: translate(2.5px, -1.5px) rotate(1.5deg);
    }

    70% {
        transform: translate(2.5px, 2.5px) rotate(0.5deg);
    }

    72% {
        transform: translate(-0.5px, -1.5px) rotate(1.5deg);
    }

    74% {
        transform: translate(-1.5px, 2.5px) rotate(1.5deg);
    }

    76% {
        transform: translate(-1.5px, 2.5px) rotate(1.5deg);
    }

    78% {
        transform: translate(-1.5px, 2.5px) rotate(0.5deg);
    }

    80% {
        transform: translate(-1.5px, 0.5px) rotate(-0.5deg);
    }

    82% {
        transform: translate(-1.5px, 0.5px) rotate(-0.5deg);
    }

    84% {
        transform: translate(-0.5px, 0.5px) rotate(1.5deg);
    }

    86% {
        transform: translate(2.5px, 1.5px) rotate(0.5deg);
    }

    88% {
        transform: translate(-1.5px, 0.5px) rotate(1.5deg);
    }

    90% {
        transform: translate(-1.5px, -0.5px) rotate(-0.5deg);
    }

    92% {
        transform: translate(-1.5px, -1.5px) rotate(1.5deg);
    }

    94% {
        transform: translate(0.5px, 0.5px) rotate(-0.5deg);
    }

    96% {
        transform: translate(2.5px, -0.5px) rotate(-0.5deg);
    }

    98% {
        transform: translate(-1.5px, -1.5px) rotate(-0.5deg);
    }

    0%, 100% {
        transform: translate(0, 0) rotate(0);
    }
}
@font-face {
  font-family: 'Flat-UI-Icons';
  src: url('/Vianimate18/public/flat-ui-icons-regular.eot');
  src: url('/Vianimate18/public/flat-ui-icons-regular.eot?#iefix') format('embedded-opentype'), url('/Vianimate18/public/flat-ui-icons-regular.woff') format('woff'), url('/Vianimate18/public/flat-ui-icons-regular.ttf') format('truetype'), url('/Vianimate18/public/flat-ui-icons-regular.svg#flat-ui-icons-regular') format('svg');
}
[class^="fui-"],
[class*="fui-"] {
  font-family: 'Flat-UI-Icons';
  speak-as: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.fui-cross:before {
  content: "\e609";
}
.fui-info-circle:before {
  content: "\e60f";
}
.fui-photo:before {
  content: "\e62a";
}
.fui-eye:before {
  content: "\e62c";
}
.fui-chat:before {
  content: "\e62d";
}
.fui-home:before {
  content: "\e62e";
}
.fui-user:before {
  content: "\e631";
}
</style>