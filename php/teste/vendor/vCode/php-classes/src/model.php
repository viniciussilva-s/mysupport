<?php
namespace vCode;

class model{
	private $values =[];
	public function __call($name,$args){
		$method = substr($name,0,3);
		$fieldName = substr($name,3,strlen($name));
		
		switch ($method){
			case "get":
				return (isset($this->values[$fieldName])? $this->values[$fieldName] : NULL);
			break;
			
			case "set":
				 $this->values[$fieldName] = $args[0];
			break;
		}
		
		
	}
	public function setData($data = array()){
		foreach($data as $key => $value){
			$this->{"set".$key}($value);
		}
	}
	public function getValues(){
		return $this->values;
	}
	public static function encodeUTF8($data = array()){
		foreach ($data as $key1 => $value1) {
			if($key1 >= 0  ){
				foreach ($data[$key1] as $key2 => $value2) {
					if (!is_numeric($value2)){
						$data[$key1][$key2]= utf8_encode($value2);
					} 
				}

			}else{
				$data[$key1]= utf8_encode($value1);
			}
			
		}
		return $data; 
	}
	public static function cleanData($data = array()){
		foreach ($data as $key => $value) {
			 $value = trim($value);
			 $value = str_replace(".", "", $value);
			 $value = str_replace(",", "", $value);
			 $value = str_replace("-", "", $value);
			 $value = str_replace("(", "", $value);
			 $value = str_replace(")", "", $value);
			 $value = str_replace(")", "", $value);
		
			if($key == 'desphone'){
				$value = str_replace(" ", "", $value);		
			}
			$data[$key]=$value;
		}
		return $data;
	}
}



?>