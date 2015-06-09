
﻿<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Comer las celulas mas pequeñas y evitar que te coman las mas grandes, Eat cells smaller than you and don't get eaten by the bigger ones, as an MMO">
<meta name="keywords" content="agario, agar, io, cell, cells, virus, bacteria, blob, game, games, web game, html5, fun, flash">
<meta name="robots" content="index, follow">
<meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
        <title>Agar</title>
        <script type="text/javascript">
            var AGARIO_SERVER_HOST = 'localhost';
            var AGARIO_SERVER_URL = 'http://localhost/';
            var AGARIO_SERVER_API = 'http://localhost/';
        </script>
<link href='css/fonts.css' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="quadtree.js?3"></script>
<script src="main_out.js?526"></script>
<style>body{padding:0;margin:0;overflow:hidden;}#canvas{position:absolute;left:0;right:0;top:0;bottom:0;width:100%;height:100%;}.checkbox label{margin-right:10px;}form{margin-bottom:0px;}.btn-play,.btn-settings,.btn-spectate{display:block;height:35px;}.btn-play{width:85%;float:left;}.btn-settings{width:13%;float:right;}.btn-spectate{display:block;float:right;}#adsBottom{position:absolute;left:0;right:0;bottom:0;}#adsBottomInner{margin:0px auto;width:728px;height:90px;border:5px solid white;border-radius:5px 5px 0px 0px;background-color:#FFFFFF;box-sizing:content-box;}.region-message{display:none;margin-bottom:12px;margin-left:6px;margin-right:6px;text-align:center;}#nick,#locationKnown #region{width:65%;float:left;}#locationUnknown #region{margin-bottom:15px;}#gamemode,#spectateBtn{width:33%;float:right;}#helloDialog{width:350px;background-color:#FFFFFF;margin:10px auto;border-radius:15px;padding:5px 15px 5px 15px;position:absolute;top:50%;left:50%;margin-right:-50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);}#a300x250{background-image:url('blocker.png');width:300px;height:250px;background-repeat:no-repeat;background-size:contain;background-position:center center;}</style>
</head>
<body>
<div id="overlays" style="display:none; position: absolute; left: 0; right: 0; top: 0; bottom: 0; background-color: rgba(0,0,0,0.5); z-index: 200;">
<div id="helloDialog" style="">
<form role="form">
<div class="form-group">
<h2><center>Agar</center></h2>
</div>
<div class="form-group">
<input id="nick" class="form-control" placeholder="Nick" maxlength="15"/>
<select id="gamemode" class="form-control" onchange="setGameMode($(this).val());" required>
<option selected value="">FFA</option>
<!-- <option value=":teams">Teams</option> -->
</select>
<br clear="both"/>
</div>
<div id="locationUnknown">

</div>
<div>
<div class="text-muted region-message CN-China">
 
</div>
</div>
<div class="form-group">
                        <button type="submit" id="playBtn" onclick="setNick(document.getElementById('nick').value); return false;" class="btn btn-play btn-primary btn-needs-server">Play</button>
                        <button onclick="$('#settings').toggle(); return false;" class="btn btn-info btn-settings"><i class="glyphicon glyphicon-cog"></i></button>
<br clear="both"/>
</div>
<div id="settings" class="checkbox" style="display:none;">
<div class="form-group">
<div id="locationKnown">
                        <select id="region" class="form-control" onchange="setRegion($('#region').val()); $('.region-message').hide(); $('.region-message.' + $('#region').val()).show(); $('.btn-needs-server').prop('disabled', false);" required>
                                                            <option value="BR-Brazil">South America</option>
                                                    </select>
</div>
                        <button onclick="spectate(); return false;" disabled class="btn btn-warning btn-spectate btn-needs-server">Spectate</button>
<br clear="both"/>
</div>
<div style="margin: 6px;">
                            <label><input type="checkbox" onchange="setSkins(!$(this).is(':checked'));"> No skins</label>
                            <label><input type="checkbox" onchange="setNames(!$(this).is(':checked'));"> No names</label>
                            <label><input type="checkbox" onchange="setDarkTheme($(this).is(':checked'));"> Dark Theme</label>
                            <label><input type="checkbox" onchange="setColors($(this).is(':checked'));"> No colors</label>
                            <label><input type="checkbox" onchange="setShowMass($(this).is(':checked'));"> Show mass</label>
</div>
</div>
</form>
<div id="instructions">
<hr/>
<center><span class="text-muted">
                        Move your mouse to control your cell<br/>
						Press <b>Space</b> to split<br/>
						Press <b>W</b> to eject some mass<br/>
</span></center>
</div>
<hr/>

<hr style="margin-bottom: 7px; "/>
<div style="margin-bottom: 5px; float: left; line-height: 32px; margin-left: 6px; height: 32px;">
<a href="privacy.txt" class="text-muted">Privacy Policy</a>
|
<a href="changelog.txt" class="text-muted">Changelog</a>
</div>


<br clear="both"/>
</div>
</div>
<div id="connecting" style="display:none;position: absolute; left: 0; right: 0; top: 0; bottom: 0; z-index: 100; background-color: rgba(0,0,0,0.5);">
<div style="width: 350px; background-color: #FFFFFF; margin: 100px auto; border-radius: 15px; padding: 5px 15px 5px 15px;">
                <h2>Connecting</h2>
                <p> If you cannot connect to the servers, check if you have some anti virus or firewall blocking the connection.
</div>
</div>

<canvas id="canvas" width="800" height="600"></canvas>
<div style="font-family:'Ubuntu'">&nbsp;</div>

</body>
</html>
