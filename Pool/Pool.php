<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 16/01/18
 * Time: 16:09
 */


class Pool
{
    public $pool = array();
    public $popped = array();

    function __construct($size, $className)
    {
        for($i=0; $i<$size; $i++){
            array_push($this->pool, new $className("$className$i"));
        }
    }

    function pull()
    {
        $object = array_pop($this->pool);
        array_push($this->popped, $object);
        return $object;
    }

    function push($object)
    {
        if(in_array($object, $this->popped)){
            array_push($this->pool, $object);
            $position = array_search($object, $this->popped);
            unset($this->popped[$position]);
        }
    }
}

class Foo
{
    function __construct($name)
    {
        $this->name = $name;
        $this->occurence = 0;
    }

    function work()
    {
        echo("Foo:$this->name, occurence: $this->occurence \n");
        $this->occurence ++;
    }
}

$size = 3;
$class = "Foo";
$pool = new Pool($size, $class);
var_dump($pool);


$object_1 = $pool->pull();
$object_2 = $pool->pull();
$object_3 = $pool->pull();
echo "========================OBJECT============================\n";
var_dump($object_1);
echo "======================POOL================================\n";
var_dump($pool->pool);
echo "=====================PUSH=================================\n";

var_dump($pool->popped);
echo "====================WORK==================================\n";
$object_1->work();
$pool->push($object_1);
echo "====================OBJECT================================\n";
var_dump($object_1);
echo "====================POOL==================================\n";
var_dump($pool->pool);
echo "===================POPPED=================================\n";
var_dump($pool->popped);

