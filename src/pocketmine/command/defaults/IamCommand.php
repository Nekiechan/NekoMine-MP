<?php

declare(strict_types=1);

namespace pocketmine\command\defaults;

use pocketmine\command\CommandSender;
use pocketmine\event\TranslationContainer;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class IamCommand extends VanillaCommand{

	public function __construct($name){
		parent::__construct(
			$name,
      "Action Command",
			"/iam <action>"
		);
		$this->setPermission("pocketmine.command.iam");
	}

	public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}

		if(count($args) === 0){
      $sender->sendMessage("§l§cPut a action! §a/iam <action>");
			return false;
		}
   $sender->getServer()->broadcastMessage("§a×§c" . $sender->getName() . " §a" . implode(" ", $args)  . "!×");

		
		return true;
	}
}
