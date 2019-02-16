<?php require_once('Connections/web.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "App.html";
  $MM_redirectLoginFailed = "TheGameofKnowledge.html";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_web, $web);
  
  $LoginRS__query=sprintf("SELECT NombreUsuario, Contrasena FROM usuario WHERE NombreUsuario='%s' AND Contrasena='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $web) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
body {
	background-color: #000000;
}
-->
</style></head>

<body style="color: rgb(0, 0, 0); background-color: rgb(255, 255, 204);" alink="#000099" link="#000099" vlink="#990099"><table style="text-align: left; width: 100%; height: 15%;" border="0" cellpadding="0" cellspacing="0">

  <tbody>
    <tr>
      <td style="vertical-align: top;"><img src="banner.png" style="width: 100%; height: 100%;" alt=""><br>
      </td>
    </tr>
  </tbody>
</table>

<table style="width: 100%; height: 100%;" border="0">

  <tbody>
    <tr>
      <td style="width: 15%; text-align: center;"><img src="publicidad2.gif" style="width: 100%; height: 100%;" alt=""></td>
      <td style="vertical-align: top; width: 70%;">
      <table style="text-align: left; width: 100%; margin-left: auto; margin-right: auto; height: 5%;" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td style="vertical-align: top; height: 1%; width: 100%;">
            <table style="text-align: left; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td style="vertical-align: top; width: 25%; height: 2%; background-color: rgb(255, 255, 204);"><div align="center">
                    <p><a href="ingresar.php">Registro</a></p>
                    </div></td>
                  <td style="vertical-align: top; width: 5%; height: 100%; text-align: center;"><a href="Políticas.html"><img src="logotipo.png" alt="" border="0" style="width: 53px; height: 54px;"></a></td>
                  <td style="vertical-align: middle; height: 100%; width: 20%; text-align: center;"><big><big><span style="font-family: Parisien Night;"><a href="TheGameofKnowledge.html">Acerca de nosotros</a></span><br>

                  </big></big></td>
                  <td style="vertical-align: middle; height: 100%; width: 10%; text-align: center;"><big><big><span style="font-family: Parisien Night;"><a href="App.html">Aplicación</a></span><br>

                  </big></big></td>
                  <td style="vertical-align: middle; text-align: center;"><big><big><span style="font-family: Parisien Night;">Casos de éxito</span></big></big><small><br>

                  </small></td>
                  <td style="vertical-align: top; width: 25%; background-color: rgb(255, 255, 204);"><div align="center"><a href="Comentarios.php"><br>
                    Comentarios                  </a></div></td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
        </tbody>
      </table>
      <table style="text-align: left; width: 100%; height: 90%; background-color: rgb(51, 51, 51);" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td style="vertical-align: top; height: 100%; width: 10%; background-color: rgb(51, 51, 51);"><br>
            </td>
            <td style="vertical-align: top; background-color: rgb(153, 153, 153);">
            <table style="text-align: left; width: 100%; height: 100%; background-color: rgb(51, 51, 51);" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td style="vertical-align: middle; font-family: Parisien Night; height: 50%; width: 50%; text-align: center;"><big><big><big><form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
  <label>
  <div align="center">Nombre de Usuario
    <input type="text" name="textfield" />
  </div>
  </label>
  <p align="center">
    <label>Contrase&ntilde;a
    <input type="password" name="textfield2" />
    </label>
    <label>
    <input type="submit" name="Submit" value="Enviar" />
    </label>
  </p>
</form><br>
                  </big></big></big></td>
                  <td style="vertical-align: middle; height: 50%; width: 50%; text-align: center;"><br>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: middle; height: 50%; width: 50%; color: white; text-align: center;"><big><br>
                  </big></td>
                  <td style="vertical-align: middle; height: 50%; width: 50%; text-align: center; background-color: rgb(51, 51, 51);"><big><big><big><big><big><big><big><span style="font-family: Parisien Night;"></span></big></big></big></big></big></big></big><br>
                  </td>
                </tr>
              </tbody>
            </table>
</td>
            <td style="vertical-align: top; height: 100%; width: 10%; background-color: rgb(51, 51, 51);"><br>
            </td>
          </tr>
        </tbody>
      </table>
      </td>
      <td style="vertical-align: top; width: 15%;"><img src="publicidad3.gif" style="width: 204px; height: 662px;" alt=""><br>
      </td>
    </tr>
  </tbody>
</table>


</body>
</html>
