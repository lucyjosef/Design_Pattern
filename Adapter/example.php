<?php
include_once('Horoscope.php');
include_once('Meteo.php');
include_once('Adapter.php');

$horoscope_adapter = new Adapter('Horoscope', 'data');
//var_dump($horoscope_adapter->toJson());
print($horoscope_adapter->toYaml());
$horoscope_adapter->yaml_toFile("./horoscopeFile.txt");

$meteo_adapter = new Adapter('Meteo', 'data');
print($meteo_adapter->toYaml());
$meteo_adapter->yaml_toFile("./meteoFile.txt");

?>