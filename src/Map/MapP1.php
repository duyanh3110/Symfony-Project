<?php
/**
 * Created by PhpStorm.
 * User: Duy Anh
 * Date: 22/02/2018
 * Time: 2:24 CH
 */

namespace App\Map;

use App\Entity\Location;

class MapP1
{

    public function getInfo($location)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json', [
            'query' => ['address' => $location, 'key' => 'AIzaSyAsMNH_2hIWFgBIBLu3GmiDyxhMTVpgEdU']
        ]);

        $data = json_decode($response->getBody());

        $location = new Location();

        $location->setLocation($data->results[0]->formatted_address);
        $location->setLatitude($data->results[0]->geometry->location->lat);
        $location->setLongitude($data->results[0]->geometry->location->lng);
        return $location;
    }
}