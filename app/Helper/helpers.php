<?php 
if (! function_exists('getArrLocationFromIP')) {
	function getArrLocationFromIP($ip_address) {
		$endpoint = 'http://api.ipstack.com/' . $ip_address . '?access_key=0baa013cafd0e1879edc45c96d1018b1';
		// Prepare new cURL resource
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		 
		// Set HTTP Header for POST request 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/x-www-form-urlencoded'
			// 'Content-Length: ' . strlen($data_string)
		));
		 
		// Submit the POST request
		$result = curl_exec($ch);
		 
		// Close cURL session handle
		curl_close($ch);
		
		return json_decode($result);
		// {#222 ▼
		//   +"ip": "104.247.132.212"
		//   +"type": "ipv4"
		//   +"continent_code": "NA"
		//   +"continent_name": "North America"
		//   +"country_code": "US"
		//   +"country_name": "United States"
		//   +"region_code": "CA"
		//   +"region_name": "California"
		//   +"city": "Fremont"
		//   +"zip": "94536"
		//   +"latitude": 37.5625
		//   +"longitude": -122.0004
		//   +"location": {#217 ▼
		// 	+"geoname_id": null
		// 	+"capital": "Washington D.C."
		// 	+"languages": array:1 [▼
		// 	  0 => {#218 ▼
		// 		+"code": "en"
		// 		+"name": "English"
		// 		+"native": "English"
		// 	  }
		// 	]
		// 	+"country_flag": "http://assets.ipstack.com/flags/us.svg"
		// 	+"country_flag_emoji": "🇺🇸"
		// 	+"country_flag_emoji_unicode": "U+1F1FA U+1F1F8"
		// 	+"calling_code": "1"
		// 	+"is_eu": false
		//   }
		// }
	}
}
