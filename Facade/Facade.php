<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 16/01/18
 * Time: 14:25
 */

include_once('Meteo.php');
include_once('Horoscope.php');
include_once('Adapter.php');
include_once('Singleton.php');

/*
$my_facade = array(
    "horoscope" => new Adapter(new Horoscope(), "data"),
    "meteo" => new Adapter(new Meteo(), "data")
);
*/

class Facade
{
    private $horoscope;
    private $meteo;

    function __construct()
    {
        $this->_horoscope = Singleton::getInstance('Horoscope');
        $this->_horoscope = new Adapter($this->_horoscope, "data");

    }

    function get_horoscope($sign)
    {
        //calcul the astro sign
        return $this->horoscope->xml;
    }

    function get_day_info($day_date)
    {
        //compute
        return $this->meteo->xml;
    }

    function get_meteo()
    {
        //return $this->meteo->data;
    }

    function get_all_infos($user, $day_date)
    {
        //retrun horo for user and weather for day date
    }
}

$facade = new Facade();
var_dump($facade->get_horoscope("Poisson"));
//var_dump($facade->_horoscope->toYaml());

$faceMeteo = new Facade();
//var_dump($faceMeteo->_meteo->toJson());