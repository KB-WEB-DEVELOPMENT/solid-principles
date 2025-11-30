<?php
declare(strict_types=1);

namespace myClasses;

final class MultiFormatParser implements CsvParserInterface,XmlParserInterface
{
    public function __construct(
	public array $configCsvRead,
	public array $configCsvLineRead,
	public array $parsedCsvArray,
	public bool  $enableErrorsHandling = true
    ) {}
	
    public function parseCsv(): array
    {	 						
       if ($this->isCsvReadable(
	    	$this->configCsvRead['filepath'],
	    	$this->configCsvRead['mode'],
	    	$this->configCsvRead['include_path'],
            $this->configCsvRead['context']
          ) == false) {
	   			throw new RuntimeException('Cannot open CSV file.');
	   } else {
	    		$openedCsvFile = $this->CsvFilePointResource(
		                  				  $this->configCsvRead['filepath'],
										  $this->configCsvRead['mode'],
										  $this->configCsvRead['include_path'],
										  $this->configCsvRead['context']
								 );	    
				try {
					  while ($this->isACsvLineReadable(
					   				$this->configCsvLineRead['stream'],
								    $this->configCsvLineRead['length'],
								    $this->configCsvLineRead['separator'],
								    $this->configCsvLineRead['enclosure'],
								    $this->configCsvLineRead['escape']
			             			) !== false)  {			
				      						$data = $this->csvLine(
											          	$this->configCsvLineRead['stream'],
														$this->configCsvLineRead['length'],
														$this->configCsvLineRead['separator'],
														$this->configCsvLineRead['enclosure'],
														$this->configCsvLineRead['escape']
				      					 	);
						
				      					$this->parsedCsvArray[] = $data;												
									}

	     			 } catch (Exception $e) {
	        			echo 'The csv file can be opened but cannot be properly read. Check the file.';
	     			}	       
          }		
	
	   	   if ($this->closeCsvFile($openedCsvFile) == false {
				throw new RuntimeException('Cannot close CSV file.');
	   	    } else {
	      		$this->closeCsvFile($openedCsvFile);
           }
		   
	    	return $this->parsedCsvArray;
      }
						
      public function isCsvReadable(string $filepath,string $mode,bool $use_include_path = false,?resource $context = null):  bool
      {
		 	return is_bool(fopen($filepath,$mode,$use_include_path,$context)) ? false : true;
      }

      public function CsvFilePointResource(string $filepath,string $mode,bool $use_include_path = false,?resource $context = null):  resource
      {
			return fopen($filepath,$mode,$use_include_path,$context);
      }	
	
      public function isACsvLineReadable(resource $stream,?int $length = null,string $separator = ",",string $enclosure = "\"",string $escape = "\\"):  bool
      {
			return is_bool(fgetcsv($stream,$length,$separator,$enclosure,$escape)) ? false : true;
      }
	
      public function csvLine(resource $stream,?int $length = null,string $separator = ",",string $enclosure = "\"",string $escape = "\\"):  array|bool
      {
    		return fgetcsv($stream,$length,$separator,$enclosure,$escape);
      }	
	
       public function closeCsvFile(resource $stream): bool
       {
	  		return close($stream);
       }	
	
       public function parseXml(string $filename): array
       {	 
	   		libxml_use_internal_errors($this->enableErrorsHandling); // not used here
		
	    	try {
		 		$objXmlDocument = $this->loadXml($filename);
		
		  		if ($objXmlDocument === FALSE) {
		      		throw new RuntimeException("Something is wrong with the XML file, it cannot be loaded. Check the file");
		  		}				
	     	}	
		
	        try {
		  		$objJsonDocument = $this->jsonEncode($objXmlDocument);
		
		  		if ($objJsonDocument === FALSE) {
	             	throw new RuntimeException("The XML file could not be json encoded.");
		   		}				
	     	}
		
	     	try {
		  		$arrayDocument = [];
		  		$arrayDocument = $this->jsonDecode($objJsonDocument);
		
		  		if ($arrayDocument === null) {
			  		throw new RuntimeException("The json file could not be decoded.");
		  		}				
	      	}
		
	      	return $arrayDocument;
	}

	public function loadXml(string $filename,?string $class_name = SimpleXMLElement::class,int $options = 0,string $namespace_or_prefix = "",bool $is_prefix = false):  SimpleXMLElement
	{
		return simplexml_load_file($filename,$class_name,$options,$namespace_or_prefix,$is_prefix);
	}	
		
	public function jsonEncode(mixed $value,int $flags = 0,int $depth = 512):  string
	{
		return json_encode($value,$flags,$depth);
	}

	public function jsonDecode(string $json,?bool $associative = null,int $depth = 512,int $flags = 0): mixed 
	{
		return json_decode($json,$associative,$depth,$flags);
	}

}
