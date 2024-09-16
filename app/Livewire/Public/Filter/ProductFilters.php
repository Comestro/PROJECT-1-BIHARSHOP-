<?php
namespace App\Livewire\Public\Filter;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductFilters extends Component
{
    public $category;
    public $products;
    public $selectedPriceRanges = []; // Selected price ranges for filtering

    public $priceRanges = [
        'below_500' => [0, 500],
        '500_1000' => [500, 1000],
        '1000_1500' => [1000, 1500],
        '1500_2000' => [1500, 2000],
        '2000_2500' => [2000, 2500],
        'above_2500' => [2501, null]  // New range for above Rs. 2500
    ];

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->filterProducts(); // Initial product filter
    }

    public function filterProducts()
    {
        $productsQuery = Product::query();

        if ($this->category) {
            // Get products from both parent and subcategories
            if (is_null($this->category->parent_category_id)) {
                // If the category is a parent category
                $subCategoryIds = Category::where('parent_category_id', $this->category->id)->pluck('id')->toArray();
                $categoryIds = array_merge([$this->category->id], $subCategoryIds);
            } else {
                // If the category is a subcategory, include its parent as well
                $parentCategoryId = $this->category->parent_category_id;
                $categoryIds = [$this->category->id, $parentCategoryId];
            }

            // Filter products by category
            $productsQuery->whereIn('category_id', $categoryIds);
        }

        // Filter by selected price ranges if any are selected
        if (!empty($this->selectedPriceRanges)) {
            $productsQuery->where(function ($query) {
                foreach ($this->selectedPriceRanges as $range) {
                    [$min, $max] = $this->priceRanges[$range];
                    if ($max) {
                        $query->orWhereBetween('discount_price', [$min, $max]);
                    } else {
                        // Handle the case where there's no upper limit (above 2500)
                        $query->orWhere('discount_price', '>=', $min);
                    }
                }
            });
        }

        // Fetch products with status 1
        $this->products = $productsQuery->where('status', 1)->get();
    }

    public function updatedSelectedPriceRanges()
    {
        $this->filterProducts(); // Re-filter when a price range is selected or deselected
    }

    public function render()
    {
        return view('livewire.public.filter.product-filters');
    }
}
