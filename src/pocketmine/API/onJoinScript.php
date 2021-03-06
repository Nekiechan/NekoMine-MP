<?php
/*
*
*  _   _      _         __  __ _                   __  __ _____  
* | \ | |    | |       |  \/  (_)                 |  \/  |  __ \ 
* |  \| | ___| | _____ | \  / |_ _ __   ___ ______| \  / | |__) |
* | . ` |/ _ \ |/ / _ \| |\/| | | '_ \ / _ \______| |\/| |  ___/ 
* | |\  |  __/   < (_) | |  | | | | | |  __/      | |  | | |     
* |_| \_|\___|_|\_\___/|_|  |_|_|_| |_|\___|      |_|  |_|_|     
*This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU Lesser General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* @author NekoMine Team
* @link http://www.nekomineforums.blogspot.com/
* 
*
*/       
namespace pocketmine\API;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\API\Api;
use pocketmine\API\ApiTypes;
class onJoinScript extends Api implements Types{
protected $onJoinScriptAPI;
protected $PLAYER;
public function __construct(Player $player, Server $server, Api $onJoinScriptAPI){
		$this->player = $player;
        $this->server = $server;
        $this->api = $onJoinScriptAPI;
}

public function getApi(){
     return $this->api;
}

public function getPlayer(){
     return $this->player;
}
	
public function getServer(){
     return $this->server;
}
}
