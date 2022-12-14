<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pending Files') }}
            </h2>
            <a href="{{ route('file.create') }}"
                class="flex items-center justify-center text-red-700 background-transparent font-bold uppercase outline-none focus:outline-none ease-linear transition-all duration-150 hover:underline ">
                {{ __('Receive File') }} </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-message />
                    <livewire:file-register-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
