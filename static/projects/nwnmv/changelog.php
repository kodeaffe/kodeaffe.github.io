<?php require ('header.php'); ?>
<title><?php echo PROJECT_TITLE; ?> - changelog</title>
</head>

<body>
    <table width="100%">
    <tr>
        <td class="empty">&nbsp;</td>
        <td rowspan="2">
            <h1>changelog</h1>
            <p>This is the changelog of the <?php echo PROJECT_TITLE; ?>. There did not happen very much so far. :)</p>
			
            <table class="bordered">
            <tr>
                <th class="th0">Version</th>
                <th class="th0">Release Date</th>
                <th class="th0">Info</th>
            </tr>
            <tr>
                <td class="td1c"><a name="v0.2"></a>0.2</td>
                <td class="td1c">2002-10-03</td>
                <td class="td1"><ul>
                    <li>gui slightly modified (logo dropping, etc.)</li>
                    <li>model files are parsed and the model is translated into an object in memory</li>
                    <li>development stopped after holidays</li>
                </ul></td>
            </tr>
            <tr>
                <td class="td0c"><a name="v0.1"></a>0.1</td>
                <td class="td0c">2002-08-25</td>
                <td class="td0"><ul>
                    <li>initial release without support for Aurora</li>
                </ul></td>
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
