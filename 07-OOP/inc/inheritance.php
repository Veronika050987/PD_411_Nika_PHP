<?php

class Human
{
    public $last_name = "last_name" {

        get {
            return $this->last_name;
        }
        set($value) {
            $this->last_name = $value;
        }
    }
    public $first_name = "first_name" {

        get {
            return $this->first_name;
        }
        set($value) {
            $this->first_name = $value;
        }
    }
    public $age = 0 {

        get {
            return $this->age;
        }
        set($value) {
            $this->age = $value;
        }
    }

    //				Constructors:
    function __construct($last_name, $first_name, $age)
    {
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->age = $age;
        echo "HConstructor:<br>";
    }
    function __destruct()
    {
        echo "HDestructor:<br>";
    }

    //				Methods:
    function __tostring()
    {
        echo '<pre>';
        print_r(__CLASS__ . '<br>');
        //var_dump($this);
        echo '</pre>';
        return "{$this->last_name} {$this->first_name} {$this->age}";
    }
}

class Student extends Human
{
    public $speciality = "spec" {

        get {
            return $this->speciality;
        }
        set($value) {
            $this->speciality = $value;
        }
    }
    public $group = "group" {

        get {
            return $this->group;
        }
        set($value) {
            $this->group = $value;
        }
    }
    public $rating = 0 {

        get {
            return $this->rating;
        }
        set($value) {
            $this->rating = $value;
        }
    }
    public $attendance = 0 {

        get {
            return $this->attendance;
        }
        set($value) {
            $this->attendance = $value;
        }
    }

    //					Constructors:
    function __construct
    (
        $last_name,
        $first_name,
        $age,
        $speciality,
        $group,
        $rating,
        $attendance
    ) {
        parent::__construct($last_name, $first_name, $age);
        $this->speciality = $speciality;
        $this->group = $group;
        $this->rating = $rating;
        $this->attendance = $attendance;
        echo "SConstructor<br>";
    }
    function __destruct()
    {
        echo "SDestructor<br>";
    }

    //				Methods:
    function __tostring()
    {
        echo '<pre>';
        print_r(__CLASS__ . '<br>');
        //var_dump($this);
        echo '</pre>';
        return parent::__tostring() . "\t{$this->speciality} {$this->group} {$this->rating} {$this->attendance}";
    }
}

class Graduate extends Student
{
    public $subject = "subject" {

        get {
            return $this->subject;
        }
        set($value) {
            $this->subject = $value;
        }
    }

    //				Constructors:
    function __construct
    (
        $last_name,
        $first_name,
        $age,
        $speciality,
        $group,
        $rating,
        $attendance,
        $subject
    ) {
        parent::__construct
        (
            $last_name,
            $first_name,
            $age,
            $speciality,
            $group,
            $rating,
            $attendance
        );
        $this->subject = $subject;
    }
}


?>