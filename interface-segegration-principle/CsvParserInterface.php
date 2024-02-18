<?php
declare(strict_types=1);

namespace myClasses;

interface CsvParserInterface
{
    public function parseCsv(): array;
}
