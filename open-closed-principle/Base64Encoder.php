<?php
declare(strict_types=1);

namespace myClasses;

final class Base64Encoder implements EncoderInterface
{	
    private function encode(string $data): string
    {
        return base64_encode($data);
    }	
}
