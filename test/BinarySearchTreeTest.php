<?php
 /*   The left subtree of a node contains only nodes with keys lesser than the node’s key.
    The right subtree of a node contains only nodes with keys greater than the node’s key.
    The left and right subtree each must also be a binary search tree.*/

use PHPUnit\Framework\TestCase as TestCase;

use App\BinarySearchTree;

class BinarySearchTreeTest extends TestCase
{
	public function testShouldReturnTrue()
	{
		$bst = new BinarySearchTree();

		$bst->insert(1);
		$bst->insert(2);
		$bst->insert(3);
		$bst->insert(4);
		$bst->insert(5);
		$bst->insert(5);
		$bst->insert(6);
		$bst->insert(6);
		$bst->insert(7);
		$bst->insert(8);

		print_r($bst->root);
	}
}

class Node
{
	public $data = null;
	public $left = null;
	public $right = null;
	public function __construct($data)
	{
		$this->data = $data;
	}
}
