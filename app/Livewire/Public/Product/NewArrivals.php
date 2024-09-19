<?php
namespace App\Livewire\Public\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class NewArrivals extends Component
{
    use WithPagination;

    public $productsPerPage = 4;

    protected $paginationTheme = 'tailwindcss';

    public function render()
    {
        // Fetch products with the current pagination size
        $newArrivals = Product::where('status', 1)
            ->paginate($this->productsPerPage);

        return view('livewire.public.product.new-arrivals', [
            'newArrivals' => $newArrivals,
        ]);
    }

    public function loadMore()
    {
        $this->productsPerPage += 4; // Increase the number of products per page
        // No need to manually call render() here
    }
}
