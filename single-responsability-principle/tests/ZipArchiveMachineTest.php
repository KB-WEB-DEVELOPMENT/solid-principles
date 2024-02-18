<?php 

declare(strict_types=1);

namespace myTests;

use myClasses\ZipArchiveMachine;
use myClasses\ZipArchiveFactory;

use PHPUnit\Framework\TestCase;

final class ZipArchiveMachineTest extends TestCase
{
    public function canOpenValidFile(): void
    {
        $zipArchive = new ZipArchive();
		
		$result = (new ZipArchiveFactory($zipArchive))->openFile('test.zip',0);
		
		$this->assertTrue($result);
	}
	
	public function canReplaceValidFile(): void
    {
		$zipArchive = new ZipArchive();
		
		new ZipArchiveFactory($zipArchive))->openFile('test.zip',0);

		$result = $zipArchive->replaceFile('/dir1/dir2/test.txt',1)
	 	 
		$this->assertTrue($result); 
    }

	public function canCloseValidFile(): void
    {
        $zipArchive = new ZipArchive();
		
		(new ZipArchiveFactory($zipArchive))->openFile('test.zip',0);
        
		$result = (new ZipArchiveFactory($zipArchive))->close();
	
		$this->assertTrue($result); 	
	}

    public function cannotOpenInvalidFile(): void
    {
        
		$zipArchive = new ZipArchive();
		
		$result = (new ZipArchiveFactory($zipArchive))->openFile('test.zi',0);
		
		$this->assertFalse($result);
		
    }	
	
	// similarly for the last two tests, ie: cannotCopyInvalidFile, cannotCloseInvalidFile 
		
}
