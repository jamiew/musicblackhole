<?php
	//ini_set('display_errors', 1);
	//error_reporting(E_ALL);

	// generate a tag
	function link_to($text, $url) {
		print '<a href="'.$url .'" title="'.$text.'">'.$text.'</a>';
	}
	
	// paths
	$routes = array(
		'about' => 'http://tramchase.com/projects/blackhole/about', // FIXME?
   	'app' => 'http://tramchase.com/projects/blackhole/about',
		'app-download' => 'http://tramchase.com/projects/blackhole/about', // FIXME
		'webapp' => 'http://colossus.eyebeam.org/music-www',
		'radio' => 'http://jmw.mine.nu/radiation_radio.m3u'
	);
	
	// radiation radio SWF

	$radio = array(
		// 'url' => 'http://tramchase.com/projects/_media/blackhole/radiation-radio-player.swf';
		'swf' => 'radiation-radio-player.swf',
		'url' => 'http://jmw.mine.nu:8000/mp3',
		'width' => '280',
		'height' => '145',
	);
	
	
	$count = 1; // start here
	function audio_player($mp3, $title = '', $autostart = 'no') {
		$swf = 'audio-player.swf';
		$height = '24';
		$width = '290';

		// $id = urlencode($title);
		global $count;
		$count++;

		$flashvars = <<<HEREDOC
bg=0x686868&amp;
leftbg=0x5555aa&amp;
lefticon=0xeeeeee&amp;
rightbg=0xcccccc&amp;
rightbghover=0xdd6666&amp;
righticon=0x666666&amp;
righticonhover=0xffffff&amp;
text=0xffffff&amp;
slider=0xcc6666&amp;
track=0xFFFFFF&amp;
border=0x666666&amp;
loader=0x9FFFB8&amp;
loop=no&amp;
playerID={$count}&amp;
soundFile={$mp3}&amp;
autostart={$autostart}
HEREDOC;
		$flashvars = str_replace("\n", "", $flashvars);
				
		$out = <<<HEREDOC
			<object type="application/x-shockwave-flash" data="{$swf}" id="audioplayer{$count}" height="{$height}" width="{$width}">
				<param name="movie" value="{$swf}">
				<param name="FlashVars" value="{$flashvars}">
				<param name="quality" value="high">
				<param name="menu" value="false">
				<param name="wmode" value="transparent">
			</object>
HEREDOC;
		return $out;
	}	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

	<title>MUSIC BLACKHOLE ``` begin transmission</title>
	<meta name="author" content="Jamie Dubs">
	<meta name="keywords" content="music blackhole, music, audio, mp3, blackhole, jamie dubs, hausparty, archive, mixes, mixtapes, recordings, live recordings, live, demos, party, dance party, hip-hop, hiphop, rap, dnb, drum and bass, breakbeats, breaks, dance, funk, soul, jazz, electronic, dubstep, grime, electro, folk, rock, reggae">

	<!-- classy looks -->
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />

	<!-- voodoo magic -->
	<script language="JavaScript" src="audio-player.js"></script>
</head>

<body>
<div id="container">

<ul id="blackhole" class="satellites">

	<li id="about">
		<h1>MUSIC BLACKHOLE</h1>
		
		<div class="introduction">
			<span class="quote">The original passive music backup service</span> <br />
			<span class="stats">Storing <strong>79</strong> music collections totaling <strong>2,516 GB</strong></span>
		</div>

<p>
<span class="note">
<em>2008/Sep/19 -- </em> 
uncrackable upgrades to Apple's DAAP encryption scheme have sidelined the current version of the Blackhole. 
<script type="text/javascript">document.write('<a href="mailto:j+blackhole@tramchase.com">Contact me</a>')</script> about
access to the private network.
</span>
</p>
		
		<!--<p>
			Connect & share using <?php print link_to('wormhole.app', $routes['app']) ?>
		</p>-->
		
<!--
			Stream anywhere using the <?php print link_to('web interface', $routes['webapp']) ?>
			<br /><span class="note">user/pass = blackhole/blackhole</span>
-->
	<!--		Web interface down for maintenance. BRB. -->

<!--
		<p><span class="note">> contact: <script type="text/javascript">document.write('<a href="mailto:j+blackhole@tramchase.com">jamie dubs</a></span></p>
-->		

		<p>
			<?php print link_to('radiation radio, MP3 128k', $routes['radio']) ?> <!-- was h2 -->
			<br /><span class="quote">Now Playing:</span> 

<!--			<big><strong>Jdubs live at Politricks Industries, Brooklyn</strong></big> -->
			random particle jukebox

			<?php print audio_player($radio['url'], 'Radiation Radio', 'yes') ?>
			
			<!-- 
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0">
				<param name="movie" value="<?php print $radio['url'] ?>" />
				<param name="quality" value="high" />
				<embed src="<?php print $radio['swf'] ?>" quality="high" width="<?php print $radio['width'] ?>" height="<?php print $radio['height'] ?>" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
			</object>
			-->
		</p>
		

	</li>

<!--
	<li id="login">
		<a href="http://tramchase.com/projects/blackhole/login">Login/Register</a> <br />
	</li>

	<li id="apps">
		<h2><?php print link_to('Download <br /> wormhole', $routes['app-download']) ?></h2>
		<span class="note">(<?php print link_to('more info', $routes['app']) ?>)</span>
	</li>
	
	<li id="browse">
		<h2><a href="http://colossus.eyebeam.org/music-www/">Browse/stream <br />webapp</a></h2>
		<span class="note">user/pass = blackhole/blackhole</span>
	</li>

	<li id="radio">
		...
	</li>
-->


</ul> <!-- /#satellites -->

<!--
<ul id="shows" class="satellites">
	<li style="width: 100px;"><h2 style="border: 1px solid #f5f5f5; border-left: 0; border-right: 0; padding: 2px 0;">ALLIES</h2></li>

	<li id="politricks">
		<h2><a href="http://ptricks.net">Politricks</a></h2>
		<span class="quote">hip-hop, dance & breakbeats by Jdubs</span>
		<?php //print audio_player('audio/blackhole_intro.mp3', 'Blackhole Intro') ?>
		
	</li>
	
	<li>
		<h2><a href="http://fffff.at/serious-business">Serious Bu$iness</a></h2>
		<span class="quote">FAT DJ crew, Brooklyn NYC</span>
	</li>

	<li>
		<h2><a href="http://letsgetsserious.net">LGS/Downtown Affair</a></h2>
		<span class="quote">Disco music by Mike McGill</span>
	</li>

	<li>
		<h2><a href="http://radiofriendly.blogspot.com">Radio Friendly</a></h2>
		<span class="quote">Funk & rare groove by Alex Biederman</span>
	</li>
</ul>
-->



<!-- ascii art begins here -->
<font size="-3">
