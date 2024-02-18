<?php

declare(strict_types=1);

namespace myClasses;

final class ZipArchiveFactory
{
	public function __construct(
        private ZipArchive $zipArchive		
	) {}

	public function openFile(string $filename,int $flags = 0): bool
        {
		$res = $this->zipArchive->open($filename,$flags); // returns bool or int
			
		return ($res == true) ? true : false;		
	}

	public function closeFile(): bool
        {
		$res = $this->zipArchive->close();
		
		return $res == true;
	}	
}
