<?php
class BoomConfig {
   function __construct() {
       if DEBUG print "In constructor\n";
       $this->config = [];
   }

   function __construct($payload) {

   }

   function __destruct() {
       print "Destroying EVERYTHING\n";
   }

   function set($key, $value) {
   	   $this->config[$key] = $value 

   	   }   	   print "Implement this function"
   }

   function get($key) {
   	   print "This one too"
   }

   #TODO: replace with ConfigItem Factories
   function parseLine($line) {
        #step 1 - check that line is well-formed
   		$equal = strpos($line, "=")
   		$length = strlen(line)
   		if $equal === false or $equal < 1 or $equal >= $length {
   			return 0;
   		}
   		#step 2 - determine and assign value
   	    #TODO: use ConfigItem in place of dense procedural logic
   		$strvalue = trim(substr($line,$equal))
   		$value = discernBoolean($strvalue)
   		if not isset($value) {
   			$value = discernNumeric($strvalue)
   			if not isset($value) {
   				$value = discernString($strvalue)
   			}
   		}#/TODO
  		$key = trim(substr($line,0,$equal-$length))
   		#step 3 - call setter
  		$this->set($key,$value)
   }
#   populating with preg 
   function populateConfig($string) {
   	    $regex = "(^|\n)[a-z_]*\s*=\s*[^\s]*"
   	    $lines = preg_match_all($regex, $string, $lines)[0]
   	    
   	    for ($i=0; $i < count($lines); $i++) { 
   	    	$this-parseLine($lines[i])
   	    }
   }

   function discernBoolean($str) {
   		# STU 1/1/2015 decision to only accept 0 or 1 as boolean configurations for prototype
   		if $str == "1" return true;
   		else if $str == "0" return false;
   		else return NULL;
   }

   function discernNumeric($str) {
   		# still not clear on what we should do with 111.111 vs 111,111
   		# replace with locale-aware parser later
   	    # since this is done stupidly, let's use regex instead for brevity
   		if 
   }
    function discernInt($str) {

    }

}

$obj = new BoomConfig();

?>