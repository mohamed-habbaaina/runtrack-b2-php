<?php

class Room {

    public int $id;
    public int $floor_id;
    public string $name;
    public int $capacity;

    public function __construct(int $id = 0, int $floor_id = 0, string $name = '', int $capacity = new DateTime("2023-09-08"))
    {
        $this->id = $id;
        $this->floor_id = $floor_id;
        $this->name = $name;
        $this->capacity = $capacity;
    }
}
