<?php
    $menu = array ('about', 'changelog', 'screenshots', 'download', 'contact');
    $PHP_SELF = ereg_replace ('index.php', 'about.php', $PHP_SELF);
?>
<table class="bordered">
<tr>
    <th class="th0"><h1><?php echo PROJECT_TITLE; ?></h1></th>
</tr>
<tr>
    <td class="td0">
        <?php
            $output = '';
            foreach ($menu as $m)
            {
                $output .= "<a ";
                if (substr (basename ($PHP_SELF), 0, -4) == $m) $output .= 'class="highlight" ';
                $output .= "href=\"$m.php\">$m</a><br />\n";
            }
            $output .= "<a href=\"http://".$_SERVER['SERVER_NAME']."/\">home</a><br />\n";
            echo $output;
        ?>

        <br />

        <a href="http://validator.w3.org/check/referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0!" height="31" width="88" border="0" /></a><br />
        <a href="http://jigsaw.w3.org/css-validator/"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" border="0" /></a>
    </td>
</tr>
</table>
