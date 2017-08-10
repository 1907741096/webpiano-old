<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--	又看源代码
                       ::
                      :;J7, :,                        ::;7:
                      ,ivYi, ,                       ;LLLFS:
                      :iv7Yi                       :7ri;j5PL
                     ,:ivYLvr                    ,ivrrirrY2X,
                     :;r@Wwz.7r:                :ivu@kexianli.
                    :iL7::,:::iiirii:ii;::::,,irvF7rvvLujL7ur
                   ri::,:,::i:iiiiiii:i:irrv177JX7rYXqZEkvv17
                ;i:, , ::::iirrririi:i:::iiir2XXvii;L8OGJr71i
              :,, ,,:   ,::ir@mingyi.irii:i:::j1jri7ZBOS7ivv,
                 ,::,    ::rv77iiiriii:iii:i::,rvLq@huhao.Li
             ,,      ,, ,:ir7ir::,:::i;ir:::i:i::rSGGYri712:
           :::  ,v7r:: ::rrv77:, ,, ,:i7rrii:::::, ir7ri7Lri
          ,     2OBBOi,iiir;r::        ,irriiii::,, ,iv7Luur:
        ,,     i78MBBi,:,:::,:,  :7FSL: ,iriii:::i::,,:rLqXv::
        :      iuMMP: :,:::,:ii;2GY7OBB0viiii:i:iii:i:::iJqL;::
       ,     ::::i   ,,,,, ::LuBBu BBBBBErii:i:i:i:i:i:i:r77ii
      ,       :       , ,,:::rruBZ1MBBqi, :,,,:::,::::::iiriri:
     ,               ,,,,::::i:  @arqiao.       ,:,, ,:::ii;i7:
    :,       rjujLYLi   ,,:::::,:::::::::,,   ,:i,:,,,,,::i:iii
    ::      BBBBBBBBB0,    ,,::: , ,:::::: ,      ,,,, ,,:::::::
    i,  ,  ,8BMMBBBBBBi     ,,:,,     ,,, , ,   , , , :,::ii::i::
    :      iZMOMOMBBM2::::::::::,,,,     ,,,,,,:,,,::::i:irr:i:::,
    i   ,,:;u0MBMOG1L:::i::::::  ,,,::,   ,,, ::::::i:i:iirii:i:i:
    :    ,iuUuuXUkFu7i:iii:i:::, :,:,: ::::::::i:i:::::iirr7iiri::
    :     :rk@Yizero.i:::::, ,:ii:::::::i:::::i::,::::iirrriiiri::,
     :      5BMBBBBBBSr:,::rv2kuii:::iii::,:i:,, , ,,:,:i@petermu.,
          , :r50EZ8MBBBBGOBBBZP7::::i::,:::::,: :,:,::i;rrririiii::
              :jujYY7LS0ujJL7r::,::i::,::::::::::::::iirirrrrrrr:ii:
           ,:  :@kevensun.:,:,,,::::i:i:::::,,::::::iir;ii;7v77;ii;i,
           ,,,     ,,:,::::::i:iiiii:i::::,, ::::iiiir@xingjief.r;7:i,
        , , ,,,:,,::::::::iiiiiiiiii:,:,:::::::::iiir;ri7vL77rrirri::
         :,, , ::::::::i:::i:::i:i::,,,,,:,::i:i:::iir;@Secbone.ii:::
		 
-->
<html>
<head>
	<title>WebPiano</title>
  <link rel="icon" href="/WebPiano/Public/image/icon/piano.png" type="image/jpg" sizes="16*16">
	<link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/style.css">
  <link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/page.css">
  <link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/music.css">
	<link id="colorstyle" rel="stylesheet" type="text/css" href="/WebPiano/Public/css/<?php echo ($color); ?>.css">
	<script src="/WebPiano/Public/js/jquery.js"></script>
	<script src="/WebPiano/Public/js/layer/layer.js"></script>
	<script type="text/javascript" src="/WebPiano/Public/js/dialog.js"></script>
</head>

<body>
	<div class="background"></div>
