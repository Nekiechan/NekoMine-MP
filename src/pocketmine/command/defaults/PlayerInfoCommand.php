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
use pocketmine\utils\TextFormat;
class PlayerInfoCommand extends VanillaCommand{
	public function __construct($name){
		parent::__construct(
			$name,
      "Gets a players data!",
			"/playerinfo <player>"
		);
		$this->setPermission("pocketmine.command.playerinfo");
	}
	public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}
if(count($args) === 0){
   $sender->sendMessage(new TranslationContainer("commands.generic.player.notFound"));
return false;
}
        $name = strtolower(array_shift($args));
        $player = $sender->getServer()->getPlayer($name);
		if($player instanceof Player){
			       $sender->sendMessage("- - - " . $player->getName() . "'s Data - - -");
             $sender->sendMessage("§aFirstPlayed: §r" . $player->getFirstPlayed());
             $sender->sendMessage("§aPlayer Ip/port: §r" . $player->getAddress() . "§a:§r" . $player->getPort());
             $sender->sendMessage("§aPlayer ClientId: §r" . $player->getClientId());
             $sender->sendMessage("§aPlayer IsOP: §r" . $player->isOp() . " Note: no value means not OP!");
             $sender->sendMessage("§aPlayer Gamemode: §r" . $player->getGamemodeString());
             $sender->sendMessage("§aPlayer Health: §r" . $player->getHealth());
             $sender->sendMessage("§aPlayer OS: §r" . $player->getDeviceOS());
			 $sender->sendMessage("§aPlayer Model: §r" . $player->getDeviceModel());
             return true;
		}else{
             $sender->sendMessage(new TranslationContainer("commands.generic.player.notFound"));
		}
	
  
	}
}
