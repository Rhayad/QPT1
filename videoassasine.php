<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

    $pagetitle = "Lex Corii";

    include "functions.php";	
	include "header.php";
?>

    
<h1>Die Assasine - Video</h1>
    
<table> 
    <tr>
    	<td style="width:620px; border:none" >

          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="550" height="400" id="FlashID" title="test">
            <param name="movie" value="assasine.swf" />
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="6.0.65.0" />
            <!-- Dieses param-Tag fordert Benutzer von Flash Player 6.0 r65 und höher auf, die aktuelle Version von Flash Player herunterzuladen. Wenn Sie nicht wünschen, dass die Benutzer diese Aufforderung sehen, löschen Sie dieses Tag. -->
            <param name="expressinstall" value="Scripts/expressInstall.swf" />
            <!-- Das nächste Objekt-Tag ist für Nicht-IE-Browser vorgesehen. Blenden Sie es daher mit IECC in IE aus. -->
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="assasine.swf" width="550" height="400">
              <!--<![endif]-->
              <param name="quality" value="high" />
              <param name="wmode" value="opaque" />
              <param name="swfversion" value="6.0.65.0" />
              <param name="expressinstall" value="Scripts/expressInstall.swf" />
              <!-- Im Browser wird für Benutzer von Flash Player 6.0 und älteren Versionen der folgende alternative Inhalt angezeigt. -->
              <div>
                <h4>F&uuml;r den Inhalt dieser Seite ist eine neuere Version von Adobe Flash Player erforderlich.</h4>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Adobe Flash Player herunterladen" width="112" height="33" /></a></p>
              </div>
              <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
      </object></td>
	</tr>
</table>


<?php include "footer.php"; ?>
