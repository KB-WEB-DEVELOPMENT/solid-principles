<?php

/*
We attempt to illustrate the Liskov substitution principle keeping
in mind the following three characteristics of this principle: 

1. Method arguments of the subtype should be contravariant.
2  Method return types of the subtype should be covariant.
3. No new exceptions should be thrown by methods of the subtype, except where those exceptions are themselves subtypes of exceptions.

(I am not sure how to implement the third one.)
*/

declare(strict_types=1);

namespace myClasses;

final class FatherClass implements GrandFatherClass 
{
     final public function __construct(/* .... */ ) { /* .... */ }

     public function getWealth(GrandFatherWealthInteface $grandFatherWealth): FamilyWealth
     {
	  // method implementation ...
			
	 return $grandFatherWealth;
     }	
}	
