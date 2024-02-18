<?php

/*
We attempt to illustrate the Liskov substitution principle keeping
in mind the following three characteristics of this principle: 

(I am not sure how to implement the third one.)

1. Method arguments of the subtype should be contravariant.
2  Method return types of the subtype should be covariant.
3. No new exceptions should be thrown by methods of the subtype, except where those exceptions are themselves subtypes of exceptions.

(I am not sure how to implement the third one.)
*/

declare(strict_types=1);

namespace myTests;

use myClasses\FamilyInterface;
use myClasses\FamilyWealthInteface;
use myClasses\GrandFatherWealthInterface;
use myClasses\FatherWealthInterface;

use myClasses\GrandFatherClass;
use myClasses\FatherClass;

use myClasses\FamilyWealth;
use myClasses\GrandFatherWealth;

use PHPUnit\Framework\TestCase;

final class WealthTest extends TestCase
{
    public function subtypeMethodArgIsContravariant(): void
    {
		
		$method = new ReflectionMethod(GrandFatherClass::class,'getWealth');

		$params = $method->getParameters();

		$method_args_types_array = [];

		foreach ($params as $param) {
			$method_args_types_array[] = $param->getName()->getType();
		}
		
		$boolResult = is_subclass_of($method_args_types_array[0],FamilyInterface::class);
		
		$this->assertTrue($boolResult);

	}

    public function subtypeMethodReturnTypeIsCovariant(): void
    {
		$fc = new FatherClass();	   
		
		$gfw =  new GrandFatherWealth();
		
		$res = $fc->getWealth($gfw);
		
		$boolResult = is_subclass_of($res,FamilyWealth::class);

		$this->assertTrue($boolResult);
	}
}
