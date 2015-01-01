<?php
abstract class ConfigItem {
	function getValue() {
	return $this->value();
	}
	abstract function value();
}
class BooleanConfigItem extends ConfigItem {
	
}
class IntegerConfigItem extends ConfigItem {}
class FloatConfigItem extends ConfigItem {}
?>