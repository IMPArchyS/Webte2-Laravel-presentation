<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plants Create') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mt-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-card title="Create Plant">
                    @if ($errors->any())
                        <div class="mb-4 rounded-md border border-red-200 bg-red-50 p-3 text-sm text-red-700">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('plants.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label for="name"
                                class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required
                                class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" />
                        </div>

                        <div>
                            <label for="latin_name"
                                class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Latin
                                Name</label>
                            <input id="latin_name" name="latin_name" type="text" value="{{ old('latin_name') }}"
                                required
                                class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" />
                        </div>

                        <div>
                            <label for="garden_id"
                                class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Garden Id
                            </label>
                            <input id="garden_id" name="garden_id" type="text" value="{{ old('garden_id') }}"
                                required
                                class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" />
                        </div>

                        <div class="mt-2 flex gap-2">
                            <a href="{{ route('plants.index') }}"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-400 px-3 py-2 text-white hover:bg-gray-600 focus:outline-none">
                                BACK
                            </a>
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-500 px-3 py-2 text-white hover:bg-blue-600 focus:outline-none">
                                CREATE
                            </button>
                        </div>
                    </form>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
