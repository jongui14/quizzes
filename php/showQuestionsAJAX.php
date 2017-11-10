<?php

include 'configEzarri.php';

$eposta = trim($_GET['eposta']);
$ema=$niremysqli->query("select * from questions where eposta='$eposta'");


echo '<table border=1><tr><th>ID</th><th>EPOSTA</th><th>GALDERA</th>
<th>ZUZENA</th><th>OKERRA1</th><th>OKERRA2</th><th>OKERRA3</th><th>ZAILTASUNA</th><th>ARLOA</th> </tr>';

while($row=$ema->fetch_object() ){
	echo '<tr>'
	.'<td>'.$row->id.'</td>'
	.'<td>'.$row->eposta.'</td>'
	.'<td>'.$row->galdera.'</td>'
	.'<td>'.$row->zuzena.'</td>'
	.'<td>'.$row->okerra1.'</td>'
	.'<td>'.$row->okerra2.'</td>'
	.'<td>'.$row->okerra3.'</td>'
	.'<td>'.$row->zailtasuna.'</td>'
	.'<td>'.$row->arloa.'</td>'
	.'</tr>';
}

echo '</table>';

$ema->close();
$niremysqli->close();


?>