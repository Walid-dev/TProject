<?php

class EventManager extends Manager
{
    public function getEvent2()
    {
        $db = Manager::dbConnect();
        $events2 = $db->prepare('SELECT * FROM events');
        $events2->execute(array('id'));

        return $events2;
    }
}
