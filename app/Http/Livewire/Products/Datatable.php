<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

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

    public function export($extension)
    {
        abort_if(!in_array($extension, ['csv', 'xlsx', 'pdf']), Response::HTTP_NOT_FOUND);

        return Excel::download(new ProductsExport, 'products.' . $extension);
    }

    public function render()
    {
        return view('livewire.products.datatable', [
            'products' => Product::orderBy('position')->get()
        ]);
    }
}
