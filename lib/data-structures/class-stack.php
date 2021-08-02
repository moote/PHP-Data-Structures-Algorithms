<?php

namespace PDSA;

use Exception;
use InvalidArgumentException;

/**
 * Array wrapper class the implements simple stack functions
 * - the stack can only accept char or int data types
 * - the stack is an immutable fixed size
 * 
 */
class Stack
{
    /** @var int */
    protected $stackSize;

    /** @var array */
    protected $internalArray;

    /**
     * Class constructor
     */
    public function __construct($stackSize)
    {
        $this->stackSize = $stackSize;
        $this->internalArray = [];
    }

    /**
     * Push value on to end of array; throw exception if full or
     * bad value type
     * 
     * @param int|string $value The int or char to add to stack
     * @throws Exception If stack is full
     * @throws InvalidArgumentException If value not int or char
     */
    public function push($value)
    {
        if(count($this->internalArray) >= $this->stackSize){
            throw new Exception("Stack full", __LINE__);
        }
        elseif(!is_int($value) && !is_string($value)){
            throw new InvalidArgumentException("Value must be int or char (string of length 1)", __LINE__);
        }
        elseif(is_string($value) && strlen($value) > 1){
            throw new InvalidArgumentException("Strings must be length 1 (char)", __LINE__);
        }
        else{
            array_push($this->internalArray, $value);
        }
    }

    /**
     * Pop value off end of array; throw exception if empty
     * 
     * @return int|string
     * @throws Exception If stack is empty
     */
    public function pop()
    {
        if(count($this->internalArray) === 0){
            throw new Exception("Stack empty", __LINE__);
        }
        else{
            return array_pop($this->internalArray);
        }
    }
}