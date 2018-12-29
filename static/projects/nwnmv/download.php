<?php
    $releases = array (
        array ('nwnmv_0.2-1_i386.deb', '2002-10-10', '28', '0.2-1'),
        array ('nwnmv-0.2.tar.gz', '2002-10-03', '168', '0.2'),
        array ('nwnmv-0.1.tar.gz', '2002-08-26', '168', '0.1')
    );
    require ('header.php');
?>
<title><?php echo PROJECT_TITLE; ?> - download</title>
</head>

<body>
    <table width="100%">
    <tr>
        <td class="empty">&nbsp;</td>
        <td rowspan="2">
            <h1>download</h1>

            <p>To run this program you need the following software installed (dev-/sourcepackages):</p>
            
            <ul>
                <li><a href="http://www.gnu.org/software/gettext/gettext.html">GNU gettext</a></li>
                <li><a href="http://www.gtk.org">GTK+ 2.0</a></li>
                <li><a href="http://www.student.oulu.fi/~jlof/gtkglarea/">GTKGL-Area 2.0</a></li>
                <li>Some kind of OpenGL-implementation: checkout your gfx-vendor or do it in software via <a href="http://mesa3d.sourceforge.net/">mesa</a>.</li>
            </ul>
            <p>After downloading, the well-known &quot; ./configure &amp;&amp; make &amp;&amp; make install &quot; should install the package. See the README for additional info how to run it. And please report any problems, i am a bloody beginner here. :)</p>
            <p>Users of <a href="http://www.debian.org">Debian GNU/Linux</a> should try the deb-package provided below.</p>

            <p>Do not forget to download the models from the <a href="http://nwn.bioware.com/downloads/viewer.html">Neverwinter Nights Website</a>.</p>

            <table class="bordered">
            <tr>
                <th class="th0" colspan="4" align="left">Releases:</th>
            </tr>
            <?php 
                $output = '';
                $tdType = 0;
                foreach ($releases as $release)
                {
                    $output .= "<tr>\n".
                        "\t<td class=\"td".$tdType."c\">".$release[1]."</td>\n".
                        "\t<td class=\"td".$tdType."c\"><a href=\"files/".$release[0]."\">".$release[0]."</a></td>\n".
                        "\t<td class=\"td".$tdType."c\">".$release[2]."k</td>\n".
                        "\t<td class=\"td".$tdType."c\"><a href=\"changelog.php#v".substr ($release[3], 0, 3)."\">CHANGELOG</a></td>\n".
                        "</tr>\n";
                    $tdType = ($tdType + 1) % 2;
                }
                echo $output;
            ?>
            </table>
        </td>
    </tr>
    <tr>
        <td width="20%">
            <?php require ('nav.php'); ?>
        </td>
    </tr>
    </table>
<?php require ('footer.php'); ?>
