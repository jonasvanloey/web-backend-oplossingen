<?php
class animal{
    protected $name;
    protected  $gender;
    protected  $health;
    public function __construct($name,$gender,$health)
    {
        $this->name=$name;
        $this->gender=$gender;
        $this->health=$health;

    }

    public function getName()
    {
        return $this->name;
    }


    public function getGender()
    {
        return $this->gender;
    }


    public function getHealth()
    {
        return $this->health;
    }
    public function changeHealth($healthpoints)
    {
        return $this->health+=$healthpoints;
    }
    public function doSpecialMove()
    {
        return 'walk';
    }
}
?>