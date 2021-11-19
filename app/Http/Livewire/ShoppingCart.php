<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart extends Component
{

    // 子コンポーネントから親コンポーネントのデータを更新
    //これをすることで数量を＋-で合計金額が連動しその都度更新し変更される
    protected $listeners = ['render'];

    public function destroy(){
        Cart::destroy();

        //emitToは主にスコープ(名前によるコンポーネント)を指定するため
        $this->emitTo('dropdown-cart','render');
    }

    public function delete($rowId){
        Cart::remove($rowId);
        $this->emitTo('dropdown-cart','render');
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