<header>
	<div class="top">
		<a class="logo" href="/WebPiano">WebPiano</a>
		<a href="/WebPiano/index.php?c=news" class="top-left">论坛</a>
		<a href="/WebPiano/index.php?c=opern" class="top-left">曲谱站</a>
		<a href="/WebPiano/index.php?c=info" class="top-left">个人中心</a>
		<div class="top-login">
			<img>
			<?php if($isuser == 1): ?><a href="index.php?c=login&a=loginout">LoginOut</a>
			<?php else: ?>
				<a onclick="login()">Login</a>
				<!--/ <a onclick="reg()">Register</a>--><?php endif; ?>
		</div>
	</div>
	<script type="text/javascript">
		function login(){
			layer.open({
				type: 2,
				area: ['400px', '620px'],
				fixed: false, //不固定
				maxmin: true,
				content: '/WebPiano/index.php?c=login'
			});
		}
		function reg(){
			layer.open({
				type: 2,
				area: ['400px', '620px'],
				fixed: false, //不固定
				maxmin: true,
				content: '/WebPiano/index.php?c=login&a=reg'
			});
		}
	</script>
</header>
	<section>
		<div class="keys">
<div class="keys1">
	<div class="key1">
		<div class="key2">Esc</div>
		<div class="key2" style="margin-left: 60px;">F1</div>
		<div class="key2">F2</div>
		<div class="key2">F3</div>
		<div class="key2">F4</div>
		<div class="key2" style="margin-left: 30px;">F5</div>
		<div class="key2">F6</div>
		<div class="key2">F7</div>
		<div class="key2">F8</div>
		<div class="key2" style="margin-left: 30px;">F9</div>
		<div class="key2">F10</div>
		<div class="key2">F11</div>
		<div class="key2">F12</div>
		<div class="key2" style="margin-left: 30px;">PS</div>
		<div class="key4" id="kb145">7··</div>
		<div class="key4" id="kb19">7·</div>
	</div>
	<div class="key1" style="margin-top: 16px;">
		<div class="key2">~</div>
		<div class="key3" id="kb49">1·</div>
		<div class="key3" id="kb50">2·</div>
		<div class="key3" id="kb51">3·</div>
		<div class="key3" id="kb52">4·</div>
		<div class="key3" id="kb53">5·</div>
		<div class="key3" id="kb54">6·</div>
		<div class="key3" id="kb55">7·</div>
		<div class="key3" id="kb56">1··</div>
		<div class="key3" id="kb57">2··</div>
		<div class="key3" id="kb48">3··</div>
		<div class="key3" id="kb189">4··</div>
		<div class="key3" id="kb187">5··</div>
		<div class="key2" style="width: 97px;margin-left: 3px;">Backspace</div>
		<div class="key4" style="margin-left: 30px;" id="kb45">4··</div>
		<div class="key4" id="kb36">5··</div>
		<div class="key4" id="kb33">6··</div>
		<div class="key2" style="margin-left: 30px;">Num</div>
		<div class="key4" id="kb111">4·</div>
		<div class="key4" id="kb106">5·</div>
	</div>
	<div class="key1" style="margin-top: 8px;">
		<div class="key2" style="width: 75px;">Tab</div>
		<div class="key3" id="kb81">1</div>
		<div class="key3" id="kb87">2</div>
		<div class="key3" id="kb69">3</div>
		<div class="key3" id="kb82">4</div>
		<div class="key3" id="kb84">5</div>
		<div class="key3" id="kb89">6</div>
		<div class="key3" id="kb85">7</div>
		<div class="key3" id="kb73">1·</div>
		<div class="key3" id="kb79">2·</div>
		<div class="key3" id="kb80">3·</div>
		<div class="key3" id="kb219">4·</div>
		<div class="key3" id="kb221">5·</div>
		<div class="key3" style="width:72px;margin-left: 3px;" id="kb220">6·</div>
		<div class="key4" style="margin-left: 30px;" id="kb46">1··</div>
		<div class="key4" id="kb35">2··</div>
		<div class="key4" id="kb34">3··</div>
		<div class="key4" style="margin-left: 30px;" id="kb103">7</div>
		<div class="key4" id="kb104">1·</div>
		<div class="key4" id="kb105">2·</div>
	</div>
	<div class="key1" style="margin-top: 8px;">
		<div class="key2" style="width: 96px;">Caps</div>
		<div class="key3" id="kb65">·1</div>
		<div class="key3" id="kb83">·2</div>
		<div class="key3" id="kb68">·3</div>
		<div class="key3" id="kb70">·4</div>
		<div class="key3" id="kb71">·5</div>
		<div class="key3" id="kb72">·6</div>
		<div class="key3" id="kb74">·7</div>
		<div class="key3" id="kb75">1</div>
		<div class="key3" id="kb76">2</div>
		<div class="key3" id="kb186">3</div>
		<div class="key3" id="kb222">4</div>
		<div class="key2" style="width:106px;margin-left: 3px;">Enter</div>
		<div class="key4" style="margin-left: 221px;" id="kb100">4</div>
		<div class="key4" id="kb101">5</div>
		<div class="key4" id="kb102">6</div>
	</div>
	<div class="key1" style="margin-top: 8px;">
		<div class="key2" style="width: 126px;">Shift</div>
		<div class="key3" id="kb90">··1</div>
		<div class="key3" id="kb88">··2</div>
		<div class="key3" id="kb67">··3</div>
		<div class="key3" id="kb86">··4</div>
		<div class="key3" id="kb66">··5</div>
		<div class="key3" id="kb78">··6</div>
		<div class="key3" id="kb77">··7</div>
		<div class="key3" id="kb188">·1</div>
		<div class="key3" id="kb190">·2</div>
		<div class="key3" id="kb191">·3</div>
		<div class="key2" style="width:131px;margin-left: 3px;">Shift</div>
		<div class="key4" style="margin-left: 85px;" id="kb38">·4</div>
		<div class="key4" style="margin-left: 84px;" id="kb97">1</div>
		<div class="key4" id="kb98">2</div>
		<div class="key4" id="kb99">3</div>
	</div>
	<div class="key1" style="margin-top: 8px;">
		<div class="key2" style="width: 72px;">Ctrl</div>
		<div class="key2">Win</div>
		<div class="key2">Alt</div>
		<div class="key2" style="width: 440px;">Space</div>
		<div class="key2">Alt</div>
		<div class="key2">APP</div>
		<div class="key2" style="width:76px;margin-left: 3px;">Ctrl</div>
		<div class="key4" style="margin-left: 30px;" id="kb37">·1</div>
		<div class="key4" id="kb40">·2</div>
		<div class="key4" id="kb39">·3</div>
		<div class="key4" style="margin-left: 30px; width: 105px;" id="kb96">·5</div>
		<div class="key4" id="kb110">·6</div>
	</div>
