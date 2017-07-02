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


namespace pocketmine\updater;


use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;
use pocketmine\utils\Utils;

class UpdateCheckTask extends AsyncTask{

	/** @var string */
	private $endpoint;
	/** @var string */
	private $channel;
	/** @var string */
	private $error;

	public function __construct(string $endpoint, string $channel){
		$this->endpoint = $endpoint;
		$this->channel = $channel;
	}

	public function onRun(){
		$this->error = "";
		$response = Utils::getURL($this->endpoint . "?channel=" . $this->channel, 4, [], $this->error);
		if($this->error !== ""){
			return;
		}else{
			$response = json_decode($response, true);
			if(is_array($response)){
				$this->setResult(
					[
						 "version" => $response["version"],
						 "api_version" => $response["api_version"],
						 "build" => $response["build"],
						 "date" => $response["date"],
						 "details_url" => $response["details_url"] ?? null,
						 "download_url" => $response["download_url"]
					],
					true
				);
			}else{
				$this->error = "Invalid response data";
			}
		}
	}

	public function onCompletion(Server $server){
		if($this->error !== ""){
			$server->getLogger()->debug("[AutoUpdater] Async update check failed due to \"$this->error\"");
		}else{
			$updateInfo = $this->getResult();
			if(is_array($updateInfo)){
				$server->getUpdater()->checkUpdateCallback($updateInfo);
			}else{
				$server->getLogger()->debug("[AutoUpdater] Update info error");
			}

		}
	}
}