<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 16/01/18
 * Time: 09:29
 */


class Adapter
{
    function __construct($class_name, $attribute_name="raw")
    {
        $this->class_name = $class_name;
        $this->attribute_name = $attribute_name;
        $this->instance = new $class_name;
    }

    function xml2array ( $xmlObject, $out = array () )
    {
        foreach ( (array) $xmlObject as $index => $node )
            $out[$index] = ( is_object ( $node ) || is_array($node) ) ? self::xml2array($node) : $node;

        return $out;
    }

    function toJson()
    {
        $this->xml = new SimpleXMLElement($this->instance->{$this->attribute_name});
        return json_encode($this->xml);
    }

    function fromJson($json_var)
    {
        return json_decode($json_var);
    }

    function toYaml()
    {
        $yaml_string = "";
        $this->xml = new SimpleXMLElement($this->instance->{$this->attribute_name});
        $yaml_array = $this->xml2array($this->xml);

        foreach($yaml_array as $value) {
            $yaml_string = $value;
        }

        //var_dump($json_string);
        return yaml_emit($yaml_string, YAML_UTF8_ENCODING);
    }

    function yaml_toFile($fileName)
    {
        $this->fileName = $fileName;
        yaml_emit_file($fileName, self::toYaml());
        echo "Also find your YAML content in the following repository : " . $fileName ."\n";
    }

}
