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

		$node1 = new Node(8);
		$node2 = new Node(3);
		$node3 = new Node(10);
		$node4 = new Node(1);
		$node5 = new Node(6);
		$node6 = new Node(14);
		$node7 = new Node(4);
		$node8 = new Node(7);
		$node9 = new Node(3);
		$node10 = new Node(2);

		$bst->insert($node1);
		$bst->insert($node2);
		$bst->insert($node3);
		$bst->insert($node4);
		$bst->insert($node5);
		$bst->insert($node6);
		$bst->insert($node7);
		$bst->insert($node8);
		$bst->insert($node9);
		$bst->insert($node10);

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
