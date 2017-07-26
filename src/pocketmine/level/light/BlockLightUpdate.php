Skip to content
This repository
Search
Pull requests
Issues
Marketplace
Gist
 @Nekiechan
 Sign out
 Watch 118
  Star 483
 Fork 288 pmmp/PocketMine-MP
 Code  Issues 87  Pull requests 13  Projects 4  Wiki Insights 
Branch: master Find file Copy pathPocketMine-MP/src/pocketmine/level/light/BlockLightUpdate.php
8919d4a  on Jun 17
@dktapps dktapps Some refactoring to allow for light updates to be executed asynchrono…
1 contributor
RawBlameHistory    
35 lines (29 sloc)  1.02 KB
<?php
/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/
declare(strict_types=1);
namespace pocketmine\level\light;
class BlockLightUpdate extends LightUpdate{
	public function getLight(int $x, int $y, int $z) : int{
		return $this->level->getBlockLightAt($x, $y, $z);
	}
	public function setLight(int $x, int $y, int $z, int $level){
		$this->level->setBlockLightAt($x, $y, $z, $level);
	}
}
Contact GitHub API Training Shop Blog About
© 2017 GitHub, Inc. Terms Privacy Security Status Help
