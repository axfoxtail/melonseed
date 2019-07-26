<?php 
if (! function_exists('myCurl')) {
	function myCurl($endpoint, $method) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		if ($method == 'post' || $method == 'POST') {
			curl_setopt($ch, CURLOPT_POST, true);
		}
		curl_setopt($ch, CURLOPT_POST, false);
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
	}
}

if (! function_exists('getArrLocationFromIP')) {
	function getArrLocationFromIP($ip_address) {
		$endpoint = 'http://api.ipstack.com/' . $ip_address . '?access_key=0baa013cafd0e1879edc45c96d1018b1';
		// Prepare new cURL resource
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, $endpoint);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		// curl_setopt($ch, CURLOPT_POST, true);
		// // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		 
		// // Set HTTP Header for POST request 
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		// 	'Content-Type: application/x-www-form-urlencoded'
		// 	// 'Content-Length: ' . strlen($data_string)
		// ));
		 
		// // Submit the POST request
		// $result = curl_exec($ch);
		 
		// // Close cURL session handle
		// curl_close($ch);
		
		// return json_decode($result);
		// dd(myCurl($endpoint, 'post'));
		return myCurl($endpoint, 'post');
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

if (! function_exists('calcTotalRate')) {
	function calcTotalRate($array) {
		$sum = 0;
		foreach ($array as $key => $value) {
			$sum += $value->rate;
		}
		if (count($array)) {
			return $sum / count($array);
		} else {
			return null;
		}
	}
}

if (! function_exists('catchYearFromDateTime')) {
	function catchYearFromDateTime($date_time) {
		return explode('-', $date_time)[0];
	}
}

if (! function_exists('getFullName')) {
	function getFullName($first_name, $last_name) {
		return $first_name . ' ' . $last_name;
	}
}

if (! function_exists('getUserSimpleLocationFromIP')) {
	function getUserSimpleLocationFromIP($ip) {
		return getArrLocationFromIP($ip)->city . ', ' . getArrLocationFromIP($ip)->region_code;
	}
}

if (! function_exists('getCurrentLatLonKeywardFromIP')) {
	function getCurrentLatLonKeywardFromIP($ip) {
		return getArrLocationFromIP($ip)->latitude . ',' . getArrLocationFromIP($ip)->longitude;
	}
}

if (! function_exists('getLatFromIP')) {
	function getLatFromIP($ip) {
		return getArrLocationFromIP($ip)->latitude;
	}
}

if (! function_exists('getLonFromIP')) {
	function getLonFromIP($ip) {
		return getArrLocationFromIP($ip)->longitude;
	}
}

if (! function_exists('getCityListFromIP')) {
	function getCityListFromIP($ip) {
		$country_code = getArrLocationFromIP($ip)->country_code;
		$region_name = getArrLocationFromIP($ip)->region_name;

		$endpoint = 'http://battuta.medunes.net/api/city/'. $country_code .'/search/?region='. $region_name .'&key=37a6a5e83edcc17aea06193d0df8825b';
		return myCurl($endpoint, 'get');
	}
}

if (! function_exists('checkAvailableAge')) {
	function checkAvailableAge($age_range, $age) {
		return strpos($age_range, $age);
	}
}

if (! function_exists('getAvailableDayObj')) {
	function getAvailableDayObj($business_hours, $day) {
		if ($business_hours) {
			$hours_obj = json_decode($business_hours);
			switch ($day) {
				case 'monday': return $hours_obj->monday; break;
				case 'tuesday': return $hours_obj->tuesday; break;
				case 'wednesday': return $hours_obj->wednesday; break;
				case 'thursday': return $hours_obj->thursday; break;
				case 'friday': return $hours_obj->friday; break;
				case 'saturday': return $hours_obj->saturday; break;
				case 'sunday': return $hours_obj->sunday; break;
				default: return null; break;
			}
		} else {
			return null;
		}
	}
}

if (! function_exists('displayAgeRange')) {
	function displayAgeRange($age_range) {
		$age_pattern = '';
		if (strpos($age_range, 'age1')) {
			$age_pattern .= '<div class="age-pattern">1-6 months</div>';
		}
		if (strpos($age_range, 'age2')) {
			$age_pattern .= '<div class="age-pattern">1 Year</div>';
		}
		if (strpos($age_range, 'age3')) {
			$age_pattern .= '<div class="age-pattern">1-3 Years</div>';
		}
		if (strpos($age_range, 'age4')) {
			$age_pattern .= '<div class="age-pattern">4-7 Years</div>';
		}
		if (strpos($age_range, 'age5')) {
			$age_pattern .= '<div class="age-pattern">8-10 Years</div>';
		}
		if (strpos($age_range, 'age6')) {
			$age_pattern .= '<div class="age-pattern">11-13 Years</div>';
		}
		if (strpos($age_range, 'age7')) {
			$age_pattern .= '<div class="age-pattern">14-17 Years</div>';
		}
		if (strpos($age_range, 'age8')) {
			$age_pattern .= '<div class="age-pattern">18+ Years</div>';
		}
		
		echo $age_pattern;
	}
}

if (! function_exists('getBookingStatus')) {
	function getBookingStatus($status_code) {
		$status = '';
		switch ($status_code) {
			case '0': $status = 'Processing'; break;
			case '1': $status = 'Completed'; break;
			case '2': $status = 'Canceled'; break;
			case '3': $status = 'Expired'; break;
			default: $status = 'Processing'; break;
		}

		return $status;
	}
}