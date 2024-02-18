<?php

declare(strict_types=1);

namespace myClasses;

final class EncoderFactory
{		
	
	public function createEncoderForFormat(string $format): EncoderInterface
    {
		
		try {
				$encoder = match ($format) {
					'base64' => new Base64Encoder(),
					'url' => new  UrlEncoder(),
				};
		
			} catch (\UnhandledMatchError $e) {
				throw new InvalidArgumentException(
					'The encoder type is unknown.'
				);
			}
		
		return $encoder;
		
	}
}	