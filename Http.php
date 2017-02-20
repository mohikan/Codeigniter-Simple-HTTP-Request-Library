<?php
/*
 * HTTP Request
 * Authors: Mohikan
 * Use, reproduction, distribution, and modification of this code is subject to the terms and
 * conditions of the MIT license, available at http://www.opensource.org/licenses/mit-license.php
 *
 * Project: https://github.com/mohikan/PHP-Http-Request-Library
 */

class Http {

    public function __construct(){
        
    }

    public function request($url, $post = '', $header = '', $custom = ''){

        $headers = array();
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

        if($header != ''){
            $headers[] = $header;
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 90);

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
