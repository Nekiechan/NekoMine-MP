<?php
namespace pocketmine\utils;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
//NEKOMINE-MP
//Made by Taryin Grace
class NekoConfig{
public $Config;
public function __construct() {
        $Config = $this->Config;
$this->Config = new Config("NekoMine.yml", Config::YAML, array(
"version" => 1,
"plugin-api" => "2.0.0",
"backwards-protocol" => [110],
"kill-on-exit" => false,
"onload" => []));
}

public function getVersion(){
return $this->Config["version"];
}
public function getApi(){
return $this->Config["plugin-api"];
}
public function getBackwardsProtocol(){
return $this->Config["backwards-protocol"];
}
public function getKillonExit(){
return $this->Config["kill-on-exit"];
}
public function getOnload(){
return $this->Config["onload"];
}
}
