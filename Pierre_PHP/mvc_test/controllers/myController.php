<?php
class Controller
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function clicked()
    {
        $this->model->string = "Updated Data, thanks to MVC and PHP!";
    }

    public function clicker()
    {
        $this->model->string2 = "AAAAAA";
    }
}
