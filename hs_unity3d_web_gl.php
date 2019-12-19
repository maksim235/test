<?php
/**
*    Plugin Name: HoweScape Unity3d WebGL
*    Plugin URI: http://www.howescape.com 
*    Description: Plugin for Wordpress to create short code for Unity3d Game
*    Author: P.T.Howe
*    Text Domain: hs_unity3d_web_gl
*	Domain Path: /languages
*    Version: 1.9.3	
*    Author URI: http://www.HoweScape.com 
* License: GPL2
*/ 
// Roll-A-Ball game created with unity3d.com  5.3.3f1
// Space-Shooter game created with unity3d.com 5.3.3f1

// Constants
include_once (plugin_dir_path( __FILE__ )."./include/hs_unity3d_constants.php");

// Setup
// Check which system and path separator 
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    //echo 'This is a server using Windows!';
	DEFINE('DS', '/'); 
} else {
    //echo 'This is a server not using Windows!';
	DEFINE('DS', DIRECTORY_SEPARATOR); 
}

class hs_unity3d_web_gl {
	
	function hs_unity3d_5_3_1($gameName, $gameDir, $width, $height, $gameVersion) {
	
		$altGameName = 'Builds_WebGL';
//		echo "loc:".plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir.'<br>';
//		echo "loc2:".plugin_dir_path( __FILE__ ).$gameDir.'<br>';
//		echo "loc3:".plugin_dir_path( __FILE__ ).$gameName.":<br>";
/*
		if (file_exists(plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir)) {
//			echo("1<br>");
			$gameLocation = plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir;
			$gameLocationPath = GAME_DIR.DS.$gameDir;
		} else if (file_exists(plugin_dir_path( __FILE__ ).$gameDir)) {
//			echo("2<br>");
			$gameLocation = plugin_dir_path( __FILE__ ).$gameDir;
			$gameLocationPath = $gameDir;
		} else if (file_exists(plugin_dir_path( __FILE__ ).$gameName."-Release")) {
//			echo("3<br>");
			$gameLocation = plugin_dir_path( __FILE__ ).$gameName."-Release";
			$gameLocationPath = $gameName."-Release";		
		} else {
			_e('Game not found', 'hs_unity3d_web_gl');
		}
*/
//		echo "gl:".$gameLocation.":<br>";
//		echo "gp:".$gameLocationPath.":<br>";
//		echo "f:".$gameLocation.DS.$altGameName."datagz".":<br>";
	//echo "path:".file_exists($gameLocation.DS.$gameName."data")."<br>";
	//echo "path2:".file_exists($gameLocation.DS.$gameName."datagz")."<br>";
	//	echo "checfile:".$gameLocation.DS.$gameName.".data"."<br>";
	//	echo "checfile2:".$gameLocation.DS.$altGameName.".data"."<br>";
	// Check for type of extension.
	$gameFileExt ='';
/*
		if (file_exists($gameLocation.DS.$gameName.".data")) { // Ext is uncompressed
	//		echo "1";
			$gameFileExt = "";
		} else if (file_exists($gameLocation.DS.$gameName.".datagz")) { // Ext is compressed
	//		echo "2";
			$gameFileExt = "gz";
		} else if (file_exists($gameLocation.DS.$altGameName.".data")) {
	//		echo "3";
			//$gameName = $altGameName;
			$gameFileExt = "";
		} else if (file_exists($gameLocation.DS.$altGameName.".datagz")) {
	//		echo "4";
			//$gameName = $altGameName;
			$gameFileExt = "gz";
		} else { // Unknown ext
	//		echo "5";
			$gameFileExt = "";
		}
*/
		//	echo "br:".$gameFileExt."<br>";
		$my_gameName = __($gameName, 'hs_unity3d_web_gl');
		// Build page based on Builds.html created in game Builds directory
	//	wp_deregister_script('jquery-migrate');
		$game_page = "<meta charset=\"utf-8\">".
				"<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">".
				"<title>Unity WebGL Player | ".$gameName."</title>".
				"<link rel=\"shortcut icon\" href=\"".plugins_url(SUPPORT_DIR.DS."TemplateData/favicon.ico",__FILE__)."\"/>".
				"<p class=\"header\"><span>Unity WebGL Player | </span>".$gameName."</p>".
				"<div class=\"template-wrap clear\">".
				"<canvas class=\"emscripten\" id=\"canvas\" oncontextmenu=\"event.preventDefault()\" height=\"".$height."px\" width=\"".$width."px\"></canvas>".
					"<br>".
					"<div class=\"logo\"></div>".
					"<div class=\"fullscreen\"><img src=\"".plugins_url(SUPPORT_DIR.DS."TemplateData/fullscreen.png", __FILE__)."\" width=\"38\" height=\"38\" alt=\"Fullscreen\" title=\"Fullscreen\" onclick=\"SetFullscreen(1);\" /></div>".
					"<div class=\"title\">".$gameName."</div>".
				"</div>".
				"<script type='text/javascript'> \n".
					"var Module = { \n".
						"TOTAL_MEMORY:   268435456, \n".
						"errorhandler: null, \n".
						"dataUrl: \"".plugins_url(GAME_DIR.DS.$gameName."_5_3_1-Release/Builds_WebGL.data".$gameFileExt,__FILE__)."\", \n".
						"codeUrl: \"".plugins_url(GAME_DIR.DS.$gameName."_5_3_1-Release/Builds_WebGL.js".$gameFileExt,__FILE__)."\", \n".
						"memUrl: \"".plugins_url(GAME_DIR.DS.$gameName."_5_3_1-Release/Builds_WebGL.mem".$gameFileExt,__FILE__)."\", \n".
					"};\n".
				"</script>\n".
				"<script type='text/javascript' src=\"".plugins_url(GAME_DIR.DS.$gameName."_5_3_1-Release/UnityLoader.js",__FILE__)."\"></script>\n";

		//	$game_page ='<link rel="stylesheet" href="TemplateData/style.css">
		//    <link rel="shortcut icon" href="TemplateData/favicon.ico" />
		//    <script src="TemplateData/UnityProgress.js"></script>
		//	<p class="header"><span>Unity WebGL Player | </span>Roll-A-Ball</p>
		//    <div class="template-wrap clear">
		//      <canvas class="emscripten" id="canvas" oncontextmenu="event.preventDefault()" height="600px" width="960px"></canvas>
		//      <br>
		//      <div class="logo"></div>
		//      <div class="fullscreen"><img src="TemplateData/fullscreen.png" width="38" height="38" alt="Fullscreen" title="Fullscreen" onclick="SetFullscreen(1);" /></div>
		//      <div class="title">Roll-A-Ball</div>
		//    </div>
		//    <p class="footer">&laquo; created with <a href="http://unity3d.com/" title="Go to unity3d.com">Unity</a> &raquo;</p>';
		//    $game_page = $game_page.'<script type="text/javascript">
		//  var Module = {
		//    TOTAL_MEMORY: 268435456,
		//    errorhandler: null,			
		//    compatibilitycheck: null,
		//    dataUrl: "Roll-A-Ball-Release/Builds_WebGL.data",
		//    codeUrl: "Roll-A-Ball-Release/Builds_WebGL.js",
		//    memUrl: "Roll-A-Ball-Release/Builds_WebGL.mem",
		//  };
		//</script>
		//<script src="Roll-A-Ball-Release/UnityLoader.js"></script>';

		return $game_page;
	}

