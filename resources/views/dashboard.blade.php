<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg">

                <div class="overflow-x-auto relative p-4 bg-white">
                    <h3 class="font-semibold mb-4 uppercase text-gray-800">User logs action</h3>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-2">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    #User
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Description
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    action
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Date time
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$item->user->name}}
                                </th>
                                <td class="py-4 px-6">
                                    {{$item->description}}
                                </td>
                                <td class="py-4 px-6">
                                    {{$item->action}}
                                </td>
                                <td class="py-4 px-6">
                                    {{date("Y/m/d H:i:s",strtotime($item->created_at))}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$logs->links()}}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>