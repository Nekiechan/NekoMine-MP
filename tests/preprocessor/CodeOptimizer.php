<?php

$opts = getopt("", ["path:"]);

if(!isset($opts["path"])){
	exit(1);
}

$path = realpath($opts["path"]);

foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $path => $f){
	if(substr($path, -4) !== ".php"){
		continue;
	}
	$oldTree = $tree = token_get_all(file_get_contents($path));
	fastOptimize($tree);
	if($tree !== $oldTree){
		echo "Optimized $path\n";
		file_put_contents($path, recreateTree($tree));
	}
	//var_dump($oldTree);
}

function fastOptimize(array &$tree){
	$constantOptimize = [
		"PHP_INT_MAX" => true,
		"PHP_INT_SIZE" => true,
		"PHP_EOL" => true,
		"TRUE" => true,
		"FALSE" => true,
		"NULL" => true,
		"ENDIANNESS" => true,
	];
	foreach($tree as $index => &$token){
		if(is_array($token)){
			if($token[0] === T_STRING and ($before = getBefore($tree, $index)) !== "\\"){
				if(isset($constantOptimize[strtoupper($token[1])]) and $before !== "::" and $before !== "->"){
					$token[1] = "\\" . $token[1]; //Constant fetch optimization
				}elseif(function_exists($token[1]) and $before !== "::" and $before !== "->" and $before !== "function" and getAfter($tree, $index) === "("){
					$token[1] = "\\" . $token[1]; //Function call optimization
				}
			}
		}else{

		}

	}
}

function getAfter(array $tree, $current){
	do{
		$token = $tree[++$current];
		if(is_array($token)){
			if($token[0] === T_WHITESPACE or $token[0] === T_COMMENT or $token[0] === T_DOC_COMMENT){
				continue;
			}
			return $token[1];
		}else{
			return $token;
		}
	}while(isset($tree[$current]));

	return null;
}

function getBefore(array $tree, $current){
	do{
		$token = $tree[--$current];
		if(is_array($token)){
			if($token[0] === T_WHITESPACE or $token[0] === T_COMMENT or $token[0] === T_DOC_COMMENT){
				continue;
			}
			return $token[1];
		}else{
			return $token;
		}
	}while(isset($tree[$current]));

	return null;
}



function recreateTree($tree){
	$output = "";

	foreach($tree as $token){
		if(is_array($token)){
			$output .= $token[1];
		}else{
			$output .= $token;
		}
	}

	return $output;
}