<?php
namespace App;

class TrieTree
{
    public $root = null;
    const CASE = "a";
    private $outputWord = [];

    public function insert($word)
    {
        if (!$this->root) {
            $this->root = new Node(); 
        }
        
        $currentNode = $this->root;
        
        $splitWord = str_split($word);

        foreach($splitWord as $char) {
            $slot = ord($char)-ord(self::CASE);
            
            if (!isset($currentNode->children[$slot])) {
                $currentNode->children[$slot] = new Node();
                $currentNode->children[$slot]->parent = $currentNode; 
            }      

           $currentNode = $currentNode->children[$slot]; 
        }

       ++$currentNode->occurence; 
        
    }

    public function search($word)
    {
        $currentTrie = $this->root;
        
        $splitWord = str_split($word);
        foreach($splitWord as $char) {
            $slot = ord($char)-ord(self::CASE);

            if (isset($currentTrie->children[$slot])) {
                $currentTrie = $currentTrie->children[$slot]; 
            } else return NULL;
        }

        return ($currentTrie->occurence > 0 ? $currentTrie : NULL);

    }

    public function delete($word)
    {
        $currentNode = $this->search($word);
        
        if (isset($currentNode)) {
            --$currentNode->occurence;
            $parent = NULL;
            $isLeaf = true;
            
            for ($i = 0; $i < 26; $i) {
                if (isset($currentNode->children[$i])) {
                    $isLeaf = false;
                   break; 
                }
            }

            while (!isset($currentNode->parent) && $isLeaf && $currentNode->occurence == 0 ) {
                $parent = $curentNode->parent;
                
                for ($i = 0; $i < 26; $i) {
                    if ($parent->children[$i] == $currentNode) {
                        $parent->children[$i] == NULL;
                        unset($currentNode);
                        $currentNode = $parent; 
                    } elseif (isset($parent->children[$i])) {
                        $isLeaf = false;
                        break; 
                    } 
                }
   
                 
            }
        }    
    }

    public function preOrderPrint($node)
    {
        $currentNode = $node;
        if ($currentNode->occurence > 0) {
            for ($i = 0 ; $i < count($this->outputWord); $i++) {
                echo $this->outputWord[$i];  
            }  
            echo " ".$currentNode->occurence."\n";
        }
        
        for ($i = 0; $i < 26; $i++) {
            if (isset($currentNode->children[$i])) {
                array_push($this->outputWord, chr(ord(self::CASE) + $i));
                $this->preOrderPrint($currentNode->children[$i]); 
                array_pop($this->outputWord);
            } 
        }
        
    }
}


class Node
{
    public $parent = null;
    public $occurence = 0;
    public $children = [];
}
