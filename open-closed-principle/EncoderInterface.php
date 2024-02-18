<?php

declare(strict_types=1);

namespace myClasses;

final class EncoderInterface
{	
	public function encode(string $data): string;	
}