	function hs_unity3d_5_5_1($gameName, $gameDir, $width, $height, $gameVersion) {
	// Build page based on Builds.html created in game Builds directory
	// Build Symbol to represent path of game. Give preference to Release
	//echo "checkPath:".plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir.":<br>";
	//echo "gameName:".$gameName."<br>";
	//echo " gameDir:".$gameDir."<br>";
	//echo "   width:".$width."<br>";
	//echo "  height:".$height."<br>";
	//echo " version:".$gameVersion."<br>";
/*
	if (file_exists(plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir)) {
		$gameLocation = plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir;
		$gameLocationPath = GAME_DIR.DS.$gameDir;
	} else if (file_exists(plugin_dir_path( __FILE__ ).$gameDir)) {
		$gameLocation = plugin_dir_path( __FILE__ ).$gameDir;
		$gameLocationPath = $gameDir;
	} else {
		_e('Game not found', 'hs_unity3d_web_gl');
	}
*/
	$gameVersionPath = str_replace('.','_',$gameVersion);
	$gameLocationPath = GAME_DIR.DS.$gameName.'_'.$gameVersionPath.RELEASE_SUFFIX; //plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameName.'_'.$gameVersionPath.RELEASE_SUFFIX;
	//echo "<br>GameLoc:".$gameLocationPath."<br><br>";
	// Check for type of extension.
//	if (file_exists($gameLocation.DS.$gameName."data")) { // Ext is uncompressed
//		$gameFileExt = "";
//	} else if (file_exists($gameLocation.DS.$gameName."datagz")) { // Ext is compressed
//		$gameFileExt = "gz";
//	} else { // Unknown ext
		$gameFileExt = "";
//	}
//	$gameVersionPath = "_".str_replace(".", "_", $gameVersion);
	//echo "ver:".$gameVersionPath."<br>";
//	$selectedLocation = $selectedLocation.$gameName."_".$gameVersionPath.RELEASE_SUFFIX.DS.$gameName;
//	$selectedLocationLoader = $gameLocation.DS."UnityLoader.js";
//	echo "<br>Path: ".$selectedLocation."<br>";
//	echo "Path2: ".$selectedLocationLoader."<br>";
	//echo "load: ".$selectedLocationLoader."<br>";
	//echo "Ext: ".$gameFileExt."<br>";
	//$gameVersionPath = "_".str_replace(".", "_", $gameVersion);
	//echo "path:".$gameLocationPath.":<br>";
	$my_gameName = __($gameName, 'hs_unity3d_web_gl');
	$game_page = "<link rel=\"shortcut icon\" href=\"".plugins_url(SUPPORT_DIR.DS."TemplateData_5_5_1/favicon.ico",__FILE__)."\"/>".
				//"<title>Unity WebGL Player | ".$gameName."</title>".
				"<p class=\"header\"><span>Unity WebGL Player | </span>".$my_gameName."</p>".
				"<div class=\"template-wrap clear\">".
				"<canvas class=\"emscripten\" id=\"canvas\" oncontextmenu=\"event.preventDefault()\" height=\"".$height."px\" width=\"".$width."px\"></canvas>".
					"<br>\n".
					"<div class=\"logo\"></div>\n".
					"<div class=\"fullscreen\"><img src=\"".plugins_url(SUPPORT_DIR.DS."TemplateData_5_5_1/fullscreen.png", __FILE__)."\" width=\"38\" height=\"38\" alt=\"Fullscreen\" title=\"Fullscreen\" onclick=\"SetFullscreen(1);\" /></div>\n".
					"<div class=\"title\">".$my_gameName."</div>\n".
				"</div>\n".
				"<script type='text/javascript'>\n".
					"var Module = {\n".
						"TOTAL_MEMORY:   268435456,\n".
						"errorhandler: null,\n".
						"compatibilitycheck: null,\n".
						"backgroundColor: \"#222C36\",\n".
						"splashStyle: \"Light\",\n".
						"dataUrl: \"".plugins_url($gameLocationPath.DS.$gameName.".data".$gameFileExt,__FILE__)."\",\n".
						"codeUrl: \"".plugins_url($gameLocationPath.DS.$gameName.".js".$gameFileExt,__FILE__)."\",\n".
						"asmUrl: \"".plugins_url($gameLocationPath.DS.$gameName.".asm.js".$gameFileExt,__FILE__)."\",\n".
						"memUrl: \"".plugins_url($gameLocationPath.DS.$gameName.".mem".$gameFileExt,__FILE__)."\",\n".
					"};\n".
				"</script>\n".
				"<script type='text/javascript' src=\"".plugins_url($gameLocationPath.DS."UnityLoader.js",__FILE__)."\"></script>";				
				//"<script src=\"".$selectedLocationLoader."\"></script>";	
					// $gameName.$gameVersionPath.RELEASE_SUFFIX.DS.$gameName
	return $game_page;
}

