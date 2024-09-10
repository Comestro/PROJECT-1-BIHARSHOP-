<div class="mx-auto w-full p-4 md:p-6 2xl:p-10 ">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">Manage Products</h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li><a class="font-medium" href="javascript:void(0)">Products /</a></li>
                <li class="font-medium text-primary">Manage Products</li>
            </ol>
        </nav>
    </div>

    <!-- Search Input -->
    <div class="mb-4">
        <input type="text" wire:model.live="searchTerm" class="w-full p-2 border rounded" placeholder="Search Products...">
    </div>

    <!-- Category Table -->
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark ">
        <div class="grid grid-cols-4 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
            <div class="col-span-1 flex items-center p-4">
                <p class="font-medium">Product Id</p>
            </div>
            <div class="col-span-1 flex items-center">
                <p class="font-medium"> Image</p>
            </div><div class="col-span-1 flex items-center">
                <p class="font-medium">Product Name</p>
            </div>
            <div class="col-span-2 flex items-center">
                <p class="font-medium">Product Slug</p>
            </div>
          
            <div class="col-span-3 hidden items-center sm:flex">
                <p class="font-medium">Description</p>
            </div>
        </div>

        <!-- Category Rows -->
        @foreach($products as $product)
        <div class="grid grid-cols-4 border-t p-4 border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
            <div class="col-span-1 flex items-center">
                <p class="text-sm font-normal text-black dark:text-white">{{ $product->id }}</p>
            </div>
            <div class="col-span-1 flex items-center">
                <p class="text-sm font-normal text-black dark:text-white"><img src='{{ $product->image }}' width="50px"/></p>
            </div>
              <div class="col-span-1 flex items-center">
                <p class="text-sm font-normal text-black dark:text-white">{{ $product->name }}</p>
            </div>
            <div class="col-span-2 flex items-center">
                <p class="text-sm font-normal text-black dark:text-white">{{ $product->slug }}</p>
            </div>
          
            <div class="col-span-3 hidden items-center sm:flex">
                <p class="text-sm font-normal text-black dark:text-white">{{ $product->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
