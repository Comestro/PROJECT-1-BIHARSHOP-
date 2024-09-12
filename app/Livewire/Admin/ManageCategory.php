<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;

class ManageCategory extends Component
{
    public $searchTerm = '';
    // public $id;

    // public function deletefun(){
    //     $id=$this->id;
    //     $data = Category::find($id);
    //     return redirect()->route('admin.manage.category')->with('success','Category deleted successfully');
    //     // $data['child']=Category::where('id',$id)->where('parent_category_id',!null)->first();
    //     // if($data['child']){
    //     //     return redirect()->route('admin.manage.category')->with('error','delete child first before deleting parent');
    //     // }

    // }

    public function render()
    {
        // Fetch categories based on the search term
        $categories = Category::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('cat_description', 'like', '%' . $this->searchTerm . '%')
            ->get();

        return view('livewire.admin.manage-category', [
            'categories' => $categories,
        ]);
    }
    
}
