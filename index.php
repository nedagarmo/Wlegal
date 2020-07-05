<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>HI .:: M&oacute;dulo Jur&iacute;dico ::.</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/login.style.css" />
        <link rel="stylesheet" type="text/css" href="stylesheets/general.style.css" />
        
        <script type="text/javascript" src="libraries/jquery/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="javascripts/login.form.functions.js"></script>
    </head>
    <body>
        <div id="allContent">
            <table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%">
                <tr>
                    <td align="center" valign="middle" height="100%" width="100%">

                        <div id="alertBoxes"></div>
                        <span class="loginBlock">
                            <span class="inner">
                                <?php
                                    if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
                                            echo '<div class="session_on">
                                                    Ya ha iniciado sesi&oacute;n &#124; Ser&aacute; redireccionado... <span class="timer" id="timer"  style="margin-left: 10px;"></span>
                                            </div>';
                                            echo "<script> $('#timer').fadeIn(300); setTimeout(function(){ location.href = 'system'},2500); </script>";
                                    } else {
                                        echo '<form method="post" action="">
                                                <table cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                                <td>Usuario:</td>
                                                                <td><input type="text" name="login_username" id="login_username" /></td>
                                                        </tr>
                                                        <tr>
                                                                <td>Contrase&ntilde;a:</td>
                                                                <td><input type="password" name="login_userpass" id="login_userpass" /></td>
                                                        </tr>
                                                        <tr>
                                                                <td colspan="2" align="right"><span class="timer" id="timer"></span><button id="login_userbttn">Entrar</button></td>
                                                        </tr>
                                                </table>
                                            </form>';
                                    }
                                ?>
                            </span>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>