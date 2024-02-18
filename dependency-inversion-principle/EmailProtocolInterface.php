<?php
declare(strict_types=1);

namespace myClasses;

interface EmailProtocolInterface
{    
  public function protocol(): string;
	
  public function connect(string $mailbox,string $user,string $password,int $flags=0,int $n_retries=0,array $options=[]): bool;

}
