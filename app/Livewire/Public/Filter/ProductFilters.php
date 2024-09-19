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
    public $moreCategories = []; // Store additional categories
    public $selectedColor = ''; // Store selected color
    public $selectedSize = ''; // Holds the selected size
    public $filterVisible = false;
    public $sortBy = 'default'; // Default sort criteria


    public function toggleFilter()
    {
        $this->filterVisible = !$this->filterVisible;
    }

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


        // Load more categories, excluding the current category and its subcategories
        $this->loadMoreCategories();
    }



    public function filterProducts()
    {
        $this->filterVisible = false;
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

            // Filter by selected color
            if (!empty($this->selectedColor)) {
                $productsQuery->whereHas('variants', function ($query) {
                    $query->where('variant_type', 'color')
                          ->where('variant_value', $this->selectedColor);
                });
            }

             // Filter by selected size
            if (!empty($this->selectedSize)) {
                $productsQuery->whereHas('variants', function ($query) {
                    $query->where('variant_type', 'size')
                        ->where('variant_value', $this->selectedSize);
                });
            }
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
            $this->dispatch("update_average_product");
        }

        // Apply sorting
        if ($this->sortBy == 'price_asc') {
            $productsQuery->orderBy('price', 'asc');
        } elseif ($this->sortBy == 'price_desc') {
            $productsQuery->orderBy('price', 'desc');
        } elseif ($this->sortBy == 'name_asc') {
            $productsQuery->orderBy('name', 'asc');
        } elseif ($this->sortBy == 'name_desc') {
            $productsQuery->orderBy('name', 'desc');
        }


        // Fetch products with status 1
        $this->products = $productsQuery->where('status', 1)->get();
    }

    public function updatedSortBy()
    {
        $this->filterProducts(); // Re-filter products when the sort option changes
    }

    public function loadMoreCategories()
    {
        // Load additional categories that are not related to the current category
        $excludedCategoryIds = [$this->category->id];

        if (!is_null($this->category->parent_category_id)) {
            $excludedCategoryIds[] = $this->category->parent_category_id;
        }

        $this->moreCategories = Category::where('parent_category_id',null)->whereNotIn('id', $excludedCategoryIds)->take(10)->get();

    }



    public function updatedSelectedPriceRanges()
    {
        // Reset selected color when price ranges are updated
        $this->reset('selectedColor');
        $this->reset('selectedSize'); // Reset selected size when price ranges are updated
        $this->filterProducts(); // Re-filter when a price range is selected or deselected
    }

    public function updatedSelectedSize()
    {
        $this->reset('selectedPriceRanges'); // Reset selected price ranges when color is updated
        $this->reset('selectedColor');         // Reset selected color when size is updated
        $this->filterProducts();
    }

    public function clearFilter(){
        $this->reset(['selectedPriceRanges','selectedColor','selectedSize']);
        $this->filterProducts(); // Reset all filters and re-filter the products
    }

    public function updatedSelectedColor(){
        $this->reset('selectedPriceRanges'); // Reset selected price ranges when color is updated

        $this->filterProducts(); // Filter products based on color
    }

    public function render()
    {
        return view('livewire.public.filter.product-filters');
    }
}
