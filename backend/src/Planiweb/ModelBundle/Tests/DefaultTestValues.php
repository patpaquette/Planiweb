<?php

namespace Planiweb\ModelBundle\Tests;

class DefaultTestValues
{
    private static _defaultTestValues = array(
        "String" => "test",
        "Integer" => 0,
        "DateTime" => "1987-05-08T00:00:00O"
    );

    private static _defaultFixtureValues = array(
        "String" => "fixture_test",
        "Integer" => 0,
        "DateTime" => "1987-05-08T00:00:00O"
    );

    public static Get($type, $context = "test")
    {
        if(strtolower($context) == "test")
        {
            return static::_defaultTestValues[$type];
        }
        else if(strtolower($context) == "fixture")
        {
            return static::_defaultFixtureValues[$type];
        }
    }
}

?>