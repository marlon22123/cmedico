@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>

        <div class="text-lg font-medium {{-- border-gray-100 --}} shadow-md px-5 py-3 {{-- border-b-2 --}}">
            {{ $title }}
        </div>

        <div class="mt-4 px-6 py-4">
            {{ $content }}
        </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
