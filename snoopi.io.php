<?php
/*
 * Website http://www.snoopi.io
 * Author: carlos@snoopi.io CarlosJaa
 * Any bugs, question, please email carlos@snoopi.io
 */

class Snoopi { 

private $api_key = 'API_KEY';


/*
	Get GeoIP Information 
	Param: $IPAddress 
*/
	function GeoIPLocation($IPAddress) {
		$QueryArr['apikey']=$this->api_key;
		$QueryArr['user_ip_address']=$IPAddress;


		$URLQuery =  urldecode(http_build_query($QueryArr, '', '&'));


		// create curl resource
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://api.snoopi.io/v1/?" . $URLQuery);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);


		return $output;
	}




} // End Class
