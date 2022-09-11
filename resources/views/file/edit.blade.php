<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('File Movement Register') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex items-center justify-center p-12">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="mx-auto w-full max-w-[550px] bg-white">
                            <form action="{{ route('file.edit',['file' =>$file]) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="mb-5">
                                    <label for="file_name" class="mb-3 block text-base font-medium text-[#07074D]">
                                        File Name
                                    </label>
                                    <input type="text" name="file_name" id="file_name" placeholder="File Name"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        required value="{{ $file->file_name }}" />
                                </div>
                                <div class="mb-5">
                                    <label for="received_to" class="mb-3 block text-base font-medium text-[#07074D]">
                                        File Received From
                                    </label>
                                    <input type="text" name="received_from" id="received_from"
                                        placeholder="File Received From"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        required value="{{ $file->received_from }}" />
                                </div>
                                <div class="mb-5">
                                    <label for="receive_date" class="mb-3 block text-base font-medium text-[#07074D]">
                                        File Receive Date
                                    </label>
                                    <input type="date" name="receive_date" id="receive_date"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        required value="{{ $file->receive_date }}" />
                                </div>

                                <div class="mb-5">
                                    <label for="returned_to" class="mb-3 block text-base font-medium text-[#07074D]">
                                        File Returned to
                                    </label>
                                    <input type="text" name="returned_to" id="returned_to"
                                        placeholder="File Returned to"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        required required value="{{ $file->returned_to }}" />
                                </div>
                                <div class="mb-5">
                                    <label for="return_date" class="mb-3 block text-base font-medium text-[#07074D]">
                                        File Return Date
                                    </label>
                                    <input type="date" name="return_date" id="return_date"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        required value="{{ old('return_date') }}" />
                                </div>


                                <div class="mb-5">
                                    <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Remarks
                                    </label>
                                    <textarea rows="4" name="remarks" id="remarks" placeholder="Remarks if any"
                                        class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                                </div>
                                <div>
                                    <button
                                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
