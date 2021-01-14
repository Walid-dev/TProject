<?php

class EventManager extends Manager
{

    /** Function that gets events from the table events and executes the array using the events ids **/
    public function getEvent()
    {
        $db = Manager::dbConnect();
        $events = $db->prepare('SELECT * FROM events');
        $events->execute(array('id'));
        return $events;
    }

    public function getEvent2()
    {
        $db = Manager::dbConnect();
        $events2 = $db->prepare('SELECT * FROM events');
        $events2->execute(array());
        return $events2;
    }

    public function postEvent($userUid, $eventName, $eventPlace, $eventLat, $eventLon, $eventDate, $eventDesc, $eventTime)
    {
        $db = Manager::dbConnect();

        $event = $db->prepare('INSERT INTO events(userUid, eventName, eventPlace, eventLat, eventLon, eventDate, eventDesc, eventTime, creation_date) VALUES(?, ?, ?, ?, ?, ?, ?, ?, NOW())');
        $event->execute(array($userUid, $eventName, $eventPlace, $eventLat, $eventLon, $eventDate, $eventDesc, $eventTime));
    }

    public function suscribeEvent($eventId, $userUid)
    {
        $db = Manager::dbConnect();

        $checkIfAlreadySuscribedReq = $db->prepare("SELECT eventId FROM eventPart WHERE eventId=?");
        $checkIfAlreadySuscribedReq->execute(array($eventId));

        $userCheck =  $checkIfAlreadySuscribedReq->rowCount();

        if ($userCheck > 0) { } else {
            $suscribe = $db->prepare('INSERT INTO `eventPart`(`eventId`, `eventSuscriber`) VALUES (?, ?)');
            $suscribe->execute(array($eventId, $userUid));
        }
    }

    public function getEventSuscriber($eventId)
    {
        $db = Manager::dbConnect();
        $getEventSuscriber = $db->prepare("SELECT eventSuscriber FROM eventPart WHERE eventId=`$eventId`");
        $getEventSuscriber->execute(array($eventId));
        $getEventSuscriber->rowCount();

        echo $getEventSuscriber;
    }
}
