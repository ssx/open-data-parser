<?php
namespace SSX\OpenData\Area;

class TyneAndWear implements \SSX\OpenData\DataParserContract {
    var $aryData    = array();
    var $apiURL     = "https://www.netraveldata.co.uk/api/v1/carpark/dynamic";
    var $woeid      = "12695859";
    var $username   = "";
    var $password   = "";

    public function __construct($aryCredentials = array())
    {
        if (isset($aryCredentials["username"])) {
            $this->username = $aryCredentials["username"];
        } else {
            throw new \Exception("No username provided");
        }

        if (isset($aryCredentials["password"])) {
            $this->password = $aryCredentials["password"];
        } else {
            throw new \Exception("No password provided");
        }

        // Make our request
        $client = new \GuzzleHttp\Client();
        $res = $client->get($this->apiURL, array('auth' => array($this->username, $this->password)));
        if ($res->getStatusCode() == 200)
        {
            foreach ($res->json() as $intIndex => $aryCarParkData)
            {
                $this->aryData[] = array(
                    "identifier"        => $this->woeid."_".$aryCarParkData["systemCodeNumber"],
                    "location_id"       => $aryCarParkData["systemCodeNumber"],
                    "woeid"             => $this->woeid,
                    "city"              => "Newcastle upon Tyne",
                    "name"              => "Car Park: ".$aryCarParkData["systemCodeNumber"],
                    "image_url"         => "",
                    "created_at"        => "",
                    "updated_at"        => "",
                    "timestamp"         => time(),
                    "collection_date"   => "",
                    "collection_time"   => "",
                    "state"             => strtolower($aryCarParkData["dynamics"][0]["stateDescription"]),
                    "capacity"          => 0,
                    "used"              => $aryCarParkData["dynamics"][0]["occupancy"]
                );
             }
        } else
        {
            throw new \Exception("HTTP Code: ".$res->getStatusCode()." returned for request to ".$this->apiURL);
        }
    }

    public function getData()
    {
        return $this->aryData;
    }
}
