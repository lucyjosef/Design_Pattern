<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 15/01/18
 * Time: 15:40
 */

class nameFactory
{

    function __construct($firstname, $name)
    {
        $this->firstname = $firstname;
        $this->name = $name;
    }

    static function fromFirstName($firstname)
    {
        //useless opening file
        fopen('./names.json', 'r');
        $json_content = file_get_contents('./names.json');
        //parse json to array
        $json_array = json_decode($json_content, true);

        //explore array
        foreach ($json_array as $key=>$value) {
            foreach ($value as $subKey) {
                if($firstname === $subKey)
                    $name = $key;
            }
        }

        echo $firstname . " fait partie de la team " . $name . "\n";

        return new self($firstname, $name);
    }

    static function conv_json_to_string($file)
    {
        //useless opening file again
        fopen($file, 'r');
        $json_content = file_get_contents($file);
        //parse json to array
        $json_array = json_decode($json_content, true);
        var_dump($json_array);
        //conv json to string with implode
        $json_string = "";
        foreach ($json_array as $key=>$value) {
            //$json_string .= $key . " ";
            foreach ($value as $subvalue) {
                //echo $subvalue;
                $json_string .= $key . " " . $subvalue . " ";
            }
        }
        //$json_string = implode(',', $json_array);
        return $json_string;
    }
}

$var_dump_me = nameFactory::fromFirstName("patrick");
$var_dump_me_too = nameFactory::fromFirstName("gertrude");
//self::fromFirstName("jaqueline");

//var_dump($var_dump_me);
//var_dump($var_dump_me_too);

$conv_me_to_string = nameFactory::conv_json_to_string("./names.json");
//self::fromFirstName("jaqueline");

var_dump($conv_me_to_string);
echo $conv_me_to_string;

?>