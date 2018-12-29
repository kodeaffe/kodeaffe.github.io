<?php
	readfile ("header.inc"); 
?>
<title>KVorbisComment - about</title>
</head>

<body>
	<table width="95%">
	<tr>
		<td valign="top" width="25%">
			<?php require ("nav.inc"); ?>
		</td>
		<td valign="top">
			<h1>about</h1>
				this software is a tool for editing the comments of an Ogg Vorbis file.<br />
				it is a graphical version of &quot;vorbiscomment&quot; from the vorbis-tools package.
				the GUI is written in C++ and benefits from the classes provided by
				<a href="http://www.kde.org" target="_blank">KDE2</a> and
				<a href="http://www.trolltech.no" target="_blank">QT2</a>.<br /><br />

				Ogg Vorbis is an audio format, somewhat comparable to MP3, AAC, WMA and the alikes, but in contrast to these, it is really free (and open source). go to the 
				<a href="http://www.vorbis.com" target="_blank">homepage of Vorbis</a> to learn more about it.<br />
				KVorbisComment is free, too. therefore, it is licensed under <a href="http://www.gnu.org/licenses/gpl.html" target="_blank">GPL</a>.
		</td>
	</tr>
	</table>

<?php require ("footer.inc"); ?>
