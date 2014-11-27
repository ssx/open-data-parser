<?php
namespace SSX\OpenData\Area;

class Southampton implements \SSX\OpenData\DataParserContract {
    var $aryData = array();

    public function __construct()
    {
        $this->aryData[] = array(
            "identifier" => "24875484_C07326",
            "location_id" => "C07326",
            "woeid" => "24875484",
            "city" => "Southampton",
            "name" => "West Quay Multi-Storey",
            "image_url" => "http:\/\/southampton.romanse.org.uk\/staticfiles\/car%20parks\/C07326.jpg",
            "created_at" => "2014-11-27 21:51:26",
            "updated_at" => "2014-11-27 21:51:26",
            "timestamp" => 1417125000,
            "collection_date" => "2014-11-27",
            "collection_time" => "21:50:00",
            "state" => "spaces",
            "capacity" => 2489,
            "used" => 5,
            "free_00" => 2484,
            "free_30" => 2468,
            "free_60" => 2452
        );
    }

    public function getData()
    {
        return $this->aryData;
    }
}