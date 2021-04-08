<div>
    <div class="relative inline-block w-10 mr-2 align-middle transition duration-200 ease-in select-none">
        <input wire:model='isActive' type="checkbox" name="toggle" id="toggle-{{ $this->model->id }}" class="absolute block w-6 h-6 bg-white border-4 rounded-full appearance-none cursor-pointer focus:outline-none toggle-checkbox"/>
        <label for="toggle-{{ $this->model->id }}" class="block h-6 overflow-hidden bg-gray-300 rounded-full cursor-pointer toggle-label"></label>
    </div>
</div>

<style>
    .toggle-checkbox:checked {
    @apply: right-0 border-green-400;
    right: 0;
    border-color: #68D391;
    }
    .toggle-checkbox:checked + .toggle-label {
    @apply: bg-green-400;
    background-color: #68D391;
    }
</style>