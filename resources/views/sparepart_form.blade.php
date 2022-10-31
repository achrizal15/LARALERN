<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($action.' Spare Part') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('sparepart')}}"
                class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-500 focus:outline-none focus:border-red-500 focus:ring focus:ring-red-300 disabled:opacity-25 transition">BACK</a>
            <div class="overflow-x-auto shadow-xl overflow-hidden mt-4  sm:rounded-lg relative p-4 bg-white">
                <x-jet-validation-errors class="mb-4" />
                <form class="w-1/2" action="{{$route}}" method="POST">
                    @csrf
                    @method($action=="Edit"?"PUT":"POST")
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Name</label>
                        <input type="text" id="name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            name="name" value="{{ $action=='Edit'?$sparepart->name:old('name') }}">
                    </div>
                    <div class="mb-6">
                        <label for="dimension" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Dimension</label>
                        <input type="text" id="dimension"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            name="dimension" value="{{ $action=='Edit'?$sparepart->dimension:old('dimension') }}">
                    </div>
                    <div class="mb-6">
                        <label for="website-admin"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Weight</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                              KG
                            </span>
                            <input type="text" id="website-admin"
                                class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="weight" value="{{ $action=='Edit'?$sparepart->weight:old('weight') }}">
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Save</button>
                </form>
            </div>
        </div>
    </div>
    
</x-app-layout>