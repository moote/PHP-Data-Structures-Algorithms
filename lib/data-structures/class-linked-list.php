<?php

namespace PDSA;

use Exception;
use InvalidArgumentException;

/**
 * Array wrapper class the implements simple queue functions
 * - the list nodes can only accept int data types
 * - the list has no fixed size
 * 
 */
class LinkedList {
    /** @var ListNode */
    private $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function getHead() {
        return $this->head;
    }

    public function insertAtBeginning(int $value) {
        $this->renderList("LinkedList::insertAtBeginning: {$value}<br>Start: ");
        
        $newNode = new ListNode($value, $this->head);
        $this->head = ($newNode);
        
        $this->renderList('End: ', '<br>');
    }

    public function insertAfter(ListNode $prevNode, int $value) {
        $this->renderList("LinkedList::insertAfter: {$value}<br>Start: ");
        
        $newNode = new ListNode($value, $prevNode->getNext());
        $prevNode->setNext($newNode);
        
        $this->renderList('End: ', '<br>');
    }

    public function insertAtEnd(int $value) {
        $this->renderList("LinkedList::insertAtEnd: {$value}<br>Start: ");

        $newNode = new ListNode($value);

        if(is_null($this->head)){
            $this->head = $newNode;
        }
        else{
            $lastNode = $this->head;

            while(!is_null($lastNode->getNext())){
                $lastNode = $lastNode->getNext();
            }

            $lastNode->setNext($newNode);
        }

        $this->renderList('End: ', '<br>');
    }

    public function deleteNodeAt(int $position) {
        $this->renderList('Start: ');

        if(!is_null($this->head)){
            $tempNode = $this->head;
        }

        if($position === 0){
            $this->head = $tempNode->getNext();
        }
        else{
            for($i = 0; !is_null($tempNode) && $i < $position - 1; $i++){
                $tempNode = $tempNode->getNext();
            }

            if(!is_null($tempNode) && !is_null($tempNode->getNext())){
                $nextNode = $tempNode->getNext()->getNext();
                $tempNode->setNext($nextNode);
            }
        }

        $this->renderList('End: ');
    }

    public function search(int $value) {
        $currentNode = $this->head;

        while(!is_null($currentNode)){
            if($currentNode->getValue() === $value){
                return true;
            }

            $currentNode = $currentNode->getNext();
        }

        return false;
    }

    public function sort() {
        $this->renderList("LinkedList::sort:<br>Start: ");

        $currentNode = $this->head;
        $indexNode = null;
        $tempValue = null;

        while(!is_null($currentNode)){
            $indexNode = $currentNode->getNext();

            while(!is_null($indexNode)){
                if($currentNode->getValue() > $indexNode->getValue()){
                    $tempValue = $currentNode->getValue();
                    $currentNode->setValue($indexNode->getValue());
                    $indexNode->setValue($tempValue);
                }

                $indexNode = $indexNode->getNext();
            }

            $currentNode = $currentNode->getNext();
        }

        $this->renderList('End: ', '<br>');
    }

    public function renderList($prefix = '', $suffix = '') {
        $currentNode = $this->head;
        $str = "{$prefix}HEAD >> ";
        while(!is_null($currentNode)){
            $str .= "{$currentNode->getValue()} >> ";
            $currentNode = $currentNode->getNext();
        }
        $str .= "NULL<br>$suffix";
        echo $str;
    }
}

class ListNode {
    /** @var int */
    private $value;

    /** @var ListNode */
    private $next;

    public function __construct(int $value, ListNode $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }

    public function setValue(int $value) {
        return $this->value = $value;
    }

    public function setNext(ListNode $next) {
        return $this->next = $next;
    }

    /**
     * @return int
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @return ListNode|null
     */
    public function getNext() {
        return $this->next;
    }
}