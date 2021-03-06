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
namespace pocketmine\command\defaults;

use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class ClearCommand extends VanillaCommand {

   public function __construct($name){
		parent::__construct(
			$name,
      "Clears a player's inventory!",
			"/clear <player>",
      ["clearinventory","ci"]
		);
		$this->setPermission("pocketmine.command.clear");
	}

    
    public function execute(CommandSender $sender, $currentAlias, array $args){
        if(!$this->testPermission($sender)){
            return true;
        }
		if(count($args) === 1){
if($sender instanceof Player){
if($sender->getServer()->isOp($sender->getName())===true){
			$name = strtolower(array_shift($args));
			$player = $sender->getServer()->getPlayer($name);
			if($player instanceof Player){
			$player->getInventory()->clearAll();
            $player->sendMessage(TextFormat::GREEN . "Your inventory was Cleared!");
            $sender->sendMessage(TextFormat::GREEN . "Successfully cleared " . $player->getDisplayName() . "'s inventory");
            return true;
			}else{
				$sender->sendMessage(TextFormat::RED . "Player does not exist!");
				return true;
			}
}else{
$sender->sendMessage(TextFormat::RED . "You need OP to clear other player's inventories!");
return true;
}
}else{
       //so the Console/Rcon/Plugins can use this to clear people's inventory!
            $name = strtolower(array_shift($args));
			$player = $sender->getServer()->getPlayer($name);
			if($player instanceof Player){
			$player->getInventory()->clearAll();
            $player->sendMessage(TextFormat::GREEN . "Your inventory was Cleared!");
            $sender->sendMessage(TextFormat::GREEN . "Successfully cleared " . $player->getDisplayName() . "'s inventory");
            return true;
			}else{
				$sender->sendMessage(TextFormat::RED . "Player does not exist!");
				return true;
			}
}
        }else if(count($args) === 0){
        if($sender instanceof Player){
            $sender->getInventory()->clearAll();
            $sender->sendMessage(TextFormat::GREEN . "Successfully cleared your inventory");
        }else{
            $sender->sendMessage(TextFormat::RED . "Cannot Clear a Non-Player's inventory! Either run this command ingame or put a correct player!");
        }
}
        return true;
    }
}
