<?php require ('header.php'); ?>
<title><?php echo PROJECT_TITLE; ?> - about</title>
</head>

<body>
    <table width="100%">
    <tr>
        <td class="empty">&nbsp;</td>
        <td rowspan="2">
            <h1>about</h1>
            <p>
                <?php echo PROJECT_TITLE; ?> is a tool for viewing 3D-models of the Aurora Gfx-engine on GTK+-capable systems. That is (hopefully) any UNIX and perhaps Windows and BeOS as well. It is developed under GNU/Linux and therefore best supported on that platform.<br />
                Aurora is used in the awesome game <a href="http://nwn.bioware.com">Neverwinter Nights</a>. Neverwinter Nights is a computer role-playing game set in the Forgotten Realms. It plays in the city of Neverwinter and its vicinity which lie north of Waterdeep and south of Icewind Dale. The game uses the 3rd edition ruleset of AD&amp;D.
            </p>
            <p>
                The program is written in C and uses the <a href="http://www.gimp.org">GIMP</a> toolkit <a href="http://www.gtk.org">GTK+ 2.0</a>. It makes also use of <a href="http://www.opengl.org">OpenGL 1.3</a> via <a href="http://www.student.oulu.fi/~jlof/gtkglarea/">GTK-GLArea</a> for the display of the models. It manages i18n with the help of <a href="http://www.gnu.org/software/gettext/gettext.html">GNU gettext</a>, having english (default) and german translations available.<br />
                You can do more or less the same things as in the original <a href="http://nwn.bioware.com/downloads/viewer.html">windows-version</a>, adding a neat automatic rotation of the camera around the model. Take a look at the <a href="screenshots.php">screenshots</a> to see more.
            </p>
            <p>
                Checkout the <a href="http://nwn.bioware.com/downloads/linuxclient.html">linux client for NWN</a>.
            </p>
        </td>
    </tr>
    <tr>
        <td width="20%">
            <?php require ('nav.php'); ?>
        </td>
    </tr>
    </table>
<?php require ('footer.php'); ?>
