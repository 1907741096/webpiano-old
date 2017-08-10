	
	var style=['color1','color2','color3'];
	var stylecss=document.getElementById('colorstyle');

	var webPiano = {};

	var keys=new Array();
	for(var j=0;j<89;j++){
		keys[j]=new Array();
	}

	var kbs=new Array();
	for(var j=0;j<300;j++){
		kbs[j]=new Array();
	}
	var num=[13,19,33,34,35,36,37,38,39,40,45,46,96,97,98,99,100,101,102,103,104,105,106,107,109,110,111,145];
	var kbsId=[13,19,33,34,35,36,37,38,39,40,45,46,48,49,50,51,52,53,54,55,56,57,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,96,97,98,99,100,101,102,103,104,105,106,107,109,110,111,145,186,187,188,189,190,191,219,220,221,222];
	
	webPiano.start = 1;
	webPiano.end = 88;
	webPiano.position = [0,14,24,48,62,72,86,96,120,134,144,158,168,182,192,216,230,240,254,264,288,302,312,326,336,350,360,384,398,408,422,432,456,470,480,494,504,518,528,552,566,576,590,600,624,638,648,662,672,686,696,720,734,744,758,768,792,806,816,830,840,854,864,888,902,912,926,936,960,974,984,998,1008,1022,1032,1056,1070,1080,1094,1104,1128,1142,1152,1166,1176,1190,1200,1224];

	window.onload = function(){
		var i;
			
		webPiano.sound = webPiano.mp3Sound;//准备声音文件
		
		if(document.addEventListener){
		for(i = 0; i<style.length; i++){
			setstyleEventListener(i);
		}
		}else if(document.attachEvent){
			for(i = 0; i<style.length; i++){
				setstyleAttachEvent(i);
			}
		}

		var stylebutton=document.getElementById("style");
		if(document.addEventListener){
			stylebutton.addEventListener('click', move, false);
		}else if(document.attachEvent){
			stylebutton.attachEvent('click', move);
		}
		
		if(document.addEventListener){//设定钢琴键的事件
			for(i = webPiano.start; i<=webPiano.end; i++){
				setKeyEventListener(i);
			}
		}else if(document.attachEvent){
			for(i = webPiano.start; i<=webPiano.end; i++){
				setKeyAttachEvent(i);
			}
		}
		if(document.addEventListener){//设定软键盘的事件
			for(i = 0; i<kbsId.length; i++){
				setKbEventListener(kbsId[i]);
			}
		}else if(document.attachEvent){
			for(i = 0; i<kbsId.length; i++){
				setKbAttachEvent(kbsId[i]);
			}
		}
	}

	var movebool=true;
	function move(){
		var div=document.getElementById("changestyle");
		var timer=null;
		var v=10;
		if(movebool){
			a=-100;
			clearInterval(timer);
			timer=setInterval(function(){
				if(a==0){
					clearInterval(timer);
				}else{
					a+=10;
					div.style.right=a+'px';
				}
			},10)
			movebool=false;
		}else{
			a=0;
			clearInterval(timer);
			timer=setInterval(function(){
				if(a==-100){
					clearInterval(timer);
				}else{
					a-=10;
					div.style.right=a+'px';
				}
			},10)
			movebool=true;
		}
	}

	function setstyleEventListener(i){
		var styleId = style[i];
		var styleColor = document.getElementById(styleId);
		if(styleColor){
			styleColor.addEventListener('click', changestyle, false);
		}
	}
	
	function setstyleAttachEvent(i){
		var styleId = style[i];
		var styleColor = document.getElementById(styleId);
		if(styleColor){
			styleColor.attachEvent('click', changestyle);
		}
	}
	function changestyle(){
		var that = this;
		var id = that.id.replace('color','');
		if(isNaN(id)){
			dialog.error('id不合法');
			return;
		}
		data={'id':id};
		$.post('index.php?c=style&a=changestyle',data,function(result){
			if(result.status===1){
				stylecss.setAttribute("href","/WebPiano/Public/css/"+result.data['name']+".css");
			}else{
				dialog.error(result.message);
			}
		},"JSON");
	}

	//设定软键盘的点击事件(EventListener版)
	function setKbEventListener(keyCode){
		var kbId = 'kb' + keyCode;
		var kb = document.getElementById(kbId);
		if(kb){
			kb.addEventListener('mousedown', kbClickDown, false);
			kb.addEventListener('mouseup',kbClickUp,false);
			kb.addEventListener('mouseout',kbClickOut,false);
		}
	}
	
	//设定软键盘的点击事件(AttachEvent版)
	function setKbAttachEvent(keyCode){
		var kbId = 'kb' + keyCode;
		var kb = document.getElementById(kbId);
		if(kb){
			kb.attachEvent('mousedown', kbClickDown);
			kb.attachEvent('mouseup',kbClickUp);
			kb.attachEvent('mouseout',kbClickOut);
		}
	}


	//鼠标按下软键盘时
	function kbClickDown(){
		var that = this;
		var keyCode = that.id.replace('kb','');
		kbsdown(keyCode);
	}
	//鼠标松开软键盘时
	function kbClickUp(){
		var that = this;
		var keyCode = that.id.replace('kb','');
		kbsup(keyCode);

	}
	//鼠标离开软键盘时
	function kbClickOut(){
		var that = this;
		var keyCode = that.id.replace('kb','');
		kbsup(keyCode);
	}

	function kbsup(keyCode){
		keyCode=parseInt(keyCode);
		kbup(keyCode);
		switch(keyCode){
			case 90: 	//z
				setOriginColor(16,keys[16]['color']);
				break;
			case 88: 	//x
				setOriginColor(18,keys[18]['color']);
				break;
			case 67: 	//c
				setOriginColor(20,keys[20]['color']);
				break;
			case 86: 	//v
				setOriginColor(21,keys[21]['color']);
				break;
			case 66: 	//b
				setOriginColor(23,keys[23]['color']);
				break;
			case 78: 	//n
				setOriginColor(25,keys[25]['color']);
				break;
			case 77: 	//m
				setOriginColor(27,keys[27]['color']);
				break;
			case 37: 	//left
			case 65: 	//a
			case 188: 	//,
				setOriginColor(28,keys[28]['color']);
				break;
			case 40: 	//down
			case 83: 	//s
			case 190: 	//.
				setOriginColor(30,keys[30]['color']);
				break;
			case 39: 	//right
			case 68: 	//d
			case 191: 	//?
				setOriginColor(32,keys[32]['color']);
				break;
			case 38: 	//up
			case 70: 	//f
				setOriginColor(33,keys[33]['color']);
				break;
			case 96: 	//0
			case 71: 	//g
				setOriginColor(35,keys[35]['color']);
				break;
			case 110: 	//Del
			case 72: 	//h
				setOriginColor(37,keys[37]['color']);
				break;
			case 13: 	//Em
			case 74: 	//j
				setOriginColor(39,keys[39]['color']);
				break;
			case 75: 	//k
			case 81: 	//q
			case 97: 	//1
				setOriginColor(40,keys[40]['color']);
				break;
			case 76: 	//l
			case 87: 	//w
			case 98: 	//2
				setOriginColor(42,keys[42]['color']);
				break;
			case 186: 	//;
			case 69: 	//e
			case 99: 	//3
				setOriginColor(44,keys[44]['color']);
				break;
			case 222: 	//'
			case 82: 	//r
			case 100: 	//4
				setOriginColor(45,keys[45]['color']);
				break;
			case 84: 	//t
			case 101: 	//5
				setOriginColor(47,keys[47]['color']);
				break;
			case 89: 	//y
			case 102: 	//6
				setOriginColor(49,keys[49]['color']);
				break;
			case 85: 	//u
			case 103: 	//7
				setOriginColor(51,keys[51]['color']);
				break;
			case 49: 	//1
			case 73: 	//i
			case 104: 	//8
				setOriginColor(52,keys[52]['color']);
				break;
			case 50: 	//2
			case 79: 	//o
			case 105: 	//9
				setOriginColor(54,keys[54]['color']);
				break;
			case 51: 	//3
			case 80: 	//p
			case 107: 	//+
				setOriginColor(56,keys[56]['color']);
				break;
			case 52: 	//4
			case 219: 	//[
			case 111: 	///
				setOriginColor(57,keys[57]['color']);
				break;
			case 53: 	//5
			case 221: 	//]
			case 106: 	//*
				setOriginColor(59,keys[59]['color']);
				break;
			case 54: 	//6
			case 220: 	//\
			case 109: 	//-
				setOriginColor(61,keys[61]['color']);
				break;
			case 55: 	//7
			case 19: 	//PB
				setOriginColor(63,keys[63]['color']);
				break;
			case 56: 	//8
			case 46: 	//Del
				setOriginColor(64,keys[64]['color']);
				break;
			case 57: 	//9
			case 35: 	//End
				setOriginColor(66,keys[66]['color']);
				break;
			case 48: 	//0
			case 34: 	//PD
				setOriginColor(68,keys[68]['color']);
				break;
			case 189: 	//-
			case 45: 	//Ins
				setOriginColor(69,keys[69]['color']);
				break;
			case 187: 	//+
			case 36: 	//Hm
				setOriginColor(71,keys[71]['color']);
				break;
			case 8: 	//Back
			case 33: 	//PU
				setOriginColor(73,keys[73]['color']);
				break;
			case 145: 	//SL
				setOriginColor(75,keys[75]['color']);
				break;
			default:
				break;
		}
	}

	//指定发出的声音	
	function kbsdown(keyCode){
		keyCode=parseInt(keyCode);
		kbdown(keyCode);
		switch(keyCode){
			case 90: 	//z
				playSound(16,keyCode);break;
			case 88: 	//x
				playSound(18,keyCode);break;
			case 67: 	//c
				playSound(20,keyCode);break;
			case 86: 	//v
				playSound(21,keyCode);break;
			case 66: 	//b
				playSound(23,keyCode);break;
			case 78: 	//n
				playSound(25,keyCode);break;
			case 77: 	//m
				playSound(27,keyCode);break;
			case 37: 	//left
			case 65: 	//a
			case 188: 	//,
				playSound(28,keyCode);break;
			case 40: 	//down
			case 83: 	//s
			case 190: 	//.
				playSound(30,keyCode);break;
			case 39: 	//right
			case 68: 	//d
			case 191: 	//?
				playSound(32,keyCode);break;
			case 38: 	//up
			case 70: 	//f
				playSound(33,keyCode);break;
			case 96: 	//0
			case 71: 	//g
				playSound(35,keyCode);break;
			case 110: 	//Del
			case 72: 	//h
				playSound(37,keyCode);break;
			case 13: 	//Em
			case 74: 	//j
				playSound(39,keyCode);break;
			case 75: 	//k
			case 81: 	//q
			case 97: 	//1
				playSound(40,keyCode);break;
			case 76: 	//l
			case 87: 	//w
			case 98: 	//2
				playSound(42,keyCode);break;
			case 186: 	//;
			case 69: 	//e
			case 99: 	//3
				playSound(44,keyCode);break;
			case 222: 	//'
			case 82: 	//r
			case 100: 	//4
				playSound(45,keyCode);break;
			case 84: 	//t
			case 101: 	//5
				playSound(47,keyCode);break;
			case 89: 	//y
			case 102: 	//6
				playSound(49,keyCode);break;
			case 85: 	//u
			case 103: 	//7
				playSound(51,keyCode);break;
			case 49: 	//1
			case 73:	//i
			case 104: 	//8
				playSound(52,keyCode);break;
			case 50: 	//2
			case 79: 	//o
			case 105: 	//9
				playSound(54,keyCode);break;
			case 51: 	//3
			case 80: 	//p
			case 107: 	//+
				playSound(56,keyCode);break;
			case 52: 	//4
			case 219: 	//[
			case 111: 	///
				playSound(57,keyCode);break;
			case 53: 	//5
			case 221: 	//]
			case 106: 	//*
				playSound(59,keyCode);break;
			case 54: 	//6
			case 220: 	//\
			case 109: 	//-
				playSound(61,keyCode);break;
			case 55: 	//7
			case 19: 	//PB
				playSound(63,keyCode);break;
			case 56: 	//8
			case 46: 	//Del
				playSound(64,keyCode);break;
			case 57: 	//9
			case 35: 	//End
				playSound(66,keyCode);break;
			case 48: 	//0
			case 34: 	//PD
				playSound(68,keyCode);break;
			case 189: 	//-
			case 45: 	//Ins
				playSound(69,keyCode);break;
			case 187: 	//+
			case 36: 	//Hm
				playSound(71,keyCode);break;
			case 8: 	//Back
			case 33: 	//PU
				playSound(73,keyCode);break;
			case 145: 	//SL
				playSound(75,keyCode);break;
			default:
				break;
		}
	}
	
	//设定钢琴键的点击事件(EventListener版)
	function setKeyEventListener(noteNumber){
		var keyId = 'key' + noteNumber;
		var key = document.getElementById(keyId);
		if(key){
			key.style.left = getPosition(noteNumber) + 'px';
			key.addEventListener('mousedown', keyClickDown, false);
			key.addEventListener('mouseup',keyClickUp,false);
			key.addEventListener('mouseout',keyClickOut,false);
		}
	}
	
	//设定钢琴键的点击事件(AttachEvent版)
	function setKeyAttachEvent(noteNumber){
		var keyId = 'key' + noteNumber;
		var key = document.getElementById(keyId);
		if(key){
			key.style.left = getPosition(noteNumber) + 'px';
			key.attachEvent('mousedown', keyClickDown);
			key.attachEvent('mouseup',keyClickUp);
			key.attachEvent('mouseout',keyClickOut);
		}
	}
	
	//设定钢琴键位置
	function getPosition(noteNumber){
		var left = 0;
		left = webPiano.position[noteNumber-1];
		return left;
	}
	
	//鼠标按下钢琴键时
	function keyClickDown(){
		var that = this;
		var noteNumber = that.id.replace('key','');
		playSound(noteNumber,0);
	}
	//鼠标松开钢琴键时
	function keyClickUp(){
		var that = this;
		var noteNumber = that.id.replace('key','');
		setOriginColor(noteNumber,keys[noteNumber]['color']);
	}
	//鼠标离开钢琴键时
	function keyClickOut(){
		var that = this;
		var noteNumber = that.id.replace('key','');
		setOriginColor(noteNumber,keys[noteNumber]['color']);
	}
	
	//指定发出的声音	
	function playSound(noteNumber,keyCode){
		var soundId = 'sound' + noteNumber;
		var keyId = 'key' + noteNumber;
		var key = document.getElementById(keyId);
		var audio = null;

		var cssStyle = document.defaultView.getComputedStyle(key, null);
		resultBg = cssStyle.getPropertyValue('background-color'); 
		keybc=resultBg;

		if(keys[noteNumber]['key']=='down'){
			return ;
		}
		keys[noteNumber]['key']='down';

		if(webPiano.sound){
			if(webPiano.sound[soundId]){
				audio = new Audio(webPiano.sound[soundId]);
				audio.play();
			}
		}
		if(key){
			if(keyCode==0){
				key.style.backgroundColor = '#CC99CC';
			}else if(num.includes(keyCode)){
				key.style.backgroundColor = '#9999FF';
			}else{
				key.style.backgroundColor = '#9cf';
			}
			
			keys[noteNumber]['color']=keybc;																																																					
		}
	}
	
	//返回原来的钢琴键颜色
	function setOriginColor(noteNumber,keybc){
		keys[noteNumber]['key']='up';
		var keyId = 'key' + noteNumber;
		var key = document.getElementById(keyId);
		if(key){
			key.style.backgroundColor = keybc;
		}
	}

	//松开软键盘
	function kbup(codekey){
		kbs[codekey]['key']='up';
		var kbId = 'kb' + codekey;
		var kb = document.getElementById(kbId);
		if(kb){
			kb.style.backgroundColor = kbs[codekey]['color'];
		}
	}

	//松开键盘时
	document.onkeyup=function(e){
		var pressEvent = e || window.event;
		var keyCode = '';
		if(pressEvent.keyCode){
			keyCode = pressEvent.keyCode;
		}else if(pressEvent.charCode){
			keyCode = pressEvent.charCode;
		}else if(pressEvent.which){
			keyCode = pressEvent.which;
		}
		kbup(keyCode);
		switch(keyCode){
			case 90: 	//z
				setOriginColor(16,keys[16]['color']);
				break;
			case 88: 	//x
				setOriginColor(18,keys[18]['color']);
				break;
			case 67: 	//c
				setOriginColor(20,keys[20]['color']);
				break;
			case 86: 	//v
				setOriginColor(21,keys[21]['color']);
				break;
			case 66: 	//b
				setOriginColor(23,keys[23]['color']);
				break;
			case 78: 	//n
				setOriginColor(25,keys[25]['color']);
				break;
			case 77: 	//m
				setOriginColor(27,keys[27]['color']);
				break;
			case 37: 	//left
			case 65: 	//a
			case 188: 	//,
				setOriginColor(28,keys[28]['color']);
				break;
			case 40: 	//down
			case 83: 	//s
			case 190: 	//.
				setOriginColor(30,keys[30]['color']);
				break;
			case 39: 	//right
			case 68: 	//d
			case 191: 	//?
				setOriginColor(32,keys[32]['color']);
				break;
			case 38: 	//up
			case 70: 	//f
				setOriginColor(33,keys[33]['color']);
				break;
			case 96: 	//0
			case 71: 	//g
				setOriginColor(35,keys[35]['color']);
				break;
			case 110: 	//Del
			case 72: 	//h
				setOriginColor(37,keys[37]['color']);
				break;
			case 13: 	//Em
			case 74: 	//j
				setOriginColor(39,keys[39]['color']);
				break;
			case 75: 	//k
			case 81: 	//q
			case 97: 	//1
				setOriginColor(40,keys[40]['color']);
				break;
			case 76: 	//l
			case 87: 	//w
			case 98: 	//2
				setOriginColor(42,keys[42]['color']);
				break;
			case 186: 	//;
			case 69: 	//e
			case 99: 	//3
				setOriginColor(44,keys[44]['color']);
				break;
			case 222: 	//'
			case 82: 	//r
			case 100: 	//4
				setOriginColor(45,keys[45]['color']);
				break;
			case 84: 	//t
			case 101: 	//5
				setOriginColor(47,keys[47]['color']);
				break;
			case 89: 	//y
			case 102: 	//6
				setOriginColor(49,keys[49]['color']);
				break;
			case 85: 	//u
			case 103: 	//7
				setOriginColor(51,keys[51]['color']);
				break;
			case 49: 	//1
			case 73: 	//i
			case 104: 	//8
				setOriginColor(52,keys[52]['color']);
				break;
			case 50: 	//2
			case 79: 	//o
			case 105: 	//9
				setOriginColor(54,keys[54]['color']);
				break;
			case 51: 	//3
			case 80: 	//p
			case 107: 	//+
				setOriginColor(56,keys[56]['color']);
				break;
			case 52: 	//4
			case 219: 	//[
			case 111: 	///
				setOriginColor(57,keys[57]['color']);
				break;
			case 53: 	//5
			case 221: 	//]
			case 106: 	//*
				setOriginColor(59,keys[59]['color']);
				break;
			case 54: 	//6
			case 220: 	//\
			case 109: 	//-
				setOriginColor(61,keys[61]['color']);
				break;
			case 55: 	//7
			case 19: 	//PB
				setOriginColor(63,keys[63]['color']);
				break;
			case 56: 	//8
			case 46: 	//Del
				setOriginColor(64,keys[64]['color']);
				break;
			case 57: 	//9
			case 35: 	//End
				setOriginColor(66,keys[66]['color']);
				break;
			case 48: 	//0
			case 34: 	//PD
				setOriginColor(68,keys[68]['color']);
				break;
			case 189: 	//-
			case 45: 	//Ins
				setOriginColor(69,keys[69]['color']);
				break;
			case 187: 	//+
			case 36: 	//Hm
				setOriginColor(71,keys[71]['color']);
				break;
			case 8: 	//Back
			case 33: 	//PU
				setOriginColor(73,keys[73]['color']);
				break;
			case 145: 	//SL
				setOriginColor(75,keys[75]['color']);
				break;
			default:
				break;
		}

	}

	//软键盘按下
	function kbdown(keyCode){
		var kbId = 'kb' + keyCode;
		var kb = document.getElementById(kbId);

		var cssStyle = document.defaultView.getComputedStyle(kb, null);
		resultBg = cssStyle.getPropertyValue('background-color'); 
		keybc=resultBg;

		if(kbs[keyCode]['key']=='down'){
			return ;
		}

		kbs[keyCode]['key']='down';
		if(kb){
			if(keyCode==0){
				kb.style.backgroundColor = '#CC99CC';
			}else if(num.includes(keyCode)){
				kb.style.backgroundColor = '#9999FF';
			}else{
				kb.style.backgroundColor = '#9cf';
			}
			
			kbs[keyCode]['color']=keybc;																																																					
		}
	}
	
	//按下键盘时
	document.onkeydown = function(e) {
		var pressEvent = e || window.event;
		var keyCode = '';
		if(pressEvent.keyCode){
			keyCode = pressEvent.keyCode;
		}else if(pressEvent.charCode){
			keyCode = pressEvent.charCode;
		}else if(pressEvent.which){
			keyCode = pressEvent.which;
		}
		kbdown(keyCode);
		switch(keyCode){
			case 90: 	//z
				playSound(16,keyCode);break;
			case 88: 	//x
				playSound(18,keyCode);break;
			case 67: 	//c
				playSound(20,keyCode);break;
			case 86: 	//v
				playSound(21,keyCode);break;
			case 66: 	//b
				playSound(23,keyCode);break;
			case 78: 	//n
				playSound(25,keyCode);break;
			case 77: 	//m
				playSound(27,keyCode);break;
			case 37: 	//left
			case 65: 	//a
			case 188: 	//,
				playSound(28,keyCode);break;
			case 40: 	//down
			case 83: 	//s
			case 190: 	//.
				playSound(30,keyCode);break;
			case 39: 	//right
			case 68: 	//d
			case 191: 	//?
				playSound(32,keyCode);break;
			case 38: 	//up
			case 70: 	//f
				playSound(33,keyCode);break;
			case 96: 	//0
			case 71: 	//g
				playSound(35,keyCode);break;
			case 110: 	//Del
			case 72: 	//h
				playSound(37,keyCode);break;
			case 13: 	//Em
			case 74: 	//j
				playSound(39,keyCode);break;
			case 75: 	//k
			case 81: 	//q
			case 97: 	//1
				playSound(40,keyCode);break;
			case 76: 	//l
			case 87: 	//w
			case 98: 	//2
				playSound(42,keyCode);break;
			case 186: 	//;
			case 69: 	//e
			case 99: 	//3
				playSound(44,keyCode);break;
			case 222: 	//'
			case 82: 	//r
			case 100: 	//4
				playSound(45,keyCode);break;
			case 84: 	//t
			case 101: 	//5
				playSound(47,keyCode);break;
			case 89: 	//y
			case 102: 	//6
				playSound(49,keyCode);break;
			case 85: 	//u
			case 103: 	//7
				playSound(51,keyCode);break;
			case 49: 	//1
			case 73: 	//i
			case 104: 	//8
				playSound(52,keyCode);break;
			case 50: 	//2
			case 79: 	//o
			case 105: 	//9
				playSound(54,keyCode);break;
			case 51: 	//3
			case 80: 	//p
			case 107: 	//+
				playSound(56,keyCode);break;
			case 52: 	//4
			case 219: 	//[
			case 111: 	///
				playSound(57,keyCode);break;
			case 53: 	//5
			case 221: 	//]
			case 106: 	//*
				playSound(59,keyCode);break;
			case 54: 	//6
			case 220: 	//\
			case 109: 	//-
				playSound(61,keyCode);break;
			case 55: 	//7
			case 19: 	//PB
				playSound(63,keyCode);break;
			case 56: 	//8
			case 46: 	//Del
				playSound(64,keyCode);break;
			case 57: 	//9
			case 35: 	//End
				playSound(66,keyCode);break;
			case 48: 	//0
			case 34: 	//PD
				playSound(68,keyCode);break;
			case 189: 	//-
			case 45: 	//Ins
				playSound(69,keyCode);break;
			case 187: 	//+
			case 36: 	//Hm
				playSound(71,keyCode);break;
			case 8: 	//Back
			case 33: 	//PU
				playSound(73,keyCode);break;
			case 145: 	//SL
				playSound(75,keyCode);break;
			default:
				break;
		}
	}

	webPiano.mp3Sound = {
		'sound1':'/WebPiano/Public/music/01.mp3',
		'sound2':'/WebPiano/Public/music/02.mp3',
		'sound3':'/WebPiano/Public/music/03.mp3',
		'sound4':'/WebPiano/Public/music/04.mp3',
		'sound5':'/WebPiano/Public/music/05.mp3',
		'sound6':'/WebPiano/Public/music/06.mp3',
		'sound7':'/WebPiano/Public/music/07.mp3',
		'sound8':'/WebPiano/Public/music/08.mp3',
		'sound9':'/WebPiano/Public/music/09.mp3',
		'sound10':'/WebPiano/Public/music/10.mp3',
		'sound11':'/WebPiano/Public/music/11.mp3',
		'sound12':'/WebPiano/Public/music/12.mp3',
		'sound13':'/WebPiano/Public/music/13.mp3',
		'sound14':'/WebPiano/Public/music/14.mp3',
		'sound15':'/WebPiano/Public/music/15.mp3',
		'sound16':'/WebPiano/Public/music/16.mp3',
		'sound17':'/WebPiano/Public/music/17.mp3',
		'sound18':'/WebPiano/Public/music/18.mp3',
		'sound19':'/WebPiano/Public/music/19.mp3',
		'sound20':'/WebPiano/Public/music/20.mp3',
		'sound21':'/WebPiano/Public/music/21.mp3',
		'sound22':'/WebPiano/Public/music/22.mp3',
		'sound23':'/WebPiano/Public/music/23.mp3',
		'sound24':'/WebPiano/Public/music/24.mp3',
		'sound25':'/WebPiano/Public/music/25.mp3',
		'sound26':'/WebPiano/Public/music/26.mp3',
		'sound27':'/WebPiano/Public/music/27.mp3',
		'sound28':'/WebPiano/Public/music/28.mp3',
		'sound29':'/WebPiano/Public/music/29.mp3',
		'sound30':'/WebPiano/Public/music/30.mp3',
		'sound31':'/WebPiano/Public/music/31.mp3',
		'sound32':'/WebPiano/Public/music/32.mp3',
		'sound33':'/WebPiano/Public/music/33.mp3',
		'sound34':'/WebPiano/Public/music/34.mp3',
		'sound35':'/WebPiano/Public/music/35.mp3',
		'sound36':'/WebPiano/Public/music/36.mp3',
		'sound37':'/WebPiano/Public/music/37.mp3',
		'sound38':'/WebPiano/Public/music/38.mp3',
		'sound39':'/WebPiano/Public/music/39.mp3',
		'sound40':'/WebPiano/Public/music/40.mp3',
		'sound41':'/WebPiano/Public/music/41.mp3',
		'sound42':'/WebPiano/Public/music/42.mp3',
		'sound43':'/WebPiano/Public/music/43.mp3',
		'sound44':'/WebPiano/Public/music/44.mp3',
		'sound45':'/WebPiano/Public/music/45.mp3',
		'sound46':'/WebPiano/Public/music/46.mp3',
		'sound47':'/WebPiano/Public/music/47.mp3',
		'sound48':'/WebPiano/Public/music/48.mp3',
		'sound49':'/WebPiano/Public/music/49.mp3',
		'sound50':'/WebPiano/Public/music/50.mp3',
		'sound51':'/WebPiano/Public/music/51.mp3',
		'sound52':'/WebPiano/Public/music/52.mp3',
		'sound53':'/WebPiano/Public/music/53.mp3',
		'sound54':'/WebPiano/Public/music/54.mp3',
		'sound55':'/WebPiano/Public/music/55.mp3',
		'sound56':'/WebPiano/Public/music/56.mp3',
		'sound57':'/WebPiano/Public/music/57.mp3',
		'sound58':'/WebPiano/Public/music/58.mp3',
		'sound59':'/WebPiano/Public/music/59.mp3',
		'sound60':'/WebPiano/Public/music/60.mp3',
		'sound61':'/WebPiano/Public/music/61.mp3',
		'sound62':'/WebPiano/Public/music/62.mp3',
		'sound63':'/WebPiano/Public/music/63.mp3',
		'sound64':'/WebPiano/Public/music/64.mp3',
		'sound65':'/WebPiano/Public/music/65.mp3',
		'sound66':'/WebPiano/Public/music/66.mp3',
		'sound67':'/WebPiano/Public/music/67.mp3',
		'sound68':'/WebPiano/Public/music/68.mp3',
		'sound69':'/WebPiano/Public/music/69.mp3',
		'sound70':'/WebPiano/Public/music/70.mp3',
		'sound71':'/WebPiano/Public/music/71.mp3',
		'sound72':'/WebPiano/Public/music/72.mp3',
		'sound73':'/WebPiano/Public/music/73.mp3',
		'sound74':'/WebPiano/Public/music/74.mp3',
		'sound75':'/WebPiano/Public/music/75.mp3',
		'sound76':'/WebPiano/Public/music/76.mp3',
		'sound77':'/WebPiano/Public/music/77.mp3',
		'sound78':'/WebPiano/Public/music/78.mp3',
		'sound79':'/WebPiano/Public/music/79.mp3',
		'sound80':'/WebPiano/Public/music/80.mp3',
		'sound81':'/WebPiano/Public/music/81.mp3',
		'sound82':'/WebPiano/Public/music/82.mp3',
		'sound83':'/WebPiano/Public/music/83.mp3',
		'sound84':'/WebPiano/Public/music/84.mp3',
		'sound85':'/WebPiano/Public/music/85.mp3',
		'sound86':'/WebPiano/Public/music/86.mp3',
		'sound87':'/WebPiano/Public/music/87.mp3',
		'sound88':'/WebPiano/Public/music/88.mp3'
}
	/*keyCode 8 = BackSpace BackSpace
keyCode 9 = Tab Tab
keyCode 12 = Clear
keyCode 13 = Enter
keyCode 16 = Shift_L
keyCode 17 = Control_L
keyCode 18 = Alt_L
keyCode 19 = Pause
keyCode 20 = Caps_Lock
keyCode 27 = Escape Escape
keyCode 32 = space
keyCode 33 = Prior
keyCode 34 = Next
keyCode 35 = End
keyCode 36 = Home
keyCode 37 = Left
keyCode 38 = Up
keyCode 39 = Right
keyCode 40 = Down
keyCode 41 = Select
keyCode 42 = Print
keyCode 43 = Execute
keyCode 45 = Insert
keyCode 46 = Delete
keyCode 47 = Help
keyCode 48 = 0 equal braceright
keyCode 49 = 1 exclam onesuperior
keyCode 50 = 2 quotedbl twosuperior
keyCode 51 = 3 section threesuperior
keyCode 52 = 4 dollar
keyCode 53 = 5 percent
keyCode 54 = 6 ampersand
keyCode 55 = 7 slash braceleft
keyCode 56 = 8 parenleft bracketleft
keyCode 57 = 9 parenright bracketright
keyCode 65 = a A
keyCode 66 = b B
keyCode 67 = c C
keyCode 68 = d D
keyCode 69 = e E EuroSign
keyCode 70 = f F
keyCode 71 = g G
keyCode 72 = h H
keyCode 73 = i I
keyCode 74 = j J
keyCode 75 = k K
keyCode 76 = l L
keyCode 77 = m M mu
keyCode 78 = n N
keyCode 79 = o O
keyCode 80 = p P
keyCode 81 = q Q at
keyCode 82 = r R
keyCode 83 = s S
keyCode 84 = t T
keyCode 85 = u U
keyCode 86 = v V
keyCode 87 = w W
keyCode 88 = x X
keyCode 89 = y Y
keyCode 90 = z Z
keyCode 96 = KP_0 KP_0
keyCode 97 = KP_1 KP_1
keyCode 98 = KP_2 KP_2
keyCode 99 = KP_3 KP_3
keyCode 100 = KP_4 KP_4
keyCode 101 = KP_5 KP_5
keyCode 102 = KP_6 KP_6
keyCode 103 = KP_7 KP_7
keyCode 104 = KP_8 KP_8
keyCode 105 = KP_9 KP_9
keyCode 106 = KP_Multiply KP_Multiply
keyCode 107 = KP_Add KP_Add
keyCode 108 = KP_Separator KP_Separator
keyCode 109 = KP_Subtract KP_Subtract
keyCode 110 = KP_Decimal KP_Decimal
keyCode 111 = KP_Divide KP_Divide
keyCode 112 = F1
keyCode 113 = F2
keyCode 114 = F3
keyCode 115 = F4
keyCode 116 = F5
keyCode 117 = F6
keyCode 118 = F7
keyCode 119 = F8
keyCode 120 = F9
keyCode 121 = F10
keyCode 122 = F11
keyCode 123 = F12
keyCode 124 = F13
keyCode 125 = F14
keyCode 126 = F15
keyCode 127 = F16
keyCode 128 = F17
keyCode 129 = F18
keyCode 130 = F19
keyCode 131 = F20
keyCode 132 = F21
keyCode 133 = F22
keyCode 134 = F23
keyCode 135 = F24
keyCode 136 = Num_Lock
keyCode 137 = Scroll_Lock
keyCode 187 = acute grave
keyCode 188 = comma semicolon
keyCode 189 = minus underscore
keyCode 190 = period colon
keyCode 192 = numbersign apostrophe
keyCode 210 = plusminus hyphen macron
keyCode 211 =
keyCode 212 = copyright registered
keyCode 213 = guillemotleft guillemotright
keyCode 214 = masculine ordfeminine
keyCode 215 = ae AE
keyCode 216 = cent yen
keyCode 217 = questiondown exclamdown
keyCode 218 = onequarter onehalf threequarters
keyCode 220 = less greater bar
keyCode 221 = plus asterisk asciitilde
keyCode 227 = multiply division
keyCode 228 = acircumflex Acircumflex
keyCode 229 = ecircumflex Ecircumflex
keyCode 230 = icircumflex Icircumflex
keyCode 231 = ocircumflex Ocircumflex
keyCode 232 = ucircumflex Ucircumflex
keyCode 233 = ntilde Ntilde
keyCode 234 = yacute Yacute
keyCode 235 = oslash Ooblique
keyCode 236 = aring Aring
keyCode 237 = ccedilla Ccedilla
keyCode 238 = thorn THORN
keyCode 239 = eth ETH
keyCode 240 = diaeresis cedilla currency
keyCode 241 = agrave Agrave atilde Atilde
keyCode 242 = egrave Egrave
keyCode 243 = igrave Igrave
keyCode 244 = ograve Ograve otilde Otilde
keyCode 245 = ugrave Ugrave
keyCode 246 = adiaeresis Adiaeresis
keyCode 247 = ediaeresis Ediaeresis
keyCode 248 = idiaeresis Idiaeresis
keyCode 249 = odiaeresis Odiaeresis
keyCode 250 = udiaeresis Udiaeresis
keyCode 251 = ssharp question backslash
keyCode 252 = asciicircum degree
keyCode 253 = 3 sterling
keyCode 254 = Mode_switch*/