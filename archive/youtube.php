<script src="http://www.google.com/uds/api?file=uds.js&v=1.0"
    type="text/javascript"></script>
<link href="http://www.google.com/uds/css/gsearch.css"
    rel="stylesheet" type="text/css"/>
<script src="http://www.google.com/uds/solutions/videobar/gsvideobar.js"
    type="text/javascript"></script>
<link href="http://www.google.com/uds/solutions/videobar/gsvideobar.css"
    rel="stylesheet" type="text/css"/>
    
    <style type="text/css">
	
	/* override standard player dimensions */
.playerInnerBox_gsvb .player_gsvb {
  width : 480px;
  height : 380px;
  position: relative;
  z-index:20;
}



	</style>
    
    <div id="videoBar">Loading...</div>
    
    <script type="text/javascript">
  function LoadVideoBar() {
    var vbr;

    var options = {
      largeResultSet : true
    }
    vbr = new GSvideoBar(
                document.getElementById("videoBar"),
                GSvideoBar.PLAYER_ROOT_FLOATING,
                options
                );
    vbr.execute("NewLifeOfficeSystems");
  }
  /**
   * Arrange for LoadVideoBar to run once the page loads.
   */
  GSearch.setOnLoadCallback(LoadVideoBar);
</script>

<a href="javascript:myVideoBar.execute('NewLifeOfficeSystems');">New Life Office</a>