<?php

class Student {

    public int $id;
    public int $grade_id;
    public string $email;
    public string $fullName;
    public DateTime $dateTime;
    public string $gender;

    public function __construct(int $id = 0, int $grade_id = 0, string $email = '', string $fullName = '', DateTime $dateTime = new DateTime("1990-01-01"), string $gender = '')
    {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullName = $fullName;
        $this->dateTime = $dateTime;
        $this->gender = $gender;
    }
}
