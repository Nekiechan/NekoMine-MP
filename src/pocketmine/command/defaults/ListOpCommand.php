<?php
declare(strict_types=1);
namespace pocketmine\command\defaults;
use pocketmine\command\CommandSender;
use pocketmine\event\TranslationContainer;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
class ListOpCommand extends VanillaCommand{
	public function __construct($name){
		parent::__construct(
			$name,
      "Lists server Operators",
			"/listop"
		);
		$this->setPermission("pocketmine.command.listop");
	}
	public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}
   $sender->sendMessage("- - - Server Ops - - -");
   $sender->sendMessage($sender->getServer()->getOps());
		return true;
	}
}