	function hs_unity3d_5_6_0($gameName, $gameDir, $width, $height, $gameFileName, $gameVersion) {
		$gameLocation = "";
		$gameLocationPath = "";
		// Build page based on Builds.html created in game Builds directory
		// Build Symbol to represent path of game. Give preference to Release
		//echo "checkPath:".plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir.":<br>";
		if (file_exists(plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir)) {
			$gameLocation = plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir;
			$gameLocationPath = GAME_DIR.DS.$gameDir;
		} else if (file_exists(plugin_dir_path( __FILE__ ).$gameDir)) {
			$gameLocation = plugin_dir_path( __FILE__ ).$gameDir;
			$gameLocationPath = $gameDir;
		} else {
			_e('Game not found', 'hs_unity3d_web_gl');
		}
		if (strlen($gameLocation) > 0 && strlen($gameLocationPath) > 0) {
		//_e(' width='.$width.' height='.$height.'<br>');
		$my_gameName = __($gameName, 'hs_unity3d_web_gl');
		$game_page = 
				"<link rel=\"shortcut icon\" href=\"".plugins_url(SUPPORT_DIR.DS."TemplateData_5_6_0/favicon.ico",__FILE__)."\">".
				"<link rel=\"stylesheet\" href=\"".plugins_url(SUPPORT_DIR.DS."TemplateData_5_6_0/style.css",__FILE__)."\">".
				"<script type='text/javascript' src=\"".plugins_url(SUPPORT_DIR.DS."TemplateData_5_6_0/UnityProgress.js",__FILE__)."\"></script>".
				"<script type='text/javascript' src=\"".plugins_url($gameLocationPath.DS."UnityLoader.js",__FILE__)."\"></script>".
				"<script>".
				"var gameInstance = UnityLoader.instantiate(\"gameContainer\", \"".plugins_url($gameLocationPath.DS.$gameName.".json",__FILE__)."\", {onProgress: UnityProgress});".
				"</script>".
				"<div class=\"webgl-content\">".
				"<div id=\"gameContainer\" style=\"width: ".$width."px; height: ".$height."px\">".
				"</div>".
				"<div class=\"footer\">".
				"<div class=\"webgl-logo\"></div>".
				"<div class=\"fullscreen\" onclick=\"gameInstance.SetFullscreen(1)\"></div>".
				"<div class=\"title\">".$my_gameName."</div>".
				"</div>".
				"</div>";	
		} else {
			_e('Short cut parameters do not match available games.', 'hs_unity3d_web_gl');
			$game_page = "";			
		}
		return $game_page;
	}

	function hs_unity3d_5_3_1A() {
		// Build page based on Builds.html created in game Builds directory
		// Build Symbol to represent path of game. Give preference to Release
		//echo "checkPath:".plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir.":<br>";
		if (file_exists(plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir)) {
			$gameLocation = plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir;
			$gameLocationPath = GAME_DIR.DS.$gameDir;
		} else if (file_exists(plugin_dir_path( __FILE__ ).$gameDir)) {
			$gameLocation = plugin_dir_path( __FILE__ ).$gameDir;
			$gameLocationPath = $gameDir;
		} else {
			_e('Game not found', 'hs_unity3d_web_gl');
		}
		//_e(' width='.$width.' height='.$height.'<br>');
		$my_gameName = __($gameName, 'hs_unity3d_web_gl');
		$game_page = 
				"<link rel=\"shortcut icon\" href=\"".plugins_url(SUPPORT_DIR.DS."TemplateData/favicon.ico",__FILE__)."\">".
				"<link rel=\"stylesheet\" href=\"".plugins_url(SUPPORT_DIR.DS."TemplateData/style.css",__FILE__)."\">".
				"<script src=\"".plugins_url(SUPPORT_DIR.DS."TemplateDataA/UnityProgress.js",__FILE__)."\"></script>".
				"<script src=\"".plugins_url($gameLocationPath.DS."Space-ShooterA-Release/UnityLoader.js",__FILE__)."\"></script>";
//				"<script>".
//				"var gameInstance = UnityLoader.instantiate(\"gameContainer\", \"".plugins_url($gameLocationPath.DS.$gameName.".json",__FILE__)."\", {onProgress: UnityProgress});".
//				"</script>".
//				"<div class=\"webgl-content\">".
//				"<div id=\"gameContainer\" style=\"width: ".$width."px; height: ".$height."px\">".
//				"</div>".
//				"<div class=\"footer\">".
//				"<div class=\"webgl-logo\"></div>".
//				"<div class=\"fullscreen\" onclick=\"gameInstance.SetFullscreen(1)\"></div>".
//				"<div class=\"title\">".$my_gameName."</div>".
//				"</div>".
//				"</div>";	
		return $game_page;
	}
	
