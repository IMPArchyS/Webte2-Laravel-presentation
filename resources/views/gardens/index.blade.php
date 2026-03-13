<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gardens') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <a href="{{ route('gardens.create') }}"
                class="inline-flex items-center justify-center p-2 text-white bg-blue-400 hover:bg-blue-600 rounded-md border border-transparent focus:outline-none">
                CREATE
            </a>
            <div class="my-2 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($gardens as $garden)
                    <x-card class="my-3" :title="$garden->name" :subtitle="'Garden #' . $garden->id">
                        <p><span class="font-medium">Address:</span> {{ $garden->address }}</p>
                        <div class='mt-2 gap-2'>
                            <a href="{{ route('gardens.show', $garden) }}"
                                class="inline-flex items-center justify-center p-2 text-white bg-blue-400 hover:bg-blue-600 rounded-md border border-transparent focus:outline-none">
                                SHOW
                            </a>
                            <a href="{{ route('gardens.edit', $garden) }}"
                                class="inline-flex items-center justify-center p-2 text-white bg-teal-400 hover:bg-teal-600 rounded-md border border-transparent focus:outline-none">
                                EDIT
                            </a>
                            <form action="{{ route('gardens.destroy', $garden) }}" method="POST" class="inline-block">
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
