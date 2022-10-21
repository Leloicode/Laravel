<?php
namespace App;

class Cart{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public function __construct($oldcart)
    {
       if ($oldcart) {
            $this->items = $oldcart->items;
            $this->totalQty = $oldcart->totalQty;
            $this->totalPrice = $oldcart->totalPrice;
       } 
    }
    public function add($product,$id)
    {
        $giohang = ['qty'=>0,'price'=>$product->unit_price , 'item'=>$product];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $giohang = $this->items[$id];
            }
        }

        $giohang['qty']++;
        $giohang['price'] = $product->unit_price * $giohang['qty'];
        $this->items[$id] = $giohang;
        $this->totalQty++;
        $this->totalPrice += $product->unit_price; 
    }
}
?>