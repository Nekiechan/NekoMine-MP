<?php
declare(strict_types=1);
namespace pocketmine\command\defaults;
use pocketmine\command\CommandSender;
use pocketmine\event\TranslationContainer;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
class FirstplayedCommand extends VanillaCommand{
	public function __construct($name){
		parent::__construct(
			$name,
      "Gets a players first played",
			"/firstplayed <player>"
		);
		$this->setPermission("pocketmine.command.firstplayed");
	}
	public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}
	if(count($args) < 2){
			$sender->sendMessage(new TranslationContainer("commands.generic.usage", [$this->usageMessage]));
			return false;
   }
   $name = strtolower(array_shift($args));
   $player = $sender->getServer()->getPlayer($name);
   $sender->sendMessage("- - - " . $player->getName() . "'s Data - - -");
   $sender->sendMessage("§aFirstPlayed: §r" . $player->getFirstPlayed());
		return true;
	}
}
