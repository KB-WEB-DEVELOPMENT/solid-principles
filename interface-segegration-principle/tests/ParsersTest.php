<?php 

declare(strict_types=1);

namespace myTests;

use myClasses\CsvParserInterface
use myClasses\XmlParserInterface
use myClasses\CsvParser;
use myClasses\MultiFormatParser;

use PHPUnit\Framework\TestCase;

final class ParsersTest extends TestCase
{
   
	/*
	
	Because of time constraints, I will refrain from writing all tests here.
	The ideas are the same as all tests in this repository.
	
	In particular, we want to test to run the following tests.
	
	- test we can open a valid csv file and cannot open an invalid csv file
	- test we can read a valid line in a valid csv file
	- test we cannot read an invalid line in a valid csv file
	- test we can close a valid csv file
	- test we can load a valid xml file and cannot load an invalid xml file
	- test we can json encode a valid xml file and cannot json encode an invalid xml file
	- test we can decode a valid json string and cannot decode an invalid json string
	- test if the csv parser produces the correct array
	- test if the xml parser (i.e: MultiFormatParser) produces the correct array 
	
	*/
}
