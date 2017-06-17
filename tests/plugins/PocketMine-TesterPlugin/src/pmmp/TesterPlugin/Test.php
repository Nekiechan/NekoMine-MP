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

namespace pmmp\TesterPlugin;

abstract class Test{
	const RESULT_WAITING = -1;
	const RESULT_OK = 0;
	const RESULT_FAILED = 1;
	const RESULT_ERROR = 2;

	private $plugin;
	private $result = Test::RESULT_WAITING;
	private $startTime;
	private $timeout = 60; //seconds

	public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}
	
	public function getPlugin() : Main{
		return $this->plugin;
	}

	final public function start(){
		$this->startTime = time();
		try{
			$this->run();
		}catch(\Throwable $e){
			$this->getPlugin()->getLogger()->logException($e);
			$this->setResult(Test::RESULT_ERROR);
		}
	}

	abstract public function tick();

	abstract public function run();
	
	public function isFinished() : bool{
		return $this->result !== Test::RESULT_WAITING;
	}
	
	public function isTimedOut() : bool{
		return !$this->isFinished() and time() - $this->timeout > $this->startTime;
	}

	protected function setTimeout(int $timeout){
		$this->timeout = $timeout;
	}

	public function getResult() : int{
		return $this->result;
	}

	public function setResult(int $result){
		$this->result = $result;
	}

	abstract public function getName() : string;

	abstract public function getDescription() : string;
}