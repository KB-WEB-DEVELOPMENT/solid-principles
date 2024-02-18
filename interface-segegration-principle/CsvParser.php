<?php
declare(strict_types=1);

namespace myClasses;

final class CsvParser implements CsvParserInterface
{
	public function __construct(
		public array $configCsvRead,
		public array $configCsvLineRead,
		public array $parsedCsvArray,
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
			}	else {
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
							) !== false)	{
						
								$data = $this->csvLine(
												$this->configCsvLineRead['stream'],
												$this->configCsvLineRead['length'],
												$this->configCsvLineRead['separator'],
												$this->configCsvLineRead['enclosure'],
												$this->configCsvLineRead['escape']);
												
								$this->parsedCsvArray[] = $data;												
							}

					} catch (Exception $e) {
							echo 'The csv file can be opened but cannot be properly read. Check the file.';
					}
				
					if ($this->closeCsvFile($openedCsvFile) == false {
						throw new RuntimeException('Cannot close CSV file.');
					} else {
						$this->closeCsvFile($openedCsvFile);
					}	

					return $this->parsedCsvArray;
			
				}
			
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
	
}