<?php
namespace HEXD;

class DocTest extends ObjectBase
{
    public function __construct(){
       
        parent::__construct();
    }
    
    /**
     * @route("some route")
     */
    public function index(){
        echo __METHOD__;
    }
}

