<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Spare Part') }}
        </h2>
    </x-slot>

    <div class="py-12 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('sparepart_create')}}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">ADD</a>
            <div class="overflow-x-auto shadow-xl overflow-hidden mt-4  sm:rounded-lg relative p-4 bg-white">
                @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-2">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #SERIAL NUMBER
                            </th>
                            <th scope="col" class="py-3 px-6">
                                NAME
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Dimension
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Weight
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Total Production
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Date time
                            </th>
                            <th scope="col" class="py-3 px-6">
                                GENERATE
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spareparts as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           <a href="{{route('sprt_production',$item->id)}}" class="text-blue-500 underline">     {{$item->serial_number}}</a>
                            </th>
                            <td class="py-4 px-6">
                                {{$item->name}}
                            </td>
                            <td class="py-4 px-6">
                                {{$item->dimension}}
                            </td>
                            <td class="py-4 px-6">
                                {{$item->weight}}
                            </td>
                            <td class="py-4 px-6">
                                {{$item->spare_part_production_total_count}}
                            </td>
                            <td class="py-4 px-6">
                                {{date("Y/m/d H:i:s",strtotime($item->created_at))}}
                            </td>
                            <td>
                                <form method="POST" action="{{route('sparepart_generate',$item->id)}}">
                                    @csrf
                                    @method("POST")
                                    <div class="flex">
                                        <div class="relative w-full">
                                            <input  name="total" type="search" class="focus:outline-none focus:ring-transparent w-32 rounded-md" placeholder="0" required>
                                            <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">GENERATE</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{route('sparepart_edit',$item->id)}}" class="text-white bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-500 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    EDIT
                                </a>
                                <button type="button" data-modal-toggle="popup-modal"
                                data-url="{{route('sparepart_destroy',$item->id)}}"
                                    onclick="HandleDelete(this)"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    DELETE
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$spareparts->links()}}
            </div>

        </div>
    </div>


    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <form action="" id="form-modal-delete" method="POST">
                        @csrf
                        @method("DELETE")
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            delete this product?</h3>
                        <button data-modal-toggle="popup-modal" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>

                        <button data-modal-toggle="popup-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                            cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>