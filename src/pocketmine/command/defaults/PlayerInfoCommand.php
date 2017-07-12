<?php
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
             $sender->sendMessage("§aPlayer IsOP: §r" . $player->isOp());
             $sender->sendMessage("§aPlayer Gamemode: §r" . $player->getGamemodeString());
             $sender->sendMessage("§aPlayer SkinData: §r" . $player->getSkinData());
             $sender->sendMessage("§aPlayer Health: §r" . $player->getHealth());
             $sender->sendMessage("§aPlayer Client Secret: §r" . $player->getClientSecret());
             return true;
		}else{
             $sender->sendMessage(new TranslationContainer("commands.generic.player.notFound"));
		}
	
  
	}
}