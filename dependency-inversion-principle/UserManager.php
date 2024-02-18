<?php
declare(strict_types=1);

namespace myClasses;

final class UserManager
{
     public function __construct(
        private EmailProtocolInterface $emailProtocol
     ) {}
	
     private function connectToMailServer(): bool
     {
        if ( ($this->emailProtocol->protocol() == 'INVALID IMAP PORT NUMBER') 
	      ||  
	      ($this->emailProtocol->protocol() == 'INVALID POP3 PORT NUMBER')
	   ) {
	        throw new RuntimeException('Your port number is not valid.'); 				
	   } else {			
	     return $this->emailProtocol->connect($mailbox,$user,$password,$flags,$n_retries,$options))
	  }
    }		
}
