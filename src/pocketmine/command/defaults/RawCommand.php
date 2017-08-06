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

class RawCommand extends VanillaCommand{

	public function __construct($name){
		parent::__construct(
			$name,
      "Say Something without showing your name!",
			"/raw <msg>"
		);
		$this->setPermission("pocketmine.command.raw");
	}

	public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}
    if($sender instanceof Player){
    $sender->sendMessage("§l§cPlease run this in the console!");
    return true;
    }else{
		if(count($args) === 0){
      $sender->sendMessage("§l§cPut a Msg! §a/raw <msg>");
			return false;
		}
   $sender->getServer()->broadcastMessage(TextFormat::RED . "[NOTICE] " . implode(" ", $args));
   }
		return true;
	}
}