</div>
<div class="keys2">
	<div class="key4" style="margin-left: 0;margin-top: 66px;float: none;" id="kb109">6·</div>
	<div class="key4" style="height: 108px;line-height: 108px; margin-left: 0;margin-top: 6px; float: none;" id="kb107">3·</div>
	<div class="key4" style="height: 108px;line-height: 108px; margin-left: 0;margin-top: 6px; float: none;" id="kb13">·7</div>
</div>
</div>

		<div class="piano">
			<div class="key">
				<div class="whitekey" id="key1"></div>
					<div class="blackkey" id="key2"></div>
				<div class="whitekey" id="key3"></div>
				<div class="whitekey" id="key4"></div>
					<div class="blackkey" id="key5"></div>
				<div class="whitekey" id="key6"></div>
					<div class="blackkey" id="key7"></div>
				<div class="whitekey" id="key8"></div>
				<div class="whitekey" id="key9"></div>
					<div class="blackkey" id="key10"></div>
				<div class="whitekey" id="key11"></div>
					<div class="blackkey" id="key12"></div>
				<div class="whitekey" id="key13"></div>
					<div class="blackkey" id="key14"></div>
				<div class="whitekey" id="key15"></div>
				<div class="whitekey" id="key16"></div>
					<div class="blackkey" id="key17"></div>
				<div class="whitekey" id="key18"></div>
					<div class="blackkey" id="key19"></div>
				<div class="whitekey" id="key20"></div>
				<div class="whitekey" id="key21"></div>
					<div class="blackkey" id="key22"></div>
				<div class="whitekey" id="key23"></div>
					<div class="blackkey" id="key24"></div>
				<div class="whitekey" id="key25"></div>
					<div class="blackkey" id="key26"></div>
				<div class="whitekey" id="key27"></div>
				<div class="whitekey" id="key28"></div>
					<div class="blackkey" id="key29"></div>
				<div class="whitekey" id="key30"></div>
					<div class="blackkey" id="key31"></div>
				<div class="whitekey" id="key32"></div>
				<div class="whitekey" id="key33"></div>
					<div class="blackkey" id="key34"></div>
				<div class="whitekey" id="key35"></div>
					<div class="blackkey" id="key36"></div>
				<div class="whitekey" id="key37"></div>
					<div class="blackkey" id="key38"></div>
				<div class="whitekey" id="key39"></div>
				<div class="whitekey" id="key40"></div>
					<div class="blackkey" id="key41"></div>
				<div class="whitekey" id="key42"></div>
					<div class="blackkey" id="key43"></div>
				<div class="whitekey" id="key44"></div>
				<div class="whitekey" id="key45"></div>
					<div class="blackkey" id="key46"></div>
				<div class="whitekey" id="key47"></div>
					<div class="blackkey" id="key48"></div>
				<div class="whitekey" id="key49"></div>
					<div class="blackkey" id="key50"></div>
				<div class="whitekey" id="key51"></div>
				<div class="whitekey" id="key52"></div>
					<div class="blackkey" id="key53"></div>
				<div class="whitekey" id="key54"></div>
					<div class="blackkey" id="key55"></div>
				<div class="whitekey" id="key56"></div>
				<div class="whitekey" id="key57"></div>
					<div class="blackkey" id="key58"></div>
				<div class="whitekey" id="key59"></div>
					<div class="blackkey" id="key60"></div>
				<div class="whitekey" id="key61"></div>
					<div class="blackkey" id="key62"></div>
				<div class="whitekey" id="key63"></div>
				<div class="whitekey" id="key64"></div>
					<div class="blackkey" id="key65"></div>
				<div class="whitekey" id="key66"></div>
					<div class="blackkey" id="key67"></div>
				<div class="whitekey" id="key68"></div>
				<div class="whitekey" id="key69"></div>
					<div class="blackkey" id="key70"></div>
				<div class="whitekey" id="key71"></div>
					<div class="blackkey" id="key72"></div>
				<div class="whitekey" id="key73"></div>
					<div class="blackkey" id="key74"></div>
				<div class="whitekey" id="key75"></div>
				<div class="whitekey" id="key76"></div>
					<div class="blackkey" id="key77"></div>
				<div class="whitekey" id="key78"></div>
					<div class="blackkey" id="key79"></div>
				<div class="whitekey" id="key80"></div>
				<div class="whitekey" id="key81"></div>
					<div class="blackkey" id="key82"></div>
				<div class="whitekey" id="key83"></div>
					<div class="blackkey" id="key84"></div>
				<div class="whitekey" id="key85"></div>
					<div class="blackkey" id="key86"></div>
				<div class="whitekey" id="key87"></div>
				<div class="whitekey" id="key88"></div>
			</div>
		</div>
	</section>
	<div class="index_opern">
	<div class="index_opern_left">
		<?php if($isopern == 1): ?><div class="oleft">
                <?php if(is_array($collects)): $i = 0; $__LIST__ = $collects;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$collect): $mod = ($i % 2 );++$i;?><img src="<?php echo ($collect["thumb"]); ?>" width="100%" id="opern_l" attr-thumb="<?php echo ($collect["thumb"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="oright" id="show">
                <div class="marquee" onclick="marquee()">自动滚动</div>
                <img src="<?php echo ($collects[0]['thumb']); ?>" width="755px" style="border:4px solid #333;" id="opern_b">
            </div>
			
		<?php else: ?>
			<div class="ts">快去挑选喜欢的曲谱吧！</div>
			<img src="/WebPiano/Public/image/leimu.jpg" height="360"><?php endif; ?>
	</div>
	<div class="index_opern_right">
		<button onclick="funStart(this);" id="btnStart" disabled>录制</button>
	    <button onclick="funStop(this);" id="btnStop" disabled>停止</button>
	    <button onclick="funUpload(this);" id="btnUpload" disabled>上传</button>
	    <h4>录制信息：</h4>
	    <div id="recordingslist"></div>
	</div>
