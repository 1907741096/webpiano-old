$(document).ready(function(){
  var url='index.php?c=music';
  var data={};
  $.post(url,data,function(result){
        
        data=result.data;

  var playlist = {};

  var playlist = new Array();
  for (var i = 0; i < data.length; i++) {
    playlist[i]=new Array();
    playlist[i]['title']=data[i]['name'];
    playlist[i]['artist']=data[i]['author'];
    playlist[i]['mp3']=data[i]['address']; 
    playlist[i]['poster']='/WebPiano/Public/image/loginback6.jpg';
  }

  
  var cssSelector = {
    jPlayer: "#jquery_jplayer",
    cssSelectorAncestor: ".music-player"
  };
  
  var options = {
    swfPath: "http://cdnjs.cloudflare.com/ajax/libs/jplayer/2.6.4/jquery.jplayer/Jplayer.swf",
    supplied: "ogv, m4v, oga, mp3"
  };
  
  var myPlaylist = new jPlayerPlaylist(cssSelector, playlist, options);

   },"JSON");
  
});