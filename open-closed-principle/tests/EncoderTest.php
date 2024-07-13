<?php 

declare(strict_types=1);

namespace myTests;

use myClasses\EncoderInterface;
use myClasses\Base64Encoder;
use myClasses\UrlEncoder;
use myClasses\GenericEncoder;
use myClasses\EncoderFactory;

use PHPUnit\Framework\TestCase;

final class EncoderTest extends TestCase
{
    public function canEncodeString(): void
    {
	$factory = new EncoderFactory();
	$encoder = (new GenericEncoder($factory))->createEncoderForFormat('url');
		
	$str = $encoder->encode('K â m i');

	$exp = 'K+%C3%A2+m+i';

	$this->assertSame($str,$exp);

    }

    public function cannotFindEncoder(): void
    {
        $this->expectException(InvalidArgumentException::class);
	    
	$factory = new EncoderFactory();
	$encoder = (new GenericEncoder($factory))->createEncoderForFormat('wrong encoder');
		
	$str = $encoder->encode('K â m i'); 
   }
}
