<?php
// author DCreason
// This is a php library for quick requests to the TopMcList api.
class Topmclist{
	public function __construct($key){
		if(isset($key)){
			$this->apikey = $key;
		} else {
			$this->apikey = "";
		}
	}
	public function setapikey($key){
		$this->apikey = $key;
	}
	public function getkey(){
		return $this->apikey;
	}
	public function gettotal(){
		$array = json_decode(file_get_contents("https://topmclist.com/API?Key=".$this->apikey."&Type=Get_Total"), true);
		return $array["data"]["servers"];
	}
	public function getvotes($address){
		$array = json_decode(file_get_contents("https://topmclist.com/API?Key=".$this->apikey."&Type=Get_Votes&Address=".$address), true);
		return $array["data"];
	}
	public function getrank($address){
		$array = json_decode(file_get_contents("https://topmclist.com/API?Key=".$this->apikey."&Type=Get_Rank&Address=".$address), true);
		return $array["data"]["rank"];
	}
	public function getserverbyrank($rank){
		$array = json_decode(file_get_contents("https://topmclist.com/API?Key=".$this->apikey."&Type=Get_Server_By_Rank&Rank=".$rank), true);
		return $array["data"]["name"];
	}
	public function getgraph($address, $limit){
		return file_get_contents("http://topmclist.com/API?Key=".$this->apikey."&Type=Get_Graph&Address=".$address."&Limit=".$limit);
	}
}
?>