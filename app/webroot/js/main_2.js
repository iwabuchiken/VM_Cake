//alert("main_2");

//ref http://stackoverflow.com/questions/33854708/cant-get-youtube-video-current-time
var tag;
//var tag = document.createElement('script');

//   tag.src = get_VideoURL();
//   tag.src = "https://www.youtube.com/iframe_api";
   var firstScriptTag;
//   var firstScriptTag = document.getElementsByTagName('script')[0];
//   firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

   var player;

//   init_Player();

   function init_Player() {
	   
	   tag = document.createElement('script');
	   
	   tag.src = get_VideoURL();
	   
	   firstScriptTag = document.getElementsByTagName('script')[0];
	   
	   firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	   
   }
   
   function get_VideoURL() {
	   
	   alert("get_VideoURL");
	   
//	   var video_url = $("#video_url").val();
	   var video_url = $("#video_url_hidden").val();
	   
	   alert(video_url);
//	   alert("url => " + video_url);
	   
	   //test
	   var video_id = $("#video_id").val();
//	   var video_id = $("#video_id_hidden").val();
	   
	   alert(video_id);
	   
	   return "https://www.youtube.com/iframe_api";
	   
   }
   
   function onYouTubeIframeAPIReady() {
     player = new YT.Player('it', {
       height: '315',
       width: '560',
       videoId: 'FHtvDA0W34I',
       events: {
         'onReady': onPlayerReady,
         'onStateChange': onPlayerStateChange
       }
     });
   }

   function onPlayerReady(event) {
     event.target.playVideo();
   }

   var done = false;

   function onPlayerStateChange(event) {
     if (event.data == YT.PlayerState.PLAYING && !done) {
       setTimeout(stopVideo, 6000);
       done = true;
     }
   }

   function stopVideo() {
     player.stopVideo();
   }

   function ShowTime() {
	   
	   get_VideoURL();
	   
     alert(player.getCurrentTime());
   }
   
//   alert("js => loaded");