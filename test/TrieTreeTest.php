<?php
use PHPUnit\Framework\TestCase as TestCase;

use App\TrieTree;

class TrieTreeTest extends TestCase
{
	public function testShouldReturnTrue()
	{
		$tt = new TrieTree();

		$tt->insert("abs");
		$tt->insert("abba");
		$tt->insert("cat");
		$tt->insert("catch");
		$tt->insert("abba");

        $tt->preOrderPrint($tt->root);
        
	}
}

