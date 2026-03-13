<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plants Show') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mt-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-card :title="$plant->name" :subtitle="'Plant #' . $plant->id">
                    <p><span class="font-medium">Latin name:</span> {{ $plant->latin_name }}</p>
                    <p><span class="font-medium">Planted At:</span> {{ $plant->planted_at }}</p>
                    <p><span class="font-medium">Planted in:</span> {{ 'Garden #' . $plant->garden_id }}</p>
                    <div class='mt-2 gap-2'>
                        <a href="{{ route('plants.index') }}"
                            class="inline-flex items-center justify-center p-2 text-white bg-gray-400 hover:bg-gray-600 rounded-md border border-transparent focus:outline-none">
                            BACK
                        </a>
                        <a href="{{ route('plants.edit', $plant) }}"
                            class="inline-flex items-center justify-center p-2 text-white bg-teal-400 hover:bg-teal-600 rounded-md border border-transparent focus:outline-none">
                            EDIT
                        </a>
                        <form action="{{ route('plants.destroy', $plant) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center justify-center p-2 text-white bg-red-400 hover:bg-red-600 rounded-md border border-transparent focus:outline-none">
                                DELETE
                            </button>
                        </form>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
