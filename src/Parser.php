<?php

namespace HEXD;

class Parser
{

    private $class;

    public $classDoc = "";

    function __construct(ObjectBase $class)
    {
        $this->class = $class;
        $this->parse();
    }

    function parse()
    {
        $class = new \ReflectionClass($this->class);
        if (false != $class->getDocComment()) {
            $this->classDoc = $class->getDocComment();
        }
        $methods = $class->getMethods();
        foreach ($methods as $method) {
            /**
             *
             * @var \ReflectionMethod $method
             */
            $methodName = $method->getName();
            if ($method->getDocComment() == false) {
                continue;
            }
            $methodDoc = $method->getDocComment();
            preg_match_all("/@(.*)/", $methodDoc, $search);
            if (count($search[0]) == 0) {
                continue;
            }
            foreach ($search[1] as $one) {
                //name(value);
                preg_match("/(?<name>.*)(?:\()(?<value>.*)(?:\))/", trim($one), $oneObj);
                if (isset($oneObj['name'])) {
                    echo $oneObj['name'];
                }
                if (isset($oneObj['value'])) {
                    echo $oneObj['value'];
                }
            }
        }
    }
}