	function hs_unity3d_2017_4_0f1($gameName, $gameDir, $width, $height, $gameVersion) {
		// Build page based on Builds.html created in game Builds directory
		// Build Symbol to represent path of game. Give preference to Release
		//echo "checkPath:".plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir.":<br>";
		//echo "checkPath:".plugin_dir_path( __FILE__ ).$gameDir.":<br>";
		$gameLocation ="";
		$gameLocationPath = "";
		if (file_exists(plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir)) {
			$gameLocation = plugin_dir_path( __FILE__ ).GAME_DIR.DS.$gameDir;
			$gameLocationPath = GAME_DIR.DS.$gameDir;
//			echo "1GameLoc:".$gameName.":".$gameLocation.":".$gameLocationPath.":<br>";
		} else if (file_exists(plugin_dir_path( __FILE__ ).$gameDir)) {
			$gameLocation = plugin_dir_path( __FILE__ ).$gameDir;
			$gameLocationPath = $gameDir;
//			echo "2GameLoc:".$gameName.":".$gameLocation.":".$gameLocationPath.":<br>";
		} else {
			_e('Game not found', 'hs_unity3d_web_gl');
		}
		if (strlen($gameLocation) > 0 && strlen($gameLocationPath) > 0) {
		//echo ('<br>path:'.$gameLocationPath.':<br>');
		$my_gameName = __($gameName, 'hs_unity3d_web_gl');
		$game_page = 
				"<link rel=\"shortcut icon\" href=\"".plugins_url(SUPPORT_DIR.DS."TemplateData_2017_4_0f1/favicon.ico",__FILE__)."\">".
				"<link rel=\"stylesheet\" href=\"".plugins_url(SUPPORT_DIR.DS."TemplateData_2017_4_0f1/style.css",__FILE__)."\">".
				"<script type='text/javascript' src=\"".plugins_url(SUPPORT_DIR.DS."TemplateData_2017_4_0f1/UnityProgress.js",__FILE__)."\"></script>".
				"<script type='text/javascript' src=\"".plugins_url($gameLocationPath.DS."UnityLoader.js",__FILE__)."\"></script>".
				"<script type='text/javascript'>".
				"var gameInstance = UnityLoader.instantiate(\"gameContainer\", \"".plugins_url($gameLocationPath.DS.$gameName.".json",__FILE__)."\", {onProgress: UnityProgress});".
				"</script>".
				"<div class=\"webgl-content\">".
				"<div id=\"gameContainer\" style=\"width: ".$width."px; height: ".$height."px\"></div>".
				"<div class=\"footer\">".
				"<div class=\"webgl-logo\"></div>".
				"<div class=\"fullscreen\" onclick=\"gameInstance.SetFullscreen(1)\"></div>".
				"<div class=\"title\">".$my_gameName."</div>".
				"</div>".
				"</div>";
		//echo $game_page;
		//	echo "<br>empty<br>";
		} else {
			_e('Short cut parameters do not match available games.', 'hs_unity3d_web_gl');
			$game_page = "";
		}
		return $game_page;
	}

	function hs_unity3d_game( $atts ) {
		
		/* Fill in default values for Application */
		$pull_unity_atts = shortcode_atts ( array(
					'src' => 'Roll-A-Ball',
					'width' => '480',
					'height' => '640',
					'u3dver' => '5.3.1'), $atts);
		/* Error message for missing parameter */
		if ( !$pull_unity_atts['src'] ) 	return "(missing unity src)";
		if ( !$pull_unity_atts['width'] ) 	return "(missing unity width)";
		if ( !$pull_unity_atts['height'] ) 	return "(missing unity height)";
		if ( !$pull_unity_atts['u3dver'] ) 	return "(missing unity version)";

		$width 	= $pull_unity_atts['width'];
		$height	= $pull_unity_atts['height'];
		$gameName = $pull_unity_atts['src'];

		$gameNameUpdated = preg_replace('/[^\x00-\x7f]/', '', $gameName);
		//	echo 'nam2:'.$gameNameUpdated.':<br>';
		//echo 'hex:'.bin2hex($result).':<br>';
		$gameVersion = $pull_unity_atts['u3dver'];
		// Test if dir exists and then check game_dir
		$gameVersionDir = str_replace(".","_",$gameVersion);
		if (strlen($gameVersion)>0) {
			$gameNameDir = $gameNameUpdated."_".$gameVersionDir.RELEASE_SUFFIX;
		} else {
			$gameNameDir = $gameNameUpdated.RELEASE_SUFFIX;
		}
//		echo "gameName:".$gameName.":<br>";
//		echo "gameNameDir:".$gameNameDir.":<br>";
//		echo "gameName_Width:".$width.":<br>";
//		echo "gameName_Height:".$height.":<br>";
//		echo "gameName_File:".$gameFileName.":<br>";
//		echo "gameName_version:".$gameVersion.":<br>";
	
		if ($gameVersion == '2017.4.0f1') {
//			echo "gameSel1:".$gameName.":".$gameNameDir.":".$gameVersion."<br>";
			$game_page = $this->hs_unity3d_2017_4_0f1($gameName, $gameNameDir, $width, $height, $gameVersion);	
		} elseif ($gameVersion == "5.6.0") {
//			echo "gameSel2:".$gameVersion."<br>";
			$game_page = $this->hs_unity3d_5_6_0($gameName, $gameNameDir, $width, $height, $gameVersion);
		} elseif ($gameVersion == "5.5.1") {
//			echo "gameSel3:".$gameVersion."<br>";
			$game_page = $this->hs_unity3d_5_5_1($gameName, $gameNameDir, $width, $height, $gameVersion);
		} else {
//			echo "gameSel4:".$gameVersion."<br>";
//			echo " 165: ".$gameNameUpdated.", ".$gameNameDir.", ".$width.", ".$height.", ".$gameFileName."<br>";
//			echo " 165: ".$gameNameUpdated.", ".$gameNameDir.", ".$width.", ".$height.", "."<br>";			
			$game_page = $this->hs_unity3d_5_3_1($gameNameUpdated, $gameNameDir, $width, $height, $gameVersion);
		}
		return $game_page;
	}

