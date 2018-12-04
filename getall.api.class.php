<?php

/**
 * Getall.pl API connector class
 * 
 * @author Getall.pl
 * @copyright Getall.pl
 * @version 1.0
 * @since 2015-09-15
 */
 
 
class GetAll
 {
    private $api_key = null;
    private $url = 'https://www.getall.pl/api/';
  
    public function __construct($api_key)
    {
       $this->api_key = $api_key;
    } // end __construct();
  
    public function __call($name, $arguments)
	{ 
	    $arguments = $arguments[0];
        $request = array();
        $arguments["key"] = $this->api_key;
        $arguments["method"] = $name;
 
        foreach($arguments as $k=>$v) $request[] = $k."=".urlencode($v);	
		
        $user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
        if($ch = curl_init()) {
         	
            curl_setopt($ch, CURLOPT_URL,$this->url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,join("&",$request));
	  
            if($result = curl_exec ($ch)) {		
	
		      return json_decode($result);
		
			}
		}
 	
	} // end __call();
  
 } // end GetAll;


?>