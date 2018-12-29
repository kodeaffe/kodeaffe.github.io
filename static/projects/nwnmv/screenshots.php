<?php require ('header.php'); ?>
<title><?php echo PROJECT_TITLE; ?> - screenshots</title>
</head>

<body>
    <table width="100%">
    <tr>
        <td class="empty">&nbsp;</td>
        <td rowspan="2">
            <h1>screenshots</h1>

            <p>Currently, there are 3 screenshots to view.</p>

            <table class="bordered">
            <tr>
                <td class="td0">Main application view:</td>
            </tr>
            <tr>
                <td class="td1"><img src="shots/0.png" width="562" height="492" alt="application view" /></td>
            </tr>
            <tr>
                <td class="td0">Colorbox:</td>
            </tr>
            <tr>
                <td class="td1"><img src="shots/1.png" width="556" height="337" alt="colbox" /></td>
            </tr>
            <tr>
                <td class="td0">Aboutbox:</td>
            </tr>
            <tr>
                <td class="td1"><img src="shots/2.png" width="402" height="332" alt="aboutbox" /></td>
            </tr>
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
