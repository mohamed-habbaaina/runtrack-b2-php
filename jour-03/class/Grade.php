<?php

class Grade {

    public int $id;
    public int $room_id;
    public string $name;
    public DateTime $year;

    public function __construct(int $id = 0, int $room_id = 0, string $name = '', DateTime $year = new DateTime("2023-09-08"))
    {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year;
    }
}
