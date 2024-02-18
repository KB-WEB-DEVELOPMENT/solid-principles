<?php 

declare(strict_types=1);

namespace myTests;

use myClasses\EmailProtocolInterface;
use myClasses\ImapProtocol;
use myClasses\Pop3Protocol;
use myClasses\UserManager;

use PHPUnit\Framework\TestCase;

final class ProtocolsTest extends TestCase
{
   
	/*
	
	Because of time constraints, I will refrain from writing all tests here.
	The ideas are the same as all tests in this repository.
	
	In particular, we want to test to run the following tests.
	
	- test valid/invalid IMAP port number and valid/invalid POP3 port number
	- test can connect with valid connection with (1) valid IMAP port number and (2) valid POP3 port number
	- test cannot connect with invalid connection with (1) valid IMAP port number and (2) valid POP3 port number
	
	*/
}
