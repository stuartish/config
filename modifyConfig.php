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

   function set(key, value) {
   	   if looksBoolean(value)
   	   {
   	   		$this->config[key] = asBoolean(value)
   	   } else if is_numeric(value)
   	   }
   	   $this->config[key] = num 

   	   }   	   print "Implement this function"
   }

   function get(key) {
   	   print "This one too"
   }

   function parseLine(line) {
        #step 1 - check that line is well-formed
   		$equal = strpos($line, "=")
   		if $equal === false or $equal < 1 or $equal >= strlen(line) {
   			return 0;
   		}
   		#step 2 - determine and assign value
   		$value = 
   		#step 3 - call setter
   }

### Function 
   function populateConfig(string) {
   		# - in a loop, get each line and parse it
   }



}

$obj = new BoomConfig();

?>