	// function for short code for displaying different games on same page
	function hs_unity3d_gamepage_v2 ( $attrs ) {
		global	$wpdb;
		global	$current_user;

		$current_user = wp_get_current_user();

		$current_game = 'Roll-A-Ball';
		$current_width = '500';
		$current_height = '600';
		$current_version = '5.3.1';
		$gamePage = '';
		
		if (isset($_POST['HS_SETTINGS_UNITY3D_TESTPAGE_NONCE']) && wp_verify_nonce($_POST['HS_SETTINGS_UNITY3D_TESTPAGE_NONCE'], 'HS_UNITY3D_TESTPAGE') != false) {
			if (isset($_POST['unity3dTest-form-submit'])) {
				if (isset($_POST['GameName'])) {
					$current_game = $_POST['GameName'];
				} else {
					$current_game = 'Roll-A-Ball';
				}
				if (isset($_POST['GameHeight'])) {
					$current_width = $_POST['GameHeight'];
				} else {
					$current_width = '500';
				}
				if (isset($_POST['singleWidth'])) {
					$current_height = $_POST['singleWidth'];
				} else {
					$current_height = '600';
				}
				if (isset($_POST['GameVersion'])) {
					$current_version = $_POST['GameVersion'];
				} else {
					$current_version = '5.3.1';
				}
			}
			$pathVersion = '_'.str_replace('.','_',$current_version);
			if (0 == strcmp($current_version, '2017.4.0f1')) {
				$gamePage = $this->hs_unity3d_2017_4_0f1($current_game, $current_game.$pathVersion.RELEASE_SUFFIX, $current_width, $current_height, $current_version);	
			} elseif ( 0 == strcmp($current_version,'5.6.0')) {
				//$gamePage = $this->hs_unity3d_5_6_0($gameList[$index][0], $gameList[$index][1], $gameList[$index][2], $gameList[$index][3], $gameList[$index][0], $gameList[$index][5]);		
				$gamePage = $this->hs_unity3d_5_6_0($current_game, $current_game.$pathVersion.RELEASE_SUFFIX, $current_width, $current_height, $current_game, $current_version);		
			} elseif ( 0 == strcmp($current_version,'5.5.1')) {
				$gamePage = $this->hs_unity3d_5_5_1($current_game, $current_game.RELEASE_SUFFIX, $current_width, $current_height, $current_version);
			} else {
				//$gamePage = $this->hs_unity3d_5_3_1('Roll-A-Ball', 'Roll-A-Ball_5_3_1-Release', $current_width, $current_height);
				$gamePage = $this->hs_unity3d_5_3_1($current_game, $current_game.RELEASE_SUFFIX, $current_width, $current_height, $current_version);
			}
		}		

		echo '<div class="wrap">';

		$my_buttonValue = __('Test Shortcode Values', 'hs_unity3d_web_gl');
		$my_testShortCode = __('Test Shortcode', 'hs_unity3d_web_gl');
		$my_availableGames = __('HoweScape Unity3d Available Games', 'hs_unity3d_web_gl');
		$widthList = Array("200","300","400","500","600","700","800");
		$heightList = Array("200","300","320","400","500","600",);
		$versionList = Array('5.3.1', '5.5.1','2017.4.0f1','5.6.0');

		$gameDir = plugin_dir_path( __FILE__ ).GAME_DIR.DS;
		$releaseTagZip = RELEASE_SUFFIX.".zip";
		$dirLen = strlen($gameDir);
		$releaseLen = strlen($gameDir);
		$releaseExt = strlen(RELEASE_SUFFIX);
			
		//get_screen_icon();
		echo('<h2>'.$my_availableGames.'</h2>');
		echo('<div class="divTable grayTable">');
		echo('<div class="divTableBody">');
		
		echo ('<div class="divTableRow">');
			echo ('<div class="divTableCell"><h3>'.$my_testShortCode.'</h3></div>');
		echo ('</div>');
		// Form for sample Shortcode with values
		echo ('<form id="" method="post">');
			wp_nonce_field('HS_UNITY3D_TESTPAGE', 'HS_SETTINGS_UNITY3D_TESTPAGE_NONCE', true, true);		
		echo ('<div class="divTableRow">');
				echo ('<div class="divTableCell">');
					echo ('[hs_unity3d_web_gl_game src=<select name="GameName">');
						foreach (glob($gameDir."*".RELEASE_SUFFIX, GLOB_ONLYDIR) as $gameNamePath) {
							$fullLen = strlen($gameNamePath);
							$gameName_ver = substr($gameNamePath, $dirLen, $fullLen - $releaseLen - $releaseExt);
							$gameVerIndex = strpos($gameName_ver,'_');
							$gameName = substr($gameName_ver, 0, $gameVerIndex);
							$gameVersion = substr($gameName_ver, $gameVerIndex+1);
							$gameVersion = str_replace('_','.',$gameVersion);
							//echo ("<br>gameVersion:".$gameVersion.'<br>');
							//echo ("<br>current_game:".$current_game.':'.$gameName.'<br>');
							//echo ("<br>gameName:".$current_version.':'.$gameVersion.'<br>');
//							if ( (strcmp($current_game, $gameName) == 0) &&
//								 (strcmp($current_version, $gameVersion) == 0)){
							if (strcmp($current_game, $gameName) == 0){
								$selected = 'selected="selected"';
							} else {
								$selected = '';
							}
							echo('<option value="'.$gameName.'" '.$selected.' >'.$gameName_ver.'</option>');
						}							
					echo ('</select>');
					echo (' height=<select name="GameHeight">');
						foreach ($heightList as $singleHeight) {
							if (strcmp($current_height, $singleHeight) == 0){
								$selected = 'selected="selected"';
							} else {
								$selected = '';
							}
							echo ('<option value="'.$singleHeight.'" '.$selected.' >'.$singleHeight.'</option>');
						}
					echo ('</select>');
					echo (' width=<select name="GameWidth">');
						foreach ($widthList as $singleWidth) {
							if (strcmp($current_width, $singleWidth) == 0){
								$selected = 'selected="selected"';
							} else {
								$selected = '';
							}
							echo ('<option value="'.$singleWidth.'" '.$selected.' >'.$singleWidth.'</option>');
						}
					echo ('</select>');
					echo (' u3dver=<select name="GameVersion">');
						foreach ($versionList as $singleVersion) {
							if (strcmp($current_version, $singleVersion) == 0){
								$selected = 'selected="selected"';
							} else {
								$selected = '';
							}
							echo ('<option value="'.$singleVersion.'" '.$selected.' >'.$singleVersion.'</option>');
						}
					echo ('</select>');
					echo (']');
				echo ('</div>');
		echo ('</div>');
		echo ('<div class="divTableRow">');
			echo ('<div class="divTableCell"><input type="submit" name="unity3dTest-form-submit" value="'.$my_buttonValue.'" class="button button-primary"/></di>');
		echo ('</div>');
		echo ('</form>');
		
		echo('</div>');
		echo('</div>');

	echo '</div>';
	
	echo '[hs_unity3d_web_gl_game src="'.$current_game.'"  height="'.$current_height.'"  width="'.$current_width.'"  u3dver="'.$current_version.'"]<br>';
	
	return $gamePage;
	}
	
