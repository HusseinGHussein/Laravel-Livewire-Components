<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Datatable extends Component
{
    public function updateOrder($list)
    {
        foreach ($list as $item) {
            Product::find($item['value'])->update([
                'position' => $item['order']
            ]);
        }
    }

    public function render()
    {
        return view('livewire.products.datatable', [
            'products' => Product::orderBy('position')->get()
        ]);
    }
}
