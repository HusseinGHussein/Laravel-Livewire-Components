<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <div class="flex justify-start mt-5 mb-5">
                        <x-jet-button type="button" class="ml-4" wire:click="export('csv')" wire:loading.attr='disabled'>
                            CSV
                        </x-jet-button>
                        <x-jet-button type="button" class="ml-4" wire:click="export('xlsx')" wire:loading.attr='disabled'>
                            XLS
                        </x-jet-button>
                        <x-jet-button type="button" class="ml-4" wire:click="export('pdf')" wire:loading.attr='disabled'>
                            PDF
                        </x-jet-button>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Price
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" wire:sortable='updateOrder'>
                            @foreach($products as $product)
                                <tr wire:sortable.item="{{ $product->id }}" wire:key="product-{{ $product->id }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $product->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $product->price }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        @livewire('toggle-button', [
                                            'model' => $product,
                                            'field' => 'active'
                                        ])
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
