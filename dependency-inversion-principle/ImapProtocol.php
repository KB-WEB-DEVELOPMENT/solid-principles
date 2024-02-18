<?php
declare(strict_types=1);

namespace myClasses;

final class ImapProtocol implements EmailProtocolInterface
{
    public function __construct(
       private EmailProtocolInterface $emailProtocolInterface,
       private int $portNumber
    ) {}
	
    // We could also check if the ports numbers are currently available with fsockopen()
    public function protocol(): string 
    {		
        $protocol = match ($this->portNumber) {
		      143,993 => 'IMAP',
		       default => 'INVALID IMAP PORT NUMBER',
		};	
	return $protocol;
     }
	
    // the port number is included in $mailbox
    public function connect(string $mailbox,string $user,string $password,int $flags=0,int $n_retries=0,array $options=[]): bool 
    {		
       return is_bool(imap_open($mailbox,$user,$password,$flags,$n_retries,$options)) ? false : true;
    }
			
}
