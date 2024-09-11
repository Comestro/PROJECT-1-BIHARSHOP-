<div class="bg-white">
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
          <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <!-- Category 1 -->

            {{dd($data['categories']);}}
            
            <div class="group relative h-36 bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
              <img src="https://images.squarespace-cdn.com/content/v1/665273b60d5c4e3fe76a765e/21acea2c-a526-49f3-ac73-4b5fdd1e1845/Mens+style+app+%281%29.png" alt="Men's Clothing"
                class="w-full h-36 object-cover object-center group-hover:scale-110 transition-transform duration-300" />
              <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80 transition-opacity duration-300"></div>
              <div class="absolute inset-0 flex items-end justify-center p-4">
                <h3 class="text-white text-lg font-semibold group-hover:opacity-100 transition-opacity duration-300">Men's Clothing</h3>
              </div>
            </div>
        
            <!-- Category 2 -->
            <div class="group relative h-36 bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
              <img src="https://example.com/path-to-category2-image.jpg" alt="Women's Clothing"
                class="w-full h-36 object-cover object-center group-hover:scale-110 transition-transform duration-300" />
              <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80 transition-opacity duration-300"></div>
              <div class="absolute inset-0 flex items-end justify-center p-4">
                <h3 class="text-white text-lg font-semibold group-hover:opacity-100 transition-opacity duration-300">Women's Clothing</h3>
              </div>
            </div>
        
            <!-- Category 3 -->
            <div class="group relative h-36 bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
              <img src="https://example.com/path-to-category3-image.jpg" alt="Accessories"
                class="w-full h-36 object-cover object-center group-hover:scale-110 transition-transform duration-300" />
              <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80 transition-opacity duration-300"></div>
              <div class="absolute inset-0 flex items-end justify-center p-4">
                <h3 class="text-white text-lg font-semibold group-hover:opacity-100 transition-opacity duration-300">Accessories</h3>
              </div>
            </div>
        
            <!-- Category 4 -->
            <div class="group relative h-36 bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
              <img src="https://example.com/path-to-category4-image.jpg" alt="Footwear"
                class="w-full h-36 object-cover object-center group-hover:scale-110 transition-transform duration-300" />
              <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80 transition-opacity duration-300"></div>
              <div class="absolute inset-0 flex items-end justify-center p-4">
                <h3 class="text-white text-lg font-semibold group-hover:opacity-100 transition-opacity duration-300">Footwear</h3>
              </div>
            </div>
        
            <!-- Category 5 -->
            <div class="group relative h-36 bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
              <img src="https://example.com/path-to-category5-image.jpg" alt="Sportswear"
                class="w-full h-36 object-cover object-center group-hover:scale-110 transition-transform duration-300" />
              <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80 transition-opacity duration-300"></div>
              <div class="absolute inset-0 flex items-end justify-center p-4">
                <h3 class="text-white text-lg font-semibold group-hover:opacity-100 transition-opacity duration-300">Sportswear</h3>
              </div>
            </div>
        
            <!-- Category 6 -->
            <div class="group relative h-36 bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
              <img src="https://example.com/path-to-category6-image.jpg" alt="Kids Clothing"
                class="w-full h-36 object-cover object-center group-hover:scale-110 transition-transform duration-300" />
              <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80 transition-opacity duration-300"></div>
              <div class="absolute inset-0 flex items-end justify-center p-4">
                <h3 class="text-white text-lg font-semibold group-hover:opacity-100 transition-opacity duration-300">Kids Clothing</h3>
              </div>
            </div>
        
            <!-- More categories can be added similarly -->
          </div>
        </div>
        
    </div>
</div>
