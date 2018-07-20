<?php
namespace app\wx\home;

class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }
}