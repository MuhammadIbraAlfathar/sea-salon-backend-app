<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Main Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('services.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Create Services
                </a>
                {{-- <a href="{{ route('users.pdf') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Print PDF
                </a> --}}
            </div>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-6 py4">
                                ID
                            </th>
                            <th class="border px-6 py4">
                                Service Name
                            </th>
                            <th class="border px-6 py4">
                                Duration
                            </th>
                            <th class="border px-6 py4">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $item)
                        <tr>
                            <td class="border px-6 py-4">
                                {{ $item->id }}
                            </td>
                            <td class="border px-6 py-4">
                                {{ $item->services_name }}
                            </td>
                            <td class="border px-6 py-4">
                                {{ $item->duration }} Minute
                            </td>
                            <td class="border px-6 py-4 text-center">
                                <a href="{{ route('services.edit', $item->id) }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                    Edit
                                </a>
                                <form action="#" method="POST" class="inline-block">
                                    {!! method_field('delete') . csrf_field() !!}
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="border text-center p-5">
                                Data Tidak Ditemukan
                            </td>
                         </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $services->links() }}
            </div>
        </div>
    </div>  
</x-app-layout>
