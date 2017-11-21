<?php  

$latitudea = $_GET['latitudea'];
$longitud = $_GET['longitud'];




$geocode =file_get_contents('http://maps.google.com/maps/api/geocode/json?latlng='.$latitudea.','.$longitud.'&sensor=false');


$output=json_decode($geocode);

echo 'Kalea: '.$output->results[0]->address_components[1]->long_name.'<br>';
echo 'Kodigo Postala: '.$output->results[0]->address_components[6]->long_name.'<br>';
echo 'Herria: '.$output->results[0]->address_components[2]->long_name.'<br>';
echo 'Probintzia: '.$output->results[0]->address_components[3]->long_name.'<br>';
echo 'Autonomia: '.$output->results[0]->address_components[4]->long_name.'<br>';
echo 'Estatua: '.$output->results[0]->address_components[5]->long_name.'<br>';



?>
