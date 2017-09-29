<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Http - PHP Curl Based Http Request Library for Codeigniter
 * Authors: Mohikan
 * Use, reproduction, distribution, and modification of this code is subject to the terms and
 * conditions of the MIT license, available at http://www.opensource.org/licenses/mit-license.php
 *
 * Project: https://github.com/mohikan/Codeigniter-Simple-HTTP-Request-Library
 */
class Http {

	/**
	 * Reference curl ssl verfy peer
	 *
	 * @var boolean
	 */
	public $ssl_verify_peer  = true;

	/**
	 * Reference curl ssl verfy host
	 *
	 * @var boolean
	 */
	public $ssl_verif_host   = true;


	/**
	 * Reference curl request timeout
	 *
	 * @var integer
	 */
	public $request_timeout  = 30;


	/**
	 * Reference curl response timeout
	 *
	 * @var integer
	 */
	public $response_timeout  = 90;


	/**
	 * Reference curl accept cookies
	 *
	 * @var boolean
	 */
	public $accept_cookies   = false;


	/**
	* Construct
	*/
	public function __construct($config = []){

		foreach ($config as $key => $value) {
			$this->$key = $value;
		}

	}

	public function Get($url, $headers = ''){
		return $this->Request($url, $headers);
	}

	public function Post($url, $post = '', $headers = ''){
		return $this->Request($url, $post, $headers);
	}

	public function Put($url, $post = '', $headers = ''){
		return $this->Request($url, $post, $headers, 'PUT');
	}

	public function Delete($url, $post = '', $headers = ''){
		return $this->Request($url, $post, $headers, 'DELETE');
	}

	public function Request($url, $post = '', $header = '', $custom = ''){

		$headers   = array();
		$headers[] = "Cache-control: no-cache";
		$headers[] = "Language: en";
		$headers[] = "Postman-token: 3181cbed-cbce-474f-a2fa-9e630b24fb94";
		$headers[] = "source_id: " . date("YmdHis");
		$headers[] = "show_sensitive_data: 1";
		$headers[] = "time_zone: UTC +02:00";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		if($custom != ''){
		    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $custom);
		}

		if($post != ''){

		    if(is_array($post)){
			// post
			$post = http_build_query($post);
			$headers[] = "Content-type: application/x-www-form-urlencoded";
		    } else {
			// json
			$headers[] = "Content-type: application/Json";
		    }

		    if($custom == ''){
			curl_setopt($ch, CURLOPT_POST, 1);
		    }

		    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		}

		if($this->accept_cookies === true){
			$cookie_file = sys_get_temp_dir() . '/cookies.txt';
			curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
			curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie_file);
		}

		if($header != ''){
		    $headers[] = $header;
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER	, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER	, $this->ssl_verify_peer);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST	, $this->ssl_verif_host);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT	, $this->request_timeout);
		curl_setopt($ch, CURLOPT_TIMEOUT 	, $this->response_timeout);

		$result = curl_exec($ch);
		$err = curl_error($ch);
		curl_close($ch);

		if($err){
		    return "request error : $err ";
		} else {
		    return $result;
		}
	}

}
