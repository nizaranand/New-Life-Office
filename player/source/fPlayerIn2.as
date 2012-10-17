/**
*
* fPlayer2 : as3 flv player
*
*@url:		http://as3flvplayer.sourceforge.net/
*@version:	r2.0 - 08.10.14 / y.m.d
*@author:	göker.cebeci :: http://goker.cebeci.name // please feedback
*/
package {
		import flash.display.StageScaleMode; 
		import flash.display.StageAlign;
		import flash.display.StageDisplayState;  
		import flash.display.MovieClip;
		import flash.events.Event;
		import flash.events.MouseEvent;
//--------------------------------------  ### ------------------------------------------
		import flash.net.URLLoader;
		import flash.net.URLRequest;
//--------------------------------------  ### ------------------------------------------
		import flash.net.NetConnection;
		import flash.net.NetStream;		
		import flash.events.NetStatusEvent;
		import flash.media.Video;
		import flash.media.SoundTransform
		import flash.geom.Rectangle;		
		import flash.utils.Timer; 
		import flash.events.TimerEvent; 
		
			
	public class fPlayerIn2 {
			private var p:MovieClip; // parent movie - this
			private var C:MovieClip; // Control	
			private static var padding:int = 13; // Control padding
			private var seekBarWidth:int; //seek-bar width		
			private var barWidth:int;		
			private var barPadding:int;
			private var startPoint:int; // start point to pointer of scrubber
//--------------------------------------  ### ------------------------------------------
			private var videosXML:XMLList;
			private var VID:int;
//--------------------------------------  ### ------------------------------------------
			private var ns:NetStream;
			private var netStatusCache:String;
					
			private var player:Video;		
			private var meta:Object;
			private var progress:int;
			private var ready:Boolean = false;
			private var bufferFlush:Boolean = false;
			private var invalidTime:Boolean = false;
			private var seeking:Boolean = false;
			
			private var progressBarTimer:Timer = new Timer(250);
			private var playingBarTimer:Timer = new Timer(250);
			
		public function fPlayerIn2(Parent:MovieClip){		
			p = Parent;
			C = p.Control;
			p.stage.scaleMode = StageScaleMode.NO_SCALE;
			p.stage.align = StageAlign.TOP_LEFT;		
			//set static position [
				p.overBtn.visible = false;
				p.playBtn.visible = false;
				C.visible = false;
				C.Left.x = padding;
				C.Left.pauseBtn.visible = false;
				C.Left.pauseBtn.y = C.Left.playBtn.y;				
				C.Panel.x = C.Left.width + (padding * 2);
				C.Panel.Center.x = C.Panel.Left.width;
				C.Panel.Center.width = p.stage.stageWidth - (C.Panel.x + C.Panel.Left.width + C.Panel.Right.width + padding);
				C.Panel.Right.x = C.Panel.Left.width + C.Panel.Center.width;
				C.Right.x = (C.Panel.x + C.Panel.width) - (C.Right.width + padding);
				seekBarWidth = C.Center.seekBar.width;
				C.Center.x = C.Panel.x + padding;
				C.Center.container.width = C.Right.x - padding - C.Center.x;								
				barPadding = (C.Center.container.height - C.Center.playingBar.height)*.5;
				C.Center.playingBar.y = C.Center.progressBar.y = C.Center.seekBar.y = C.Center.container.y + barPadding;
				startPoint = C.Center.playingBar.x = C.Center.progressBar.x = C.Center.seekBar.x = C.Center.seeker.x = C.Center.container.x + barPadding;
				C.Center.playingBar.width = C.Center.progressBar.width = C.Center.seekBar.width = C.Center.container.width - (barPadding*2);
				C.Center.seeker.y = C.Center.container.y-1;
				C.Center.playingBar.width = 0;				
			// ] set static position	
			p.stage.addEventListener(Event.RESIZE, resizeEvent);
			setPosition();
//--------------------------------------  ### ------------------------------------------
			uldr = new URLLoader();
			uldr.addEventListener(Event.COMPLETE, xmlCompleteEvent);
			var playList:String = ((p.loaderInfo.parameters.playList)?p.loaderInfo.parameters.playList:'../../db/xml/test.xml');
			uldr.load(new URLRequest(playList));
//--------------------------------------  ### ------------------------------------------
			var connection:NetConnection = new NetConnection();
            connection.connect(null);
			ns = new NetStream(connection);
			ns.bufferTime = 5; // buffer time 5 sec.
			ns.addEventListener(NetStatusEvent.NET_STATUS, netStatusEvent);
			 
		}
// FUNC ╠═════════════		# SET POSITION #		═════════════
		private function setPosition():void{
			var stageWidth:int = (p.stage.stageWidth < 200)?200:p.stage.stageWidth;
			var stageHeight:int = (p.stage.stageHeight < 200)?200:p.stage.stageHeight;
			if(stageWidth > int(stageHeight * 1.7777)){ // 1.3333 => 4/3 || 1.7777 => 16/9 format
				p.act.width = int(stageHeight * 1.7777);
				p.act.height = stageHeight;
			} else {
				p.act.width = stageWidth;
				p.act.height = int(stageWidth * .5625); // .75 => 4/3 || .5625 => 16/9 format
			}
			p.overBtn.width = p.act.width;
			p.overBtn.height = p.act.height;			
			p.overBtn.x = p.act.x = C.x = (stageWidth - p.act.width)*.5;
			p.overBtn.y = p.act.y = (stageHeight - p.act.height)*.5;
			p.bufferMovie.x = p.act.x + (p.act.width-p.bufferMovie.width)*.5;
			p.bufferMovie.y = p.act.y + (p.act.height-p.bufferMovie.height)*.5;			
			p.playBtn.x = p.act.x + (p.act.width-p.playBtn.width)*.5;
			p.playBtn.y = p.act.y + (p.act.height-p.playBtn.height)*.5;
			//CONTROL POSITION
				C.y = p.act.y + p.act.height - C.height - padding/2;
				C.Panel.Center.width = p.act.width - (C.Panel.x + C.Panel.Left.width + C.Panel.Right.width + padding);
				C.Panel.Right.x = C.Panel.Left.width + C.Panel.Center.width;
				C.Right.x = (C.Panel.x + C.Panel.width) - (C.Right.width + padding);				
				C.Center.x = C.Panel.x + padding;
				C.Center.container.width = C.Right.x - padding - C.Center.x;								
				C.Center.playingBar.width = C.Center.progressBar.width = C.Center.seekBar.width = C.Center.container.width - (barPadding*2);
				if(progress){ // progress bar size
					var newWidth:Number =((progress * barWidth *.01) >> 0);
		      		C.Center.progressBar.x = C.Center.seekBar.x + newWidth;
					C.Center.progressBar.width = barWidth - newWidth;
				}
			barWidth = C.Center.seekBar.width = C.Center.container.width - (barPadding*2);
			if(ready){ // player size
				player.x = p.act.x;
				player.y = p.act.y;
				player.width = p.act.width;
				player.height = p.act.height;
			}
		}
// EVENT ╠═════════════		# RESIZE EVENT #		═════════════
		private function resizeEvent(event:Event):void {
			setPosition();
		}
//	════════════════════════════════════════════════
// EVENT╠═════════════	# XML COMPLETE HANDLER #	═════════════
		private function xmlCompleteEvent(event:Event):void {		
			var playList:XML = XML(event.target.data);
			videosXML = playList.video;			
			// PLAYER
			player = new Video();	
			player.smoothing = true;			
			player.x = p.act.x;
			player.y = p.act.y;
			player.width = p.act.width;
			player.height = p.act.height;
			var client:Object = new Object();
			client.onMetaData = metaDataObject;
			ns.client = client;	
			player.attachNetStream(ns);
			ns.play(getVideoURL()); // *** play FLV file				
			p.addChildAt(player,0);
			// PROGRESS
			progressBarTimer.addEventListener(TimerEvent.TIMER, progressBarTimerEvent);			
			progressBarTimer.start();		
		}
// FUNC ╠═════════════		# GET VIDEO URL #		═════════════
		public function getVideoURL():String {
			return videosXML[VID].@url;
		}
//	════════════════════════════════════════════════
// EVENT ╠═════════════	  # NET  STATUS EVENT #		═════════════
		private function netStatusEvent(event:NetStatusEvent):void {			
			if(netStatusCache != event.info.code){
				trace(event.info.code);
				switch (event.info.code) {
					case "NetStream.Play.Start" :
						playingBarTimer.start();
					break;
					case "NetStream.Buffer.Empty" :
					break;
					case "NetStream.Buffer.Full" :
					break;
					case "NetStream.Buffer.Flush" :
						bufferFlush = true;
					break;
					case "NetStream.Seek.Notify" :
						invalidTime = false;				
					break;
					case "NetStream.Seek.InvalidTime" :
						bufferFlush = false;
						invalidTime = true;						
					break;
					case "NetStream.Play.Stop" :
						if(bufferFlush) STOP();			
					break;
				}
				netStatusCache = event.info.code;
			}
		}
// OBJECT ╠═════════════	   # META DATA OBJECT #		═════════════
		private function metaDataObject(data:Object):void {
			meta = data;
			p.bufferMovie.visible = false;						
			if(!ready){
				ns.pause();	
				p.playBtn.visible = true;	
				ready = true;		
			}
			//player.scaleMode = VideoScaleMode.MAINTAIN_ASPECT_RATIO;
			playingBarTimer.addEventListener(TimerEvent.TIMER, playingBarTimerEvent);
			p.playBtn.addEventListener(MouseEvent.CLICK, playPauseEvent);
			C.Left.playBtn.addEventListener(MouseEvent.CLICK, playPauseEvent);
			C.Left.pauseBtn.addEventListener(MouseEvent.CLICK, playPauseEvent);
			p.overBtn.visible = true;
			p.overBtn.buttonMode = true;
			p.overBtn.addEventListener(MouseEvent.CLICK, playPauseEvent);
			p.overBtn.addEventListener(MouseEvent.MOUSE_OVER, controlDisplayEvent);
			p.overBtn.addEventListener(MouseEvent.MOUSE_OUT, controlDisplayEvent);
			C.addEventListener(MouseEvent.MOUSE_OVER, controlDisplayEvent);
			C.addEventListener(MouseEvent.MOUSE_OUT, controlDisplayEvent);
			/// seeker [
				C.Center.seeker.buttonMode = true;
				C.Center.seeker.addEventListener(MouseEvent.MOUSE_DOWN, seekerEvent);
				p.stage.addEventListener(MouseEvent.MOUSE_UP, stageMouseUpEvent);			
				C.Center.playingBar.buttonMode = true;
				C.Center.playingBar.addEventListener(MouseEvent.MOUSE_DOWN, playingBarEvent);
				C.Center.seekBar.buttonMode = true;
				C.Center.seekBar.addEventListener(MouseEvent.MOUSE_DOWN, seekBarEvent);
			// ] seeker
			// volume [
				volumeTransform = new SoundTransform();	
				C.Right.mute.addEventListener(MouseEvent.CLICK, volumeEvent);	
				C.Right.mute.addEventListener(MouseEvent.ROLL_OVER, volumeEvent);				
				C.Right.volumeOne.addEventListener(MouseEvent.CLICK, volumeEvent);		
				C.Right.volumeOne.addEventListener(MouseEvent.ROLL_OVER, volumeEvent);
				C.Right.volumeTwo.addEventListener(MouseEvent.CLICK, volumeEvent);
				C.Right.volumeTwo.addEventListener(MouseEvent.ROLL_OVER, volumeEvent);
				C.Right.volumeThree.addEventListener(MouseEvent.CLICK, volumeEvent);
				C.Right.volumeThree.addEventListener(MouseEvent.ROLL_OVER, volumeEvent);
				C.Right.volumeFour.addEventListener(MouseEvent.CLICK, volumeEvent);
				C.Right.volumeFour.addEventListener(MouseEvent.ROLL_OVER, volumeEvent);
				C.Right.volumeFive.addEventListener(MouseEvent.CLICK, volumeEvent);
				C.Right.volumeFive.addEventListener(MouseEvent.ROLL_OVER, volumeEvent);
			// ] volume
			// fullScreen [
				C.Right.fullScreen.buttonMode = true;
				C.Right.fullScreen.addEventListener(MouseEvent.CLICK, fullScreenHandler);
				//p.stage.addEventListener(MouseEvent.CLICK, fullScreenHandler);
			// ] fullScreen
		}
// EVENT ╠═════════════  # PROGRESSBAR TIMER EVENT #	═════════════
		private function progressBarTimerEvent(event:TimerEvent):void {
			progress = (( ns.bytesLoaded / ns.bytesTotal * 100 ) >> 0);
			var newWidth:Number =((progress * barWidth *.01) >> 0);
      		C.Center.progressBar.x = C.Center.seekBar.x + newWidth;
			C.Center.progressBar.width = barWidth - newWidth;
			if(progress >= 100){
				progressBarTimer.stop();
			}
		}
// EVENT ╠═════════════  # PLAYINGBAR TIMER EVENT #	═════════════
		private function playingBarTimerEvent(event:TimerEvent):void {
			C.Center.seeker.currentTime.text = formatTime(ns.time);
			var percent:Number = (ns.time / meta.duration * barWidth).toFixed(2);
			C.Center.playingBar.width = percent;
			C.Center.seeker.x = startPoint + percent;
		}
// FUNC ╠═════════════		# FORMAT TIME #			═════════════
		private function formatTime(time:Number):String {
			if(time > 0){
			var integer:String = String((time*.0166)>>0);
			var decimal:String = String((time%60)>>0);
			return ((integer.length<2)?"0"+integer:integer)+":"+((decimal.length<2)?"0"+decimal:decimal);
			} else return String("00:00");
		}
// EVENT ╠═════════════	  # PLAY&PAUSE EVENT #		═════════════
		private function playPauseEvent(event:MouseEvent):void {
			TOGGLEPAUSE();
		}
// EVENT ╠═════════════	# CONTROL DISPLAY EVENT #	═════════════	
		private function controlDisplayEvent(event:MouseEvent):void {
			if(event.type == 'mouseOver'){
				C.visible = true;
			} else 	C.visible = false;
		}
// EVENT ╠═════════════		 # SEEKER EVENT #		═════════════
		private function seekerEvent(event:MouseEvent):void {
			seeking = true;
			var rectangle:Rectangle = new Rectangle(startPoint, C.Center.seeker.y, barWidth, 0);
			C.Center.seeker.startDrag(false, rectangle);
			TOGGLEPAUSE();
			p.stage.addEventListener(MouseEvent.MOUSE_MOVE, stageMouseMoveEvent);
		}
// EVENT ╠═════════════  # STAGE MOUSE MOVE EVENT #	═════════════
		private function stageMouseMoveEvent(event:MouseEvent):void { // for seeker position
			if(meta.duration > 0) {
			   if(seeking) {
					var point:int = (((C.Center.seeker.x - startPoint) / barWidth) * meta.duration) >> 0;
					if(point <= 0 || point >= (meta.duration >> 0)) C.Center.seeker.stopDrag();
						C.Center.seeker.currentTime.text = formatTime(point);				
						ns.seek(point);
				}
			}
		}
// EVENT ╠═════════════    # STAGE MOUSE UP EVENT #	═════════════
		private function stageMouseUpEvent(event:MouseEvent):void { // for stop seeking
			if(seeking){
				seeking = false;
				C.Center.seeker.stopDrag();
				TOGGLEPAUSE();
			}
		}
// EVENT ╠═════════════      # PLAYINGBAR EVENT #		═════════════
		private function playingBarEvent(event:MouseEvent):void { //click to seek
			var point:Number = (meta.duration * (event.localX*C.Center.playingBar.width/seekBarWidth) / barWidth);
			ns.seek(point);
		}
// EVENT ╠═════════════       # SEEKBAR EVENT #		═════════════
		private function seekBarEvent(event:MouseEvent):void { //click to seek
			var point:Number = (event.localX * meta.duration / seekBarWidth);
			ns.seek(point);
		}
// EVENT ╠═════════════       # VOLUME EVENT #		═════════════
		private function volumeEvent(event:MouseEvent):void {
			var thisMC:MovieClip = event.currentTarget as MovieClip;
			if(event.buttonDown || event.type == 'click')
			switch (event.currentTarget) {
				case C.Right.mute :
				if(volumeTransform.volume > 0) {					
					volumeCache = .1;
					setVolume(0);
				} else setVolume(volumeCache);
				break;
				case C.Right.volumeOne :	setVolume(.2);	break;
				case C.Right.volumeTwo :	setVolume(.4);	break;
				case C.Right.volumeThree :	setVolume(.6);	break;
				case C.Right.volumeFour :	setVolume(.8);	break;
				case C.Right.volumeFive :	setVolume(1);	break;
			}
		}
// FUNC ╠═════════════		 # SET VOLUME #			═════════════
		public function setVolume(newVolume):void{
			volumeTransform.volume = newVolume;
			ns.soundTransform = volumeTransform;
			C.Right.mute.gotoAndStop((newVolume > 0)?1:2);
			C.Right.volumeOne.gotoAndStop((newVolume >= 0.2)?1:2);
			C.Right.volumeTwo.gotoAndStop((newVolume >= 0.4)?1:2);
			C.Right.volumeThree.gotoAndStop((newVolume >= 0.6)?1:2);
			C.Right.volumeFour.gotoAndStop((newVolume >= 0.8)?1:2);
			C.Right.volumeFive.gotoAndStop((newVolume == 1)?1:2);
		}
// EVENT ╠═════════════     # FULLSCREEN EVENT #		═════════════		
		private function fullScreenHandler(event:MouseEvent):void {
			if(p.stage.displayState == StageDisplayState.FULL_SCREEN){
				p.stage.displayState = StageDisplayState.NORMAL;
			} else {
				p.stage.displayState = StageDisplayState.FULL_SCREEN;
			}
		}
// FUNC ╠═════════════	   # TOGGLE PAUSE #			═════════════
		public function TOGGLEPAUSE():void {	
			if(invalidTime){	ns.seek(0); invalidTime = false;	}
			C.Left.playBtn.visible = (C.Left.playBtn.visible?false:true);
			C.Left.pauseBtn.visible = (C.Left.pauseBtn.visible?false:true);
			p.playBtn.visible = false;
			p.act.visible = false;
			p.act.visible = false;
			ns.togglePause();		
		}
// FUNC ╠═════════════		 	# STOP #			═════════════
		public function STOP():void {
			C.Left.playBtn.visible = true;
			C.Left.pauseBtn.visible = false;
			p.act.visible = true;
			p.playBtn.visible = true;
			ns.seek(0);
			ns.pause();
		}	
	}	
}