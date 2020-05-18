<?php

class LocationDetails
{
    function getUserIP()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        return $ip;
    }

    function getLocationDetails()
    {
        $user_ip = $this->getUserIP();
        $ip = $user_ip;
        $response = array();
        $ipdat = @json_decode(file_get_contents(
            "http://www.geoplugin.net/json.gp?ip=" . $ip));
        array_push($response,array("CountryName" => $ipdat->geoplugin_countryName, "CityName" => $ipdat->geoplugin_city,
            "ContinentName" => $ipdat->geoplugin_continentName, "Latitude" => $ipdat->geoplugin_latitude,
            "Longitude" => $ipdat->geoplugin_longitude, "Currency" => $ipdat->geoplugin_currencyCode,
            "Timezone" => $ipdat->geoplugin_timezone));
        return json_encode(array("LocationDetails"=>$response),JSON_PRETTY_PRINT);
    }
}

?>
