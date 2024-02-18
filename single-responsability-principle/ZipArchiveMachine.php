<?php

declare(strict_types=1);

namespace myClasses;

final class ZipArchiveMachine
{
    public function __construct(
        private ZipArchiveFactory $zipArchiveFactory
    ) {}
	
     private function replaceFile(string $filepath,int $index,int $length = ZipArchive::LENGTH_TO_END,int $start = 0,int $flags=0): bool
     {
         if (($this->zipArchiveFactory(new ZipArchive())->openFile($filepath,$flags)) == FALSE)
	 {
		throw new RuntimeException("The ZipArchiveFactory was unable to open the file located at {$filepath}.");
	  } else {
		   $this->ZipArchiveFactory(new ZipArchive())->openFile($filepath,$flags);
		}
		
	 if (((new ZipArchive())->replaceFile($filepath,$index,$length,$start,$flags)) == FALSE)
	 {
	    throw new RuntimeException("ZipArchiveMachine is unable to replace the file at {$filepath}.");
	  } else {
	      (new ZipArchive())->replaceFile($filepath,$index,$length,$start,$flags);
	    }	

	 if (($this->zipArchiveFactory(new ZipArchive())->closeFile()) == FALSE)
	 {
	   throw new RuntimeException("The ZipArchiveFactory was unable to close the file previously opened at {$filepath}.");
	 } else {
	    $this->zipArchiveFactory(new ZipArchive())->closeFile();
		
	    return true;
	 }

       return false;
    }	
}
