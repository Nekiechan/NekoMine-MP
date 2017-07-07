<?php
declare(strict_types=1);

namespace pocketmine\command\defaults;

use pocketmine\command\CommandSender;
use pocketmine\event\TranslationContainer;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class SendpopupCommand extends VanillaCommand{

	public function __construct($name){
		parent::__construct(
			$name,
			"§aSends a popup to a player!",
			"§l§aUsage: §l§d/sendpopup <player> <msg>",
			["sendtip"]
		);
		$this->setPermission("pocketmine.command.sendpopup");
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

		if($player instanceof Player){
			$sender->sendMessage("Message: " . implode(" ", $args) . ", Was sent to: " . $player->getName());
			$player->sendTip(implode(" ", $args));
		}else{
			$sender->sendMessage(new TranslationContainer("commands.generic.player.notFound"));
		}

		return true;
	}
}
