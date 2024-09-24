<?php

namespace App\Livewire\Public;
use App\Models\Gallery as GalleryPhotos;
use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        $datas = GalleryPhotos::where('status',1)->latest()->get();
        return view('livewire.public.gallery',['datas' => $datas]);
    }
}
