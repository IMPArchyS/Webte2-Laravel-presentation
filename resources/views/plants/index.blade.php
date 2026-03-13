<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plants') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <a href="{{ route('plants.create') }}"
                class="inline-flex items-center justify-center p-2 text-white bg-blue-400 hover:bg-blue-600 rounded-md border border-transparent focus:outline-none">
                CREATE
            </a>
            <div class="my-2 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($plants as $plant)
                    <x-card class="my-3" :title="$plant->name" :subtitle="'Plant #' . $plant->id">
                        <p><span class="font-medium">Latin name:</span> {{ $plant->latin_name }}</p>
                        <p><span class="font-medium">Planted at:</span> {{ $plant->planted_at }}</p>
                        <div class='mt-2 gap-2'>
                            <a href="{{ route('plants.show', $plant) }}"
                                class="inline-flex items-center justify-center p-2 text-white bg-blue-400 hover:bg-blue-600 rounded-md border border-transparent focus:outline-none">
                                SHOW
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
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
