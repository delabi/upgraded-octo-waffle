<x-layout>
    <x-slot:heading>
        Edit Task: {{ $task->code }}
    </x-slot:heading>
    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method("PATCH")
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Code</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                type="text"
                                name="code"
                                id="code"
                                class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                placeholder="11"
                                value="{{ $task->code }}"
                                required>
                            </div>
                            @error('code')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="code_details" class="block text-sm font-medium leading-6 text-gray-900">Code Details</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                type="text"
                                name="code_details"
                                id="code_details"
                                class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                placeholder="$ 50,000"
                                value="{{ $task-> code_details }}"
                                required>
                            </div>
                            @error('code_details')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror

                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="discussion" class="block text-sm font-medium leading-6 text-gray-900">Discussion</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                type="text"
                                name="discussion"
                                id="discussion"
                                class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                placeholder="$ 50,000"
                                value="{{ $task-> discussion }}"
                                required>
                            </div>
                            @error('discussion')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror

                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="inspection_procedure" class="block text-sm font-medium leading-6 text-gray-900">Inspection Procedure</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                type="text"
                                name="inspection_procedure"
                                id="inspection_procedure"
                                class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                placeholder="$ 50,000"
                                value="{{ $task-> inspection_procedure }}"
                                required>
                            </div>
                            @error('inspection_procedure')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror

                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="primary_benefit" class="block text-sm font-medium leading-6 text-gray-900">Primary Benefit</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                type="text"
                                name="primary_benefit"
                                id="primary_benefit"
                                class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                placeholder="$ 50,000"
                                value="{{ $task-> primary_benefit }}"
                                required>
                            </div>
                            @error('primary_benefit')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror

                        </div>
                    </div>

                </div>


            </div>


        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="items-center">
                <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>

            </div>
            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $task -> id}}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                <div>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update
                    </button>
                </div>

            </div>

        </div>
    </form>

    <form method="POST" id="delete-form" class="hidden" action="/tasks/{{ $task->id }}">
        @csrf
        @method('DELETE')


    </form>

</x-layout>