	function hs_unity3d_gamepage ( $attrs ) {
		global	$wpdb;
		global	$current_user;
		
		$current_user = wp_get_current_user();
		
		if (isset( $_POST['select-game']) && !empty($_POST['select-game'])) {
			$index = $_POST['gameGroup'];
			//echo " selected: ".$index."<br>";
		} else {
			$index = 0;
			//echo "Not selected: ".$index."<br>";
		}
		$gameList = ARRAY(ARRAY('Roll-A-Ball','Roll-A-Ball-Release',500,600,'name','5.3.1'),
						ARRAY('Roll-A-Ball','Roll-A-Ball_5_5_1-Release',800,600,'name','5.5.1'),
						ARRAY('Space-Shooter','Space-Shooter-Release',500,800,'name','5.3.1'),
						ARRAY('DevBuild','DevBuild_2017_4_0f1-Release',320,200,'name','2017.4.0f1'),
						ARRAY('2048_V2','2048_V2_5_6_0-Release',600,600,'name','5.6.0'),
						ARRAY('Builds2','Builds2_5_6_1-Release',600,600,'name','5.6.0'),
						ARRAY('Roll-a-ball','Roll-a-ball_2017_4_0f1-Release',320,200,'name','2017.4.0f1'));					  
		// Get list of games in game_dir dir and to end of array
		$dir = plugin_dir_path( __FILE__ );

		$releaseTagZip = RELEASE_SUFFIX.".zip";
		$dirLen = strlen($dir);
		$releaseLen = 0;//strlen($gameDir);
		//$gc = 0;
		foreach (glob($dir.DS.GAME_DIR.DS."*$releaseTagZip", GLOB_ONLYDIR) as $gameNamePath) {
			$fullLen = strlen($gameNamePath);
			$gameName = substr($gameNamePath, $dirLen, $fullLen - $releaseLen - $dirLen);
			//echo "GameName: ".$gameName.":::<br>";
			//_e('Name:'.$gameName."<br>");
			$strPos = strpos($gameName,'_5_5_1-Release');
			$strPos = hs_unity3d_testGameNameForFormat($gameName, $Unity3D_Version);
			$rootDirSize = 10;
			if ($strPos === false) {
				$gameNameShort = substr($gameName, $rootDirSize, 8);
			} else {
				$strReleasePos = strpos($gameName, RELEASE_SUFFIX);
				$gameNameShort = substr($gameName, $rootDirSize, $strReleasePos-$strPos-1);
				//echo " gameName:".$gameName." shortName:".$gameNameShort." strPos:".$strPos." strRel:".$strReleasePos.":<br>";
				$gameVersion = substr($gameName, $strPos, $strReleasePos-$strPos);
				$gameVersion = str_replace("_",".",$gameVersion);
				$gameNameShort2 = substr ($gameName, 10);
			}
		
			//$gameVersion = '5.5.1';
			//_e('Name:'.$gc.":".$gameName.":".$gameNameShort."<br>");
			array_push($gameList, ARRAY($gameNameShort, $gameNameShort2, 500, 600, 'name', $gameVersion));
			//echo "GA:".$gameNameShort.":".$gameNameShort2.":".$gameVersion."<br>";
			//echo "<tr><td><input type='radio' name='removeGroup' value='".$gameName."' ></td><td colspan='2'>".$gameName."</td></tr>";
			//$gc = $gc + 1;
		}
		$my_text = __('Plugin Games:', 'hs_unity3d_web_gl');
		echo '<form id="" method="post">';
		wp_nonce_field('HS_UNITY3D_GAMES','HS_UNITY3D_GAMES_NONCE', true, true);
		echo '<div class="divTable grayTable">';
		echo '<div class="divTableBody">';
			echo '<div class="divTableRow">';
				echo '<div class="divTableCell"><h3>'.$my_text.'</h3></div>';							  
			echo '</div>';
		$gameIndex = 0;
		foreach ($gameList as $game) {
			if ($gameIndex == $index) {
				$checkedFlag = "checked='checked'";
			} else {
				$checkedFlag = "";
			}
			echo '<div class="divTableRow">';
				echo '<div class="divTableCell"><input type="radio" name="gameGroup" value="'.$gameIndex.'" '.$checkedFlag.'></div>';
				echo '<div class="divTableCell">'.$game[0].'</div>';
				echo '<div class="divTableCell">'.$game[5].'</div>';
			echo '</div>';							
			$gameIndex = $gameIndex + 1;
		}
		$my_buttonValue = __('Select Game', 'hs_unity3d_web_gl');
		echo '<div class="divTableRow">';
			echo '<div class="divTableCell"><input type="submit" name="select-game" value="'.$my_buttonValue.'" class="button button-primary"/></div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</form>';
		$rowVersion = $gameList[$index][5];
		//echo "SelectedRow: ".$rowVersion."<br>";
		//echo "index: ".$index."<br>";
		if (0 == strcmp($rowVersion, '2017.4.0f1')) {
			$gamePage = hs_unity3d_2017_4_0f1($gameList[$index][0], $gameList[$index][1], $gameList[$index][2], $gameList[$index][3], $gameList[$index][0], $gameList[$index][5]);	
		} elseif ( 0 == strcmp($rowVersion,'5.6.0')) {
			$gamePage = hs_unity3d_5_6_0($gameList[$index][0], $gameList[$index][1], $gameList[$index][2], $gameList[$index][3], $gameList[$index][0], $gameList[$index][5]);		
		} elseif ( 0 == strcmp($rowVersion,'5.5.1')) {
			$gamePage = hs_unity3d_5_5_1($gameList[$index][0], $gameList[$index][1], $gameList[$index][2], $gameList[$index][3], $gameList[$index][0], $gameList[$index][5]);
	//	} elseif ( 0 == strcmp($rowVersion, '5.3.1A')) {
//		$gamePage = hs_unity3d_5_3_1A($gameList[$index][0], $gameList[$index][1], $gameList[$index][2], $gameList[$index][3], $gameList[$index][0]);
		} else {
			//echo " 521: ".$gameList[$index][0].", ".$gameList[$index][1].", ".$gameList[$index][2].", ".$gameList[$index][3].", ".$gameList[$index][0]."<br>";
			//$gamePage = hs_unity3d_5_3_1($gameList[$index][0], $gameList[$index][1], $gameList[$index][2], $gameList[$index][3], $gameList[$index][0]);
			$gamePage = hs_unity3d_5_3_1($gameList[$index][0], $gameList[$index][1], $gameList[$index][2], $gameList[$index][3], $gameList[$index][0]);
		}
		//$gamePage = hs_unity3d_5_5_1($gameName, $gameNameDir, $width, $height, $gameFileName, $gameVersion);
		//$gamePage = hs_unity3d_5_3_1($gameName, $gameNameDir, $width, $height, $gameFileName);
	
		return $gamePage;
	}
	
