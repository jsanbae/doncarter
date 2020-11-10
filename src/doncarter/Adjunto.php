<?php

namespace DonCarter;

class Adjunto {
	
	private $filepath;
	private $type;
	private $filename;

	function __construct ($_filepath, $_type, $_filename = '')
	{
		$this->filepath = $_filepath;
		$this->type = $_type;
		$this->filename = $_filename;
	}

	public function getFilepath()
	{
		return $this->filepath;
	}

	public function getType()
	{
		return $this->type;
	}

	public function getFilename()
	{
		return $this->filename;
	}


}