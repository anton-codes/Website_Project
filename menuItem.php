<?php

/**
 * Class menuItem
 * @author Hrytsyk Anton
 */


class menuItem
{

    private $itemName;
    private $description;
    private $price;


    function __construct($name, $desc, $prc)
    {
        $this->itemName = $name;
        $this->description = $desc;
        $this->price = $prc;
    }


    /**
     * @return string description
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * @return string name
     */
    public function getItemName()
    {
        return $this->itemName;
    }


    /**
     * @return int price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $itemName
     */
    public function setItemName($itemName): void
    {
        $this->itemName = $itemName;
    }



}





























