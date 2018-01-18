<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 16/01/18
 * Time: 09:23
 */

class Meteo
{
    static public $base_url = "http://www.infoclimat.fr/public-api/gfs/xml?_ll=48.85341,2.3488&_auth=CBJUQwN9VHYEKVBnBXNWfwdvBzILfQYhBHgGZQBlXyJSOVY3D28DZVU7A34DLAI0Ai8ObVliBDRTOAV9CHoDYghiVDgDaFQzBGtQNQUqVn0HKQdmCysGIQRmBmkAaF8iUjBWNw9yA2NVPQN%2FAzACPgIuDnFZZwQ5UzEFZAhlA2kIa1Q0A2NUNAR0UC0FMFYzBzEHMwtmBjoEYwZhAG9fb1I1VjsPOQNnVSQDaAMyAjcCNw5uWWAEPlM0BX0IegMZCBhULQMgVHQEPlB0BShWNwdqBzM%3D&_c=591b7cd983f98889724539f4e60f3a27";

    function __construct()
    {
        $this->data = file_get_contents(self::$base_url);
    }

    function getInfos()
    {
        return $this->data;
    }
}
