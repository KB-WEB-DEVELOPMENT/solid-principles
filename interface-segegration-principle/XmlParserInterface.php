<?php
declare(strict_types=1);

namespace myClasses;

interface XmlParserInterface
{
    public function parseXml(): array;
}