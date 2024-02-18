<?php

declare(strict_types=1);

namespace myClasses;

final class GenericEncoder
{
	public function __construct(
		private	EncoderFactory $encoderFactory
	){}
	
	public function encodeString(string $format): string
	{
		$encoder = $this->encoderFactory->createEncoderForFormat($format);

		return $encoder->encode($data);
	}
}