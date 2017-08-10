var style=['colorblackwhite','colorpink','colorblue'];
var stylecss=document.getElementById('colorstyle');
/*window.onload = function(){
	var i;
	if(document.addEventListener){//设定钢琴键的事件
		for(i = 0; i<style.length; i++){
			setstyleEventListener(i);
		}
	}else if(document.attachEvent){
		for(i = 0; i<style.length; i++){
			setstyleAttachEvent(i);
		}
	}
}*/

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
	var name = that.id.replace('color','');
	stylecss.setAttribute("href","/WebPiano/Public/css/"+name+".css");
}