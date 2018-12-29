<?php
	$releases = array (
					array ('file' => 'kvorbiscomment-0.1.tar.gz', 'date' => '2002-01-20', 'clog' => '0.1')
	);
	readfile ("header.inc"); 
?>
<title>KVorbisComment - download</title>
</head>

<body>
	<table width="95%">
	<tr>
		<td valign="top" width="25%">
			<?php require ("nav.inc"); ?>
		</td>
		<td valign="top">
			<h1>download</h1>
				to run this program you need the following software installed (dev-/sourcepackages):
				<ul>
					<li><a href="http://www.trolltech.com/developer/download/qt-x11.html" target="_blank">QT2</a>, version 2.3 or above</li>
					<li><a href="http://www.kde.org/download.html" target="_blank">KDE2</a>, version 2.2.1 or above</li>
					<li><a href="http://www.vorbis.com/download.psp" target="_blank">libogg</a>, version 1.0RC3 or above</li>
					<li><a href="http://www.vorbis.com/download.psp" target="_blank">libvorbis</a>, version 1.0RC3 or above</li>
				</ul>
				older versions may work, too. YMMV.<br /><br />

				latest is: <a href="<?php echo $releases[0]['file']; ?>"><?php echo $releases[0]['file']; ?></a>
			<br />
				older releases:<br />
				<table cellspacing="10px">
				<?php 
					$output = '';
					foreach ($releases as $release)
					{
						$output .= "<tr>\n".
								"\t<td>".$release['date']."</td>\n".
								"\t<td><a href=\"".$release['file']."\">".$release['file']."</a></td>\n".
								"\t<td><a href=\"history.php#ver".$release['clog']."\">CHANGELOG</a></td>\n".
								"</tr>\n";
					}
					echo $output;
				?>
				</table>
		</td>
	</tr>
	</table>

<?php require ("footer.inc"); ?>
