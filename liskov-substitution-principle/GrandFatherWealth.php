<?php

declare(strict_types=1);

namespace myClasses;

interface GrandFatherWealth extends FamilyWealth
{
	public function getWealth( $familyWealth): FamilyWealth;
}