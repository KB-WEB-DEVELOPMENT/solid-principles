<?php

declare(strict_types=1);

namespace myClasses;

final class UrlEncoder implements EncoderInterface
{
   private function encode(string $data): string
   {  
      return urlencode($data);
   }	
}
