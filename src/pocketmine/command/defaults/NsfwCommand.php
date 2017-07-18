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
declare(strict_types=1);
namespace pocketmine\command\defaults;
use pocketmine\command\CommandSender;
use pocketmine\event\TranslationContainer;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class nsfwCommand extends VanillaCommand{

	public function __construct($name){
		parent::__construct(
			$name,
      "Enable/Disable NSFW on this server!",
			"/nsfw <true|false|on|off|1|0>"
		);
		$this->setPermission("pocketmine.command.nsfw");
	}

	public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}

		if(count($args) === 0){
      $sender->sendMessage("§l§c/nsfw <true|false|on|off|1|0>");
			return false;
		}
    $sent = implode(" ", $args);
    $prefix = $sender->getServer()->getNekoMineConfigValue("server-prefix", "[A-NekoMine-Server]");
    $getnsfw = $sender->getServer()->getNekoMineConfigValue("enable-nsfw", false);
    if($getnsfw === false){
     if($sent === true){
      $sender->sendMessage("§l§a" . $prefix . "> §r§aEnabled NSFW on this server!");
     return true;
     }else{
     
     return false;
     }
    }else{
     if($sent === false){
     
     return true;
     }else{
     
     return false;
     }
    }
		
		return true;
	}
}
