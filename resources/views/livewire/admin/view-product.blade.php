  <!-- Product Box 1 -->
    <div class="flex flex-1 w-full gap-3">
        <div class="flex flex-col w-1/2">
            <livewire:admin.product.name-form :product="$product" />
        </div>

          {{-- <!-- Box for Product Slug -->
          <div class="p-4 bg-gray-100 rounded-lg mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2">Product Slug</label>
              <div class="flex items-center justify-between">
                  <span id="slug-text-1">clinic-plus</span>
                  <button onclick="toggleInput('1', 'slug')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md">EDIT</button>
              </div>
              <div id="slug-input-section-1" class="hidden mt-2">
                  <input type="text" id="slug-input-1" class="w-full px-3 py-2 border rounded-lg"
                      value="clinic-plus">
                  <button onclick="saveInput('1', 'slug')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md mt-2">SAVE</button>
              </div>
          </div>

          <!-- Box for Product Description -->
          <div class="p-4 bg-gray-100 rounded-lg mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2">Product Description</label>
              <div class="flex items-center justify-between">
                  <span id="description-text-1">A high-quality product</span>
                  <button onclick="toggleInput('1', 'description')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md">EDIT</button>
              </div>
              <div id="description-input-section-1" class="hidden mt-2">
                  <textarea id="description-input-1" class="w-full px-3 py-2 border rounded-lg" rows="4">A high-quality product</textarea>
                  <button onclick="saveInput('1', 'description')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md mt-2">SAVE</button>
              </div>
          </div>

          <!-- Box for Product Price -->
          <div class="p-4 bg-gray-100 rounded-lg mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2">Product Price</label>
              <div class="flex items-center justify-between">
                  <span id="price-text-1">$29.99</span>
                  <button onclick="toggleInput('1', 'price')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md">EDIT</button>
              </div>
              <div id="price-input-section-1" class="hidden mt-2">
                  <input type="text" id="price-input-1" class="w-full px-3 py-2 border rounded-lg" value="$29.99">
                  <button onclick="saveInput('1', 'price')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md mt-2">SAVE</button>
              </div>
          </div>

          <!-- Box for Product Discount Price -->
          <div class="p-4 bg-gray-100 rounded-lg mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2">Discount Price</label>
              <div class="flex items-center justify-between">
                  <span id="discount_price-text-1">$19.99</span>
                  <button onclick="toggleInput('1', 'discount_price')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md">EDIT</button>
              </div>
              <div id="discount_price-input-section-1" class="hidden mt-2">
                  <input type="text" id="discount_price-input-1" class="w-full px-3 py-2 border rounded-lg"
                      value="$19.99">
                  <button onclick="saveInput('1', 'discount_price')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md mt-2">SAVE</button>
              </div>
          </div>

      </div>
      <div class="flex flex-col w-1/2">


          <!-- Box for Product Quantity -->
          <div class="p-4 bg-gray-100 rounded-lg mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2">Product Quantity</label>
              <div class="flex items-center justify-between">
                  <span id="quantity-text-1">100</span>
                  <button onclick="toggleInput('1', 'quantity')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md">EDIT</button>
              </div>
              <div id="quantity-input-section-1" class="hidden mt-2">
                  <input type="text" id="quantity-input-1" class="w-full px-3 py-2 border rounded-lg" value="100">
                  <button onclick="saveInput('1', 'quantity')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md mt-2">SAVE</button>
              </div>
          </div>

          <!-- Box for Product SKU -->
          <div class="p-4 bg-gray-100 rounded-lg mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2">Product SKU</label>
              <div class="flex items-center justify-between">
                  <span id="sku-text-1">CLINIC-123</span>
                  <button onclick="toggleInput('1', 'sku')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md">EDIT</button>
              </div>
              <div id="sku-input-section-1" class="hidden mt-2">
                  <input type="text" id="sku-input-1" class="w-full px-3 py-2 border rounded-lg"
                      value="CLINIC-123">
                  <button onclick="saveInput('1', 'sku')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md mt-2">SAVE</button>
              </div>
          </div>

          <!-- Box for Product Brand -->
          <div class="p-4 bg-gray-100 rounded-lg mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2">Product Brand</label>
              <div class="flex items-center justify-between">
                  <span id="brand-text-1">Clinic</span>
                  <button onclick="toggleInput('1', 'brand')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md">EDIT</button>
              </div>
              <div id="brand-input-section-1" class="hidden mt-2">
                  <input type="text" id="brand-input-1" class="w-full px-3 py-2 border rounded-lg"
                      value="Clinic">
                  <button onclick="saveInput('1', 'brand')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md mt-2">SAVE</button>
              </div>
          </div>

          <!-- Box for Product Category ID -->
          <div class="p-4 bg-gray-100 rounded-lg mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2">Product Category ID</label>
              <div class="flex items-center justify-between">
                  <span id="category_id-text-1">1</span>
                  <button onclick="toggleInput('1', 'category_id')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md">EDIT</button>
              </div>
              <div id="category_id-input-section-1" class="hidden mt-2">
                  <input type="text" id="category_id-input-1" class="w-full px-3 py-2 border rounded-lg"
                      value="1">
                  <button onclick="saveInput('1', 'category_id')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md mt-2">SAVE</button>
              </div>
          </div>

          <!-- Box for Product Image -->
          <div class="p-4 bg-gray-100 rounded-lg mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2">Product Image</label>
              <div class="flex items-center justify-between">
                  <img id="image-text-1" src="path/to/image.jpg" alt="Product Image" class="w-20 h-20 object-cover">
                  <button onclick="toggleInput('1', 'image')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md">EDIT</button>
              </div>
              <div id="image-input-section-1" class="hidden mt-2">
                  <input type="file" id="image-input-1" class="w-full px-3 py-2 border rounded-lg">
                  <button onclick="saveImage('1')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md mt-2">SAVE</button>
              </div>
          </div>

          <!-- Box for Product Status -->
          <div class="p-4 bg-gray-100 rounded-lg mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2">Product Status</label>
              <div class="flex items-center justify-between">
                  <span id="status-text-1">Active</span>
                  <button onclick="toggleInput('1', 'status')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md">EDIT</button>
              </div>
              <div id="status-input-section-1" class="hidden mt-2">
                  <select id="status-input-1" class="w-full px-3 py-2 border rounded-lg">
                      <option value="active" selected>Active</option>
                      <option value="inactive">Inactive</option>
                  </select>
                  <button onclick="saveInput('1', 'status')"
                      class="bg-black text-white text-xs px-3 py-1 rounded-md mt-2">SAVE</button>
              </div>
          </div>

      </div> --}}
  </div>
