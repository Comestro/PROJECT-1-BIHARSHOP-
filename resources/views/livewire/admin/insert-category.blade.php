<div>

    <div
class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
<div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
    <h3 class="font-medium text-black dark:text-white">
        Fill all Details
    </h3>
</div>
<form action="#" wire:submit.prevent="submit" method="post">
    <div class="p-6.5">
        <div class="mb-4.5">
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                Parent Category
            </label>
            <select
                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                <option value="">Select Main Category</option>
            </select>
        </div>

        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">

            <div class="w-full xl:w-1/2">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Category name
                </label>
                <input type="text" wire:model.blur="title" placeholder="Enter your Category name"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
            </div>

            <div class="w-full xl:w-1/2">
                <label for="slug" class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Category Slug
                </label>
                <input type="text" id="slug" wire:model="slug"
                    class="w-full rounded border-[1.5px] border-stroke bg-slate-200 px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" readonly />
            </div>
        </div>


        <div class="mb-4.5">
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                Category Image
            </label>
            <div class="flex flex-1 md:flex-row flex-col gap-5">
            <div class="flex-1">
               
    
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" wire:model="photo" type="file" class="hidden" />
                    </label> 
                </div>
            </div>

            <div class="flex flex-1 flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50dark:bg-gray-700 dark:border-gray-600  overflow-hidden p-3">
                @if ($photo) 
                <img src="{{ $photo->temporaryUrl() }}" class="object-cover">
                @else 
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                    class="font-semibold">Image Preview</span></p>
            @endif
            </div>

        </div>




        <div class="my-6">
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                Category Description
            </label>
            <textarea rows="6" placeholder="Type your message"
                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
        </div>

        <button
            class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
            Create
        </button>
    </div>
</form>
</div>
</div>
