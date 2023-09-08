<?php

class Floor {

    public int $id;
    public string $name;
    public int $level;

    public function __construct(int $id = 0, string $name = '', int $level = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }
}
