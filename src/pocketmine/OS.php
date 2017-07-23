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
namespace pocketmine\OS;
use pocketmine\Player;
use pocketmine\Server;

class OS {
     private $Player;
     private $PlayerOS;
     private $PlayerModel;
     private $data;
     public function __construct(Player $player){
     $this->Player = $Player;
     $this->PlayerOS = $Player->OSnumToString($Player->getDeviceOS());
     $this->PlayerModel = $Player->getDeviceModel();
     $this->Data = $data;
     }
     //Returns player
     public function getPlayer(){
          return $this->Player;
     }
     //Returns string
     public function getPlayerOS(){
          return $this->PlayerOS;
     }
     //Returns string
     public function getPlayerModel(){
          return $this->PlayerModel;
     }
     
     public function getOS(Player $other){
          return $other->OSnumToString($other->getDeviceOS());
     }
     
     public function getModel(Player $other){
          return $other->getDeviceModel();
     }
     //check to see if the OS a player is using is "blocked"
	 //returns a bool
     public function supportedOS(Player $player){
          if(Server::getInstance()->getNekoMineConfigValue("enable-blocking",false)){
			  //check to see if blocking is enabled in config
               if(Server::getInstance()->getNekoMineConfigValue("block-windows", false)){
                 return true;
               }else if(Server::getInstance()->getNekoMineConfigValue("block-win32", false)){
                 return true;
               }else if(Server::getInstance()->getNekoMineConfigValue("block-android", false)){
                 return true;
               }else if(Server::getInstance()->getNekoMineConfigValue("block-ios", false)){
                 return true;
               }else if(Server::getInstance()->getNekoMineConfigValue("block-fireos", false)){
                 return true;
               }else if(Server::getInstance()->getNekoMineConfigValue("block-osx", false)){
                 return true;
               }else if(Server::getInstance()->getNekoMineConfigValue("block-gearvr", false)){
                 return true;
               }else if(Server::getInstance()->getNekoMineConfigValue("block-hololens", false)){
                 return true;
               }else if(Server::getInstance()->getNekoMineConfigValue("block-dedicated", false)){
                 return true;
               }
		  }else{
			return false;  
		  }
     }
     
}
