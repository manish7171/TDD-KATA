<?php

namespace App;

class BinarySearchTree
{
	public $root = null;
    
    public function insert($value)
    {
        $current = null;

        $node = new Node($value);

        if (!$this->root) {
            $this->root = $node;

        } else {
            $current = $this->root;

            $parent = null;

            while (true) {
                $parent = $current;

                if ($node->data < $parent->data) {
                    $current = $current->left;

                    if ($current == NULL) {
                        $parent->left = $node;
                        return;
                    }
                } else {
                    $current = $current->right;

                    if ($current == NULL) {
                        $parent->right = $node;
                        return;
                    }
                }
            }
        }
    }
}

class Node
{
    public  $data   =  null;
    public  $left   =  null;
    public  $right  =  null;
    
    public function __construct($data)
    {
        $this->data = $data;
         
    }
}