	/**
	* This method is recursive to remove a directory and its contents.
	* This is necessary when a unity3d game is being extracted from the ZIP file. 
	* In order to ensure only the files from the zip are present.
	*/
	function recursiveRemoveDirectory($directory) {
		foreach(glob("{$directory}/*") as $file)
		{
			if(is_dir($file)) { 
				recursiveRemoveDirectory($file);
			} else {
				unlink($file);
			}
		}
		rmdir($directory);
	}
		
	function hs_unity3d_web_gl_admin() {
		$my_settingsPage = __('HoweScape Unity3d Game Settings', 'hs_unity3d_web_gl');
		$my_pageTitle = __('Unity3d Games', 'hs_unity3d_web_gl');
		add_options_page($my_pageTitle, $my_settingsPage, 'manage_options', 
					'hs_unity3d_web_gl_setting', array($this, 'hs_unity3d_admin_options_page'));
	}
	
	function hs_unity3d_admin_options_page($PageName) {
		global	$wpdb;
		global	$current_user;
		
		$widthList = Array("200","300","400","500","600","700","800");
		$heightList = Array("200","300","320","400","500","600",);
		$versionList = Array('5.3.1', '5.5.1','2017.4.0.0f1','5.6.0');
		
		if (isset($_POST['HS_SETTINGS_UNITY3D_EXTRACT_NONCE']) && wp_verify_nonce($_POST['HS_SETTINGS_UNITY3D_EXTRACT_NONCE'], 'HS_UNITY3D_EXTRACT') != false) {
			if (isset( $_POST['extract-game']) && !empty($_POST['extract-game'])) {
				// Get selected zip file to unzip into plugin
				$zipfilename = $_POST['extractGroup'];
				// Get file name with out extension
				$zipfilenameparts = explode("/",$zipfilename);
				$partscount = count($zipfilenameparts);
				$i = 0;

				$zipfileext = $zipfilenameparts[$partscount-1];
				//echo ("ext:+:".$zipfileext.":+:".$partscount."<br>");
				$zipfilepart = explode(".",$zipfileext);		
				
				// Build dir name to expanded game dir
				$expandedGameDir = plugin_dir_path(__FILE__).GAME_DIR.DS.$zipfilepart[0].DS;
				// Create / verify that game_dir exists
				if (!file_exists(plugin_dir_path(__FILE__).GAME_DIR)) {
					$makedirstatus = mkdir(plugin_dir_path(__FILE__).GAME_DIR);
				}
				if (file_exists($expandedGameDir)) {
					// Remove current files to create new ones.
					$this->recursiveRemoveDirectory($expandedGameDir);
				}
				//echo ("Mkdir: ".$expandedGameDir.": end<br>");
				$makedirstatus = mkdir($expandedGameDir);	// Create game dir
		
				WP_Filesystem();
				$mediaDir = wp_upload_dir();	// Get dir of media
				$zipfilename = $_POST['extractGroup'];

				$fileToUnZip = $mediaDir['basedir'].$zipfilename;

				$unzipfilestatus = unzip_file($fileToUnZip, $expandedGameDir);
	
				if ( is_wp_error($unzipfilestatus) ) {
					echo '<br> error Open: '.$fileToUnZip.' :End<br>';
					//echo '<br> error Open: '.zipFileErrMsg($Zip_Handle).' :End<br>';
				} else {
					//echo "<br>Files extracted <br>";
				}
			}
		} elseif (isset($_POST['HS_SETTINGS_UNITY3D_GAMES_NONCE']) && wp_verify_nonce($_POST['HS_SETTINGS_UNITY3D_GAMES_NONCE'], 'HS_UNITY3D_GAMES') != false) {
			if (isset( $_POST['remove-game']) && !empty($_POST['remove-game'])) {
				// Get selected zip file to unzip into plugin
				$dirfilename = $_POST['removeGroup'];
		
				$dir = plugin_dir_path( __FILE__ );
				//$fullDir = $dir.substr($dirfilename,0).DS."*";		
				$fullDir = $dir.DS.GAME_DIR.DS.substr($dirfilename,0).RELEASE_SUFFIX;		
				$fullDir = str_replace("\\",DS,$fullDir);	
				echo "fulldir:".$fullDir."<br>";
				$this->recursiveRemoveDirectory($fullDir);
				//recursiveRemoveDirectoryGame($fullDir);
			} 
		} elseif (isset($_POST['HS_SETTINGS_UNITY3D_TESTPAGE_NONCE']) && wp_verify_nonce($_POST['HS_SETTINGS_UNITY3D_TESTPAGE_NONCE'], 'HS_UNITY3D_TESTPAGE') != false) {
			if (isset( $_POST['unity3dTest-form-submit']) && !empty($_POST['unity3dTest-form-submit'])) {
				// short code parameters
				$selectedGame = $_POST['GameName'];
				$selectedHeight = $_POST['GameHeight'];
				$selectedWidth = $_POST['GameWidth'];
				$selectedVersion = $_POST['GameVersion'];
				// Open new tab with selected values
				echo " begin: ".$selectedGame." ".$selectedHeight." ".$selectedWidth." ".$selectedVersion." <br>";
			}
		}
		echo '<div class="wrap">';
		$my_pluginGames = __('Plugin Games:', 'hs_unity3d_web_gl');
		$my_availableGames = __('HoweScape Unity3d Available Games', 'hs_unity3d_web_gl');
		$my_buttonValue = __('Test Shortcode Values', 'hs_unity3d_web_gl');
		$my_testShortCode = __('Test Shortcode', 'hs_unity3d_web_gl');
		//get_screen_icon();
		echo('<h2>'.$my_availableGames.'</h2>');
		echo('<div class="divTable grayTable">');
		echo('<div class="divTableBody">');
			echo ('<div class="divTableRow">');
				echo ('<div class="divTableCell"><h3>'.$my_pluginGames.'</h3></div>');
			echo ('</div>');
			$gameDir = plugin_dir_path( __FILE__ ).GAME_DIR.DS;
			$releaseTagZip = RELEASE_SUFFIX.".zip";
			$dirLen = strlen($gameDir);
			$releaseLen = strlen($gameDir);
			$releaseExt = strlen(RELEASE_SUFFIX);
			//echo ("debug:".$gameDir."*".RELEASE_SUFFIX."<br>");
//
//			$my_mediaFileGames = __('Media File Games', 'hs_unity3d_web_gl');
//			echo '<div class="divTableRow"><div class="divTableCell"><h3>'.$my_mediaFileGames.'</h3></div></div>';
			echo '<form id="" method="post">';
			wp_nonce_field('HS_UNITY3D_GAMES', 'HS_SETTINGS_UNITY3D_GAMES_NONCE', true, true);
			foreach (glob($gameDir."*".RELEASE_SUFFIX, GLOB_ONLYDIR) as $gameNamePath) {
				$fullLen = strlen($gameNamePath);
				$gameName = substr($gameNamePath, $dirLen, $fullLen - $releaseLen - $releaseExt);
				echo ('<div class="divTableRow">');
					echo('<div class="divTableCellCenter"><input type="radio" name="removeGroup" value="'.$gameName.'" ></div>');
					echo('<div class="divTableCell">'.$gameName.'</div>');
				echo('</div>');
			}
			$my_removeGame = __('Remove Game', 'hs_unity3d_web_gl');
			$my_availableMediaFileGames = __('Available Media File games', 'hs_unity3d_web_gl');
			echo ('<div class="divTableRow">');
				echo('<div class="divTableCell"></div>');
				echo('<div class="divTableCell"><input type="submit" name="remove-game" value="'.$my_removeGame.'" class="button button-primary"/></div>');
			echo ('</div>');
			echo '</form>';
			echo ('<div class="divTableRow">');
				echo ('<div class="divTableCell"><h3>'.$my_availableMediaFileGames.'</h3></div>');
			echo ('</div>');
			$upload_dir = wp_upload_dir();
			$basedirLen = strlen($upload_dir['basedir']);
			echo '<form id="" method="post">';
			wp_nonce_field('HS_UNITY3D_EXTRACT', 'HS_SETTINGS_UNITY3D_EXTRACT_NONCE', true, true);
			foreach (glob($upload_dir['basedir'].DS."*", GLOB_ONLYDIR) as $gameNamePathYear) {
				$gameNamePathYearLen = strlen($gameNamePathYear);
				foreach (glob("$gameNamePathYear/*", GLOB_ONLYDIR) as $gameNamePathYearMonth) {
					foreach (glob("$gameNamePathYearMonth/*-Release.zip") as $gameNamePathYearMonthZip) {
						echo ('<div class="divTableRow">');
							echo ('<div class="divTableCellCenter"><input type="radio" name="extractGroup" value="'.substr($gameNamePathYearMonthZip,$basedirLen).'"/></div>');
							echo ('<div class="divTableCell">'.substr($gameNamePathYearMonthZip,$basedirLen).'</div>');
						echo ('</div>');
					}
				}
			}
			$my_extractGames = __('Extract games from media zip file into plugin for play', 'hs_unity3d_web_gl');
			$my_extractGameButton = __('Extract Game', 'hs_unity3d_web_gl');
			

		echo ('<div class="divTableRow">');
			echo('<div class="divTableCell"></div>');
			echo ('<div class="divTableCell"><input type="submit" name="extract-game" value="'.$my_extractGameButton.'" class="button button-primary"/></div>');
		echo ('</div>');
		echo '</form>';
				
		echo('</div>');
		echo('</div>');

	echo '</div>';
	}
	
