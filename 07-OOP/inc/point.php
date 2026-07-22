<?php

class Point
{
    public $x = 0 {

        get {
            return $this->x;
        }
        set($value) {
            $this->x = $value;
        }
    }
    public $y = 0 {

        get {
            return $this->y;
        }
        set($value) {
            $this->y = $value;
        }
    }

    function get_x()
    {
        return $this->x;
    }
    function get_y()
    {
        return $this->y;
    }
    function set_x($x)
    {
        $this->x = $x;
    }
    function set_y($y)
    {
        $this->y = $y;
    }

    //			Constructors:
    function __construct($x = 0, $y = 0)
    {
        $this->set_x($x);
        $this->set_y($y);
        echo "Constructor:<br>";
    }
    function __destruct()
    {
        echo "Destructor:<br>";
    }

    //			Methods:
    function info()
    {
        echo "X = {$this->x}, Y = {$this->y}<br>";
    }
    function __tostring()
    {
        return "X = {$this->x}, Y = {$this->y}<br>";
    }
}

?>