<?php

namespace App\Laravel\Services;

class Cart
{
    public $items = [];
    public $qty = 0;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart = [])
    {
        if($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    /**
     * @param item Object
     * @param id Int
     * @param qty Int
     */
    public function add_item($item,$id,$qty,$date)
    {
        $storedItem = [
            "qty" => 0,
            "price" => $item->price,
            "item" => $item,
            "date" => $date,
        ];

        if(array_key_exists($id,$this->items)){
            $storedItem = $this->items[$id];
            $this->totalQty -= 1;
        }

        $storedItem['qty'] += $qty;
        $storedItem['price'] = $item->meal_credit * $storedItem['qty'];
        $storedItem['date'] = $date;
        $this->totalQty += 1;
        $this->items[$id] = $storedItem;
        $this->totalPrice += $item->meal_credit * $qty;
    }

    public function reduce_item($id,$qty)
    {
        if($qty > $this->items[$id]['qty'])
        {
            $qty = $this->items[$id]['qty'];
        }
        $this->items[$id]['qty'] -= $qty;
        $this->items[$id]['price'] -= ($this->items[$id]['item']['meal_credit'] * $qty);
        $this->totalPrice -= ($this->items[$id]['item']['meal_credit'] * $qty);

        if($this->items[$id]['qty'] <= 0)
        {
            unset($this->items[$id]);
            $this->totalQty -= 1;
        }
    }

    public function remove_item($id)
    {
        $this->totalQty -= 1;
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}