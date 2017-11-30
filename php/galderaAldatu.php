<?php
	
include 'configEzarri.php';


 $aldatu=false;
 $sartuDa=false;

 $indizea= trim($_GET['indizea']);
 
  if(isset($_GET['galdera'])){
	  $galdera= trim($_GET['galdera']);
	  $sql = "UPDATE questions SET galdera='$galdera' WHERE id='$indizea';";
	  $niremysqli->query($sql);
	}
	  
  if(isset($_GET['zuzena'])){
	  $zuzena= trim($_GET['zuzena']);
	  $sql = "UPDATE questions SET zuzena='$zuzena' WHERE id='$indizea';"; 
		$niremysqli->query($sql);
	 }
	 
  if(isset($_GET['okerra1'])){
	  $okerra1= trim($_GET['okerra1']);
	  $sql = "UPDATE questions SET okerra1='$okerra1' WHERE id='$indizea';"; 
		$niremysqli->query($sql);
	}
	
  if(isset($_GET['okerra2'])){
	  $okerra2= trim($_GET['okerra2']);
	  $sql = "UPDATE questions SET okerra2='$okerra2' WHERE id='$indizea';"; 
		$niremysqli->query($sql);
	  }
	  
  if(isset($_GET['okerra3'])){
	  $okerra3= trim($_GET['okerra3']);
	  $sql = "UPDATE questions SET okerra3='$okerra3' WHERE id='$indizea';"; 
		$niremysqli->query($sql);
	  }
	  
  if(isset($_GET['zailtasuna'])){
	  $zailtasuna= trim($_GET['zailtasuna']);
	  $sql = "UPDATE questions SET zailtasuna='$zailtasuna' WHERE id='$indizea';"; 
		$niremysqli->query($sql);	
	  }
	  
  if(isset($_GET['arloa'])){
	  $arloa= trim($_GET['arloa']);
	  $sql = "UPDATE questions SET arloa='$arloa' WHERE id='$indizea';"; 
		$niremysqli->query($sql);
	  }
 


 

$niremysqli->close();

?>