<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gardens Show') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mt-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-card :title="$garden->name" :subtitle="'Garden #' . $garden->id">
                    <p><span class="font-medium">Address:</span> {{ $garden->address }}</p>
                    @foreach ($garden->plants as $plant)
                        <div>
                            <strong class='text-green-400'>{{ 'Plant #' . $plant->id }}</strong>
                            <p><span class="font-medium">Name:</span> {{ $plant->name }}</p>
                            <p><span class="font-medium">Latin Name:</span> {{ $plant->latin_name }}</p>
                            <p><span class="font-medium">Planted At:</span> {{ $plant->planted_at }}</p>
                        </div>
                    @endforeach
                    <div class='mt-2 gap-2'>
                        <a href="{{ route('gardens.index') }}"
                            class="inline-flex items-center justify-center p-2 text-white bg-gray-400 hover:bg-gray-600 rounded-md border border-transparent focus:outline-none">
                            BACK
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
            </div>
        </div>
    </div>
</x-app-layout>
