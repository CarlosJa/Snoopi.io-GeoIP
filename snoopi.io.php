<?php

/**
 *  @package    Snoopi
 */

/**
 *  Snoopi.io GeoCoding / Location Information 
 *
 *
 *  Website: https://www.snoopi.io
 *  
 *  @package    Snoopi
 *  @author     Carlos Arias
 *  @copyright  (c) 2015-2018 - Carlos Arias
 *  @version    1.0
 *  @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License v3
 */

class Snoopi { 

 private $api_key = '4e226c51d21201e6ef0b4ae3a2e83023';   // INSERT YOUR KEY HERE
 private $url = "https://api.snoopi.io/v1";



public function send_request($url, $data="") { 
		$data['apikey']=$this->api_key;
	    $URLQuery =  urldecode(http_build_query($data, '', '&'));
		/// echo $url . "?" . $URLQuery;  #Test

        // create curl resource
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . "?" . $URLQuery);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);     

		return $output;
}
		
	

	function GeoIPLocation($IPAddress, $params="") {
		$url = "{$this->url}/ip/{$IPAddress}";
		$Response = $this->send_request($url, $params); 
		return $Response;
	}



	function ZipCodeDistance($fromZip, $ToZip, $params="") {
		$url = "{$this->url}/zipcodedistance/{$fromZip}-{$ToZip}";
		$Response = $this->send_request($url, $params); 

		return $Response;
	}

	
	function StateInfo($str, $params="") {
		$data = trim($data);
		$data = urlencode($data);

		$url = "{$this->url}/stateinfo/$data";
		$Response = $this->send_request($url, $params); 
		return $Response;
	}
	
	function GetCities($str, $params="") {
		$data = trim($data);
		$data = urlencode($data);

		$url = "{$this->url}/getcities/$data";
		$Response = $this->send_request($url, $params); 
		return $Response;
	}
	
	function ZipCodeRadius($FromZip, $Radius, $params="") {
		$url = "{$this->url}/zipcoderange/{$FromZip}-{$Radius}";
		$Response = $this->send_request($url, $params); 
		return $Response;
	}

    function ReverseGeo($str, $params=""){
		$data = urlencode($data);
        $url = "{$this->url}/reversegeo/{$data}";

        $Response = $this->send_request($url, $params); 
        return $Response;
    }
 

} // End Class
