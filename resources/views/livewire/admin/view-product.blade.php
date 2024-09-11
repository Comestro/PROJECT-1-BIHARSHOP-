  <!-- Product Box 1 -->
    <div class="w-full">
        <div class="md:grid-cols-2 md:grid gap-2">
            <livewire:admin.product.name-form :product="$product" />
            <livewire:admin.product.description-form :product="$product" />
            <livewire:admin.product.price-form :product="$product" />
            <livewire:admin.product.discount-price-form :product="$product" />
            <livewire:admin.product.quantity-form :product="$product" />
            <livewire:admin.product.brand-form :product="$product" />
            <livewire:admin.product.sku-form :product="$product" />
            <livewire:admin.product.category-form :product="$product" />
            <livewire:admin.product.status-form :product="$product" />
        </div>
        <livewire:admin.product.image-form :product="$product" />

  </div>