<script src="/WebPiano/Public/js/mp3/recordmp3.js"></script>
<script type="text/javascript" src="/WebPiano/Public/js/common.js?1234"></script>
<script>
    /**startmarquee(一次滚动高度,速度,停留时间);**/　
    function marquee(){
        startmarquee(10, 120, 0);  
    }
    function startmarquee(lh, speed, delay) {  
        var t;  
        var oHeight = 360;  
        var p = false;  
        var o = document.getElementById("show");  
        var preTop = 0;  
        o.scrollTop = 0;  
        function start() {  
            t = setInterval(scrolling, speed);  
            o.scrollTop += 1;  
        }  
        function scrolling() {  
            if (o.scrollTop % lh != 0  
                    && o.scrollTop % (o.scrollHeight - oHeight - 1) != 0) {  
                preTop = o.scrollTop;  
                o.scrollTop += 1;  
                if (preTop >= o.scrollHeight || preTop == o.scrollTop) {  
                     clearInterval(t);  
                }  
            } else {  
                clearInterval(t);  
                setTimeout(start, delay);  
            }  
        }  
        setTimeout(start, delay);  
    }

    var recorder = new MP3Recorder({
        debug:true,
        funOk: function () {
            btnStart.disabled = false;
            log('加载成功，可以开始录制');
        },
        funCancel: function (msg) {
            log(msg);
            recorder = null;
        }
    });
    var mp3Blob;


    function funStart(button) {
        btnStart.disabled = true;
        btnStop.disabled = false;
        btnUpload.disabled = true;
        log('录音开始...');
        recorder.start();
    }

    function funStop(button) {
        recorder.stop();
        btnStart.disabled = false;
        btnStop.disabled = true;
        btnUpload.disabled = false;
        log('录音结束，MP3导出中...');
        recorder.getMp3Blob(function (blob) {
            log('MP3导出成功');

            mp3Blob = blob;
            var url = URL.createObjectURL(mp3Blob);
            var div = document.createElement('div');
            var au = document.createElement('audio');
            var hf = document.createElement('a');

            au.controls = true;
            au.src = url;
            hf.href = url;
            hf.download = new Date().toISOString() + '.mp3';
            hf.innerHTML = hf.download;
            div.appendChild(au);
            div.appendChild(hf);
            recordingslist.appendChild(div);
        });
    }

    function log(str) {
        recordingslist.innerHTML += str + '<br/>';
    }

    function funUpload() {
        var fd = new FormData();
        var mp3Name = encodeURIComponent('audio_recording_' + new Date().getTime() + '.mp3');
        fd.append('mp3Name', mp3Name);
        fd.append('file', mp3Blob);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                recordingslist.innerHTML += '上传成功';//：<a href="' + xhr.responseText + '" target="_blank">' + mp3Name + '</a>';
            }
        };
    
        xhr.open('POST', '/WebPiano/Public/js/upload.ashx');
        xhr.send(fd);
    }
</script>
</div>
	<div id="changestyle">
		<div id="style">style</div>
		<?php if(is_array($styles)): $i = 0; $__LIST__ = $styles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$style): $mod = ($i % 2 );++$i;?><li id="color<?php echo ($style['style_id']); ?>"><?php echo ($style['name']); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<script src="/WebPiano/Public/js/piano.js"></script>
</body>