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
namespace pocketmine\block;

use pocketmine\item\Item;

class EndGateway extends Transparent {
    
    protected $id = self::END_GATEWAY;
    
    public function __construct(){
	}
    
   
    
    public function getName() {
        return 'End Gateway';
    }
    
    public function getLightLevel(){
		return 15;
	}
    public function getHardness(){
        return -1;
    }
    public function getResistance(){
        return 18000000;
    }
    public function isBreakable(Item $item){
        return false;
    }
}
