=== HoweScape Unity3d WebGL ===
Contributors: pthowe
Donate Link: http://HoweScape.com
Tags:
Requires at least: 4.0.0
Tested up to: 5.2.2
Stable tag: 8.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin to allow the inclusion of a Unity3d WebGL application. A short code is created which can displayed.

== Description ==

The Unity3d WebGL support creates a directory of files. 
This is not convent to load  on your WordPress web site. 
This plugin takes the "Release" directory from your game and places it 
inside the plugin. When compiling the output directory need to be "Builds_WebGL". 
This plugin can then be referenced from with a short code. 
The parameters in the short code are the game name and the width and height.

ie. [hs_unity3d_web_gl_game src="Roll-A-Ball" height=500 width=600]

To extend the support for Unity3d to version 5.5.1 an additional parameter has been added. 
This parameter allows the specification of a version. The version support is 5.5.1 or the original version supported by the plugin. (ie. original version 5.3.1)
The Unity3d version 5.5.1. creates a directory  "Development". This is what I have uploaded in the included example. (ie. Roll-A-Ball-5_5_1-Release)
The short code  is now looks like the following example.

ie. [hs_unity3d_web_gl_game src="Roll-A-Ball" height=500 width=600 u3dver=5.5.1]

In reviewing the latest verion of Unity3d I noticed that the file organization for the WebGL has been updated again. 
With this update there are now 3 supported version 5.3.1, 5.5.1 and 5.6.0. When using the newest version you would have a short code like the following.

ie. [hs_unity3d_web_gl_game src=Roll-A-Ball height=500 width=600 u3dver=5.6.0]

All other features should work as before. There are other features being considered please let me know if you desire anything functionality.

With the addition of the settings page it is now possible to place 
the release directory in a zip file. (ie. &lt;gamename&gt;-Release.zip)
Once the file is uploaded the setting page for the plugin will allow extraction 
of the files into a location which the short code can locate. When naming games from version 5.5.1 you will need 
to include the version number. (ie. &lt;gamename&gt;-5_5_1-Release.zip) With this version place the 
files from the Development directory in the zip file. For the latest verion it is the same. (ie. &lt;gamename&gt;-5_6_0-Release.zip)

In the process of doing the latest update I wanted to switch between the different games to verify that everything was working. 
To make this task simpler I added a short code which displays a list of the available games and allows the selection of a game. 
The major reason for the addition was game development. Since I thought it might be useful I have added it to the plugin. 

ie. [hs_unity3d_web_gl_gamepage]

If you use this short code with just the plugin you will have three games. Two versions of the  Roll-A-Ball sample game and the space-shooter sample game. 
There are 2 ways games can be added one is making them part of the plugin. The second is as a zip file which gets uploaded to the media directory. 
Once uploaded the uploaded game zip file can be expanded into the plugin from the settings page. There is also a delete option on the settings page. 
It can remove any game. The page now displays the short code with the parameters you selected. The goal of this display is to assist people in getting a short 
code which they can put on there page and display the game. 

Most video games have a high score list. To support a high score list on your web site I have have added 2 short codes. 

ie. [hs_unity3d_high_score] - on page to display scores
	[hs_unity3d_addGameScore] - on page to add score
	
	
The first is a short code which displays a high score list which consists of the persons name, score, game name, Icon representing the platform. 
The second is a short code which when placed on a page allows that page can accept updates. The page needs to be published so it can be located. 
The updates are stored in a table in the database. An additional table 
is created which contains the information on possible platforms ids and graphics. 
Settings have been added to allow you to supply the page name which accepts 
the game score. A second is the number of results to be displayed on a page. They URL will have the following general form

"http://<yourwebsite>/index.php/<pagename>/?name=tom&score=5656&game=9&security=123456"

The following information is returned. A HTML page with a table.


== Installation == 

<h4>From your WordPress dashboard</h4>
<ol>
<li>Visit 'Plugins > Add New'</li>
<li>Search for 'HoweScape Unity3d WebGL'</li>
<li>Activate HoweScape Unity3d WebGL from your Plugins page. </li>
</ol>

