<?php
class BoomConfig {
	#   populating with preg 
   public function populateConfig($input) {
   	    $regex = "/^[a-z_]*\\s*=\\s*[^\\s]*/im";
   	    if (!preg_match_all($regex, $input, $lines)) print "icky";
   	    for ($i=0; $i < count($lines[0]); $i++) {
   	    	$this->parseLine($lines[0][$i]);
   	    }
   }

public $config = ["a" => "thing"];

   function __construct() {
   		$this->config = [];
   		$confffff = "# This is what a comment looks like, ignore it\n# All these config lines are valid\nhost = test.com\nserver_id=55331\nserver_load_alarm=2.5\nuser= user\n# comment can appear here as well\nverbose =true\ntest_mode = on\ndebug_mode = off\nlog_file_path = /tmp/logfile.log\nsend_notifications = yes";

   		$this->populateConfig($confffff);
   		print "\nBehold! The var_dump of a map\n";
   		var_dump($this->config);

        print "\nwho is the host?\n";
   		print $this->config["host"];
   }

   function __destruct() {
       print "\nDestroying EVERYTHING\n";
   }

   public function set($key, $value) {
   	   $this->config[$key] = $value; 
   }

   public function get($key) {
   	   print $this->config[$key];
   }

   #TODO: replace with ConfigItem Factories
   function parseLine($line) {
        #step 1 - check that line is well-formed
   		$equal = strpos($line, "=");
   		$length = strlen($line);
   		if ($equal === false or $equal < 1 or $equal >= $length) {
   			print "aaaaaiiieieeeeeee";
   			return 0;
   		}
   		#step 2 - determine and assign value
   	    #TODO: use ConfigItem in place of dense procedural logic
   		$strvalue = ltrim(substr($line,$equal + 1));
   		$value = $this->discernBoolean($strvalue);
   		if (!isset($value)) {
   			$value = $this->discernNumeric($strvalue);
   			if (!isset($value)) {
   				$value = $strvalue;
   			}
   		}
  		$key = rtrim(substr($line,0,$equal-$length));
   		#step 3 - call setter

  		$this->set($key,$value);
  		var_dump($line);
  		var_dump($key);
  		var_dump($value);
   }


   function discernBoolean($str) {
   		# STU 1/1/2015 decision to not accept 0 or 1 as boolean configurations for prototype
   		# TODO: replace with boolean interpretation based on ConfigItem properties
   		if ($str == "yes" or $str == "on") return true;
   		else if ($str == "no" or $str == "off") return false;
   		else return NULL;
   }

   function discernNumeric($str) {
   		# still not clear on what we should do with 111.111 vs 111,111
   		# TODO: replace with locale-aware parse
   		if (!is_numeric($str)) return NULL;
   		if (false === strpos($str,".")) {
   			return (int) $str;
   		} else {
   			return (float) $str;
   		}

   }

}

$obj = new BoomConfig();

?>