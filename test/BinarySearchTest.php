<?php

use PHPUnit\Framework\TestCase as TestCase;

use App\BinarySearch;

class BinarySearchTest extends TestCase
{
	public function testShouldReturnTrue()
	{
		$bts = new BinarySearch();
		self::assertTrue($bts->search([41,52,63,84,25,16,37,88,99,100,101],101));
		self::assertTrue($bts->search([41,88,63,84,25,16,37,88,88,100],88));
		//self::assertFalse($bts->search([99,100],101));
		self::assertTrue($bts->search([41,52,63,84,25,16,37,88,99,100],41));
		//self::assertTrue($bts->search([41,52,63,84,25,16,37,88,99,100],101));
		self::assertTrue($bts->search([1,2,3,4,5,6,7,8,9,10],10));
		//self::assertTrue($bts->search([7,8,9,10],10));
		self::assertTrue($bts->search([1,2,3,4,5,6,7,8,9,10],7));
		self::assertTrue($bts->search([7,8,9,10],7));
		self::assertTrue($bts->search([7,8],7));
		self::assertTrue($bts->search([1,2,3,4,5],2));
		self::assertTrue($bts->search([1,2,3],1));
		self::assertTrue($bts->search([1,2],1));
		self::assertTrue($bts->search([1,2,3,4,5],2));
		self::assertTrue($bts->search([1,2,3,4,5,6,7,8,9,10],2));
		self::assertTrue($bts->search([1,2,3,4,5,6,7,8,9,10],3));
		self::assertTrue($bts->search([1,2,3,4,5,6,7,8,9,10],4));
		self::assertTrue($bts->search([1,2,3,4,5,6,7,8,9,10],5));
		self::assertTrue($bts->search([1,2,3,4,5,6,7,8,9,10],6));
		self::assertTrue($bts->search([1,2,3,4,5,6,7,8,9,10],7));
		self::assertTrue($bts->search([1,2,3,4,5,6,7,8,9,10],8));
		self::assertTrue($bts->search([1,2,3,4,5,6,7,8,9,10],9));
		//self::assertTrue($bts->search([1,2,3,4,5,6,7,8,9,10],10));
	}
}