	function hs_unity3d_web_gl_load_textdomain() {
		load_plugin_textdomain( 'wp-admin-motivation', false, dirname( plugin_basename(__FILE__) ) . '/language/' );
	}

	function load_js_css($hook) {
		wp_register_style ( 'hs_Unity3dGames',  plugins_url('include/hs_unity3d_style.css', __FILE__));
		wp_enqueue_style  ( 'hs_Unity3dGames' );	
	}
	
	public function __Construct() {	

		// Add Javascript and CSS for admin screens
		add_action('admin_init', array($this, 'load_js_css'));
	
        // Add Javascript and CSS for front-end display
		add_action( 'wp_enqueue_scripts',    array($this, 'load_js_css'));
		add_action( 'admin_enqueue_scripts', array($this, 'load_js_css'));
	
		// Install Admin Options
		add_action('admin_menu', array($this, 'hs_unity3d_web_gl_admin'));
		// Transation Link
		add_action('plugins_loaded', array($this, 'hs_unity3d_web_gl_load_textdomain'));
		// Unity Short Code
		add_shortCode('hs_unity3d_web_gl_game', 	array($this, 'hs_unity3d_game'));
		//add_shortcode('hs_unity3d_web_gl_gamepage', array($this, 'hs_unity3d_gamepage'));
		add_shortcode('hs_unity3d_web_gl_gamepage', array($this, 'hs_unity3d_gamepage_v2'));
	}
}

// Variable of plugin object
global	$hs_unity3d_webgl_obj;

// Create an instance of the class to kick off the whole thing
$hs_unity3d_webgl_obj = new hs_unity3d_web_gl();

?>