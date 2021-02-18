<div style="text-align: center;">
    <p class="font-sans font-bold text-xl p-10">{{ $count }}</p>
    <p>
        <button wire:click="increment" class="py-2 px-4 font-semibold rounded-lg shadow-md text-white bg-green-500 hover:bg-green-700">
            +
        </button>
        <button wire:click="decrement" class="py-2 px-4 font-semibold rounded-lg shadow-md text-white bg-red-500 hover:bg-red-700">
            -
        </button>
    </p>
</div>
