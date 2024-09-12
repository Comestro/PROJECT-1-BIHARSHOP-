<div class="bg-white mt-24 md:mt-0">
    <!-- Main Container -->
    <div class="container mx-auto px-[6%] py-12 md:py-20">
        <!-- Hero Section -->
        <div class="flex flex-col md:flex-row items-center md:space-x-8">
            <!-- Left Side: Text Content -->
            <div class="text-center md:text-left mb-8 md:mb-0">
                <h1 class="text-4xl md:text-6xl font-bold leading-tight text-black">
                    Find Clothes That Matches Your Style
                </h1>
                <p class="text-gray-600 text-lg mt-4 max-w-md mx-auto md:mx-0">
                    Browse through our diverse range of meticulously crafted garments, designed to bring out your
                    individuality and cater to your sense of style.
                </p>
                <button
                    class="mt-6 px-8 py-3 bg-black text-white text-lg font-semibold rounded hover:bg-gray-800 transition duration-300">
                    Shop Now
                </button>
            </div>

            <!-- Right Side: Image -->
            <div class="w-full md:w-1/2">
                <img src="https://www.pngplay.com/wp-content/uploads/7/Grocery-Items-PNG-Clipart-Background.png"
                    alt="Hero Image" class="w-full h-auto " />
            </div>
        </div>

        <!-- Stats Section -->
        <div class="flex justify-around items-center mt-10">
            <div class="text-center">
                <h2 class="text-lg md:text-3xl font-bold text-black">200+</h2>
                <p class="text-gray-600 text-xs md:text-xl">International Brands</p>
            </div>
            <div class="text-center">
                <h2 class="text-lg md:text-3xl font-bold text-black">2,000+</h2>
                <p class="text-gray-600 text-xs md:text-xl">High-Quality Products</p>
            </div>
            <div class="text-center">
                <h2 class="text-lg md:text-3xl font-bold text-black">30,000+</h2>
                <p class="text-gray-600 text-xs md:text-xl">Happy Customers</p>
            </div>
        </div>

        <!-- Categories Section -->
        <div class="mt-12">
          <h2 class="text-center text-2xl md:text-4xl font-bold text-black mb-8">Shop by Categories</h2>
          <div class="">
            
            <livewire:public.product.category-header/>

          </div>
        </div>
        
    </div>
</div>
