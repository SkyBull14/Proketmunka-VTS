<?php

trait AccessibleProperties
{
    public function __parseData($data)
    {
        foreach($data as $key => $value)
            if (property_exists($this, $key))
                $this->$key = $value;
    }

    public function __get($name)
    {
        if (property_exists($this, $name))
            return $this->$name;
    }
}