<h4>From WordPress.org</h4>
<ol>
<li>Download HoweScape Unity3d WebGL.</li>
<li>Upload the 'HoweScape Unity3d WebGL' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)</li>
<li>Activate HoweScape Unity3d WebGL from your Plugins page. </li>
</ol>

== Frequently Asked Questions ==

<ol>
<li>Can I use this plugin with my own Unity3d game?
	<p>Yes Take the release directory from Unity3d Build directory and place in the plugin directory. Prefix the release directory with the name of the game ending in "-Release" The game name then is used in the short code.</p>
</li>
<li>Can there be multiple games in the plugin?
<p>Yes. Each game is in its own &lt;gamename&gt;-Release directory</p>
<p>There are currently three games in the delivered plugin.</p></li>
<li>Can the games be placed outside the plugin?
<p>Yes, In the media directory</p>
<p>The settings page allows games to be extracted into the plugin.</p></li>
<li>How do I move the ball?
<p>The arrow keys allow movement of the ball to collect the cubes.</p></li>
<li>How to play space Shooter. 
<p>Arrow keys move ship. 
<p>Mouse button fires gun. Mouse needs to be in window.</li>
<li>My game does not work I get an error message. 
<p>"An error occured running the Unity content on this page."</p>
<p>"The error was: uncaught exception: incorrect header check"</p>
When I compiled my Unity3d game I used "Builds_WebGL" as the directory. 
This seems to be a requirement of the plugin.</li>
<li>For version 5.5.1 and 5.6.0 the game name restriction.
<p>With these versions the restriction on build directory has been removed. The names needs to not contain spaces.</p></li>
<li>Does the plugin support a High Score list?
<p>Yes, shortcode [hs_unity3d_high_score]</p></li>
<li>How does the game add a high score to the table?
<p>The game needs to sent a URL transaction with the necessary parameters to the plugin. 
The web POST transaction would look: "http://<yourwebsite>/index.php/<pagename>/?name=tom&score=5656&game=9&security=123456"</p>
</li>
</ol>

== Screenshots ==

1. Screen capture of Roll-A-Ball game from unity3d.com
2. Screen capture of Roll-A-Ball game with updates to colors
3. Screen capture of Space-Shooter game from unity3d.com tutorials
4. Screen capture of error message caused by building to incorrect directory


== Changelog ==
<h4>1.1.0</h4>
<ul>
<li>Updated tested version of WordPress to 5.2.2. Required minor updates to support changes in PHP version and WordPress</li>
</ul>
<h4>1.0.1</h4>
<ul>
<li>Restructured the application to use the Class model</li>
<li>Updated the shortcode hs_unity3d_web_gl_gamepage to allow selection of the short code values from drop down lists. 
This allows you to test a short code configuration with different values.</li>
</ul>
<h4>0.3.1</h4>
<ul>
<li>Added support for Unity3d 5.5.1. This requires adding a parameter to the Short code.</li>
<li>This parameter is not required for Web GL games which have a .htaccess file</li>
<li>Example of parameter u3dver=5.5.1</li>
<li>At this time there is no other values which are supported.</li>
<li>The template data directory was also added to support version 5.5.1. </li>
<li></li>
</ul>

<h4>0.1.1</h4>
<ul>
<li>Added Settings page. This provides three groups of information. 
The first group is a list of the Unity3d games in the plugin. 
The second lists is of Unity3d games expanded into the plugin.
The third is a list of zip files in the media directory which the plugin recoginise as Unity3d gamems</li>
<li>The extract button takes the identified zip file and expands the game into a subdirectory.</li>
<li>Updated processing to to include search to include expanded games.</li>
</ul>

<h4>0.2</h4>
<ul>
<li>Update file Calling to use recommended</li>
<li>Removed "Created with unity" link from plugin</li>
</ul>

<h4>0.1</h4>
<ul>
<li>Original Release</li>
</ul>

== Upgrade Notice ==

Third update to add support for 5.6.0. Also added short code for list of games.

Second update to add settings page and support extract of game from media zip file.

First update to correct file location references. Removed "Created with Unity" link.

Being initial release there is no notice

== Arbitrary section ==

== A brief Markdown Example ==

[hs_unity3d_web_gl_game src="Roll-A-Ball" height=500 width=600]