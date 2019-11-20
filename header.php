<style type="text/css">
    <!--
    body {
        margin:0;
    }
    -->
</style>

<div class="banner">
    <img src="images/banner.jpg"    id="imagen1"  width="100%" height="400px"/>
</div>

<?php
@$_SESSION['login'];
error_reporting(1);
?>
</td>
<td>
    <?php
    if (isset($_SESSION['login'])) {
        echo "<div align=\"right\"><strong><a href=\"index.php\"> Inicio </a>|<a href=\"signout.php\">Salir</a></strong></div>";
    }
    ?>
</td>

</tr>

</table>
