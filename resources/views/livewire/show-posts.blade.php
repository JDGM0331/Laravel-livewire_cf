<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <x-table> {{-- Componente de tabla locallizada en resources/views/components/table.blade.php --}}

            <div class="px-6 py-4"> {{-- sincronización con el componente de livewire para búsqueda en tiempo real --}}
                {{-- <input type="text" wire:model="search"> --}}

                {{-- Componente de jetstream localizado en resources/views/vendor/jetstream/input/input.blade.php --}}
                <x-jet-input class="w-full" placeholder="Escriba qué quiere buscar" type="text" wire:model="search"/>
            </div>

            @if ($posts->count())

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider uppercase border-b border-gray-200 bg-gray-50">
                                ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider uppercase border-b border-gray-200 bg-gray-50">
                                Title
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider uppercase border-b border-gray-200 bg-gray-50">
                                Content
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($posts as $post)
                            <tr>
                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full"src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                        </div>

                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                John Cooper
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                john.cooper@example.com
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                    <div class="text-sm text-gray-500">Optimization</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold  rounded-full text-green-800 bg-green-100">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Admin
                                </td> --}}
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $post->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $post->title }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $post->content }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            @else
                <div class="px-6 py-4">
                    No existe ningún registro coincidente
                </div>
            @endif

        </x-table>

    </div>

</div>
