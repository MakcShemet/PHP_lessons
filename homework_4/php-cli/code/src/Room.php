<?php

class Room
{
    private int $roomId;
    private string $address;
    private PaperBook $paperBook;

    public function __construct($roomId, $address)
    {
        $this->roomId = $roomId;
        $this->address = $address;
    }
}
