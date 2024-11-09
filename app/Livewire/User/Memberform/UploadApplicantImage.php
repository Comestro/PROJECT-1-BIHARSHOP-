<?php

namespace App\Livewire\User\Memberform;

use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UploadApplicantImage extends Component
{
    use WithFileUploads;
    public $photo;
    public $existingImage;
    public $image;
    public $status = false;


    public function mount(){

    }
    public function save(){
        $membership = Membership::where("user_id", Auth::id())->first();

        if ($this->image) {
            // Delete old image
            if ($this->existingImage) {
                Storage::delete('public/image/membership/' . $this->existingImage);
            }

            // Store new image
            $imageName = $this->image->store('image/membership', 'public');
            $membership->image = basename($imageName);
        }

        if($this->photo){
            $image = $this->photo;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs("/image/membership", $imageName, "public");
            $data['image'] = $imageName;
            $membership->update( $data);
        }

        $membership->save();

        $uniqueToken = $membership->token;
        $this->status = true;
        if ($this->status) {
            return redirect('/user/membership-payment/' . $uniqueToken)->with('success', 'Data added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add data.');
        }
    }
    public function render()
    {
        return <<<'HTML'
        <div>
        <form wire:submit.prevent="save" class="grid grid-cols-1 gap-6 my-6">
        <div class="flex items-center flex-col md:flex-row justify-center w-full p-4">
            <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-full p-4 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input id="dropzone-file" wire:model="photo" type="file" class="hidden"/>
            </label>

            <!-- Loading spinner -->
            <div wire:loading wire:target="photo"
                class="flex flex-col items-center justify-center w-full h-full mt-4">
                <svg class="w-8 h-8 text-gray-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                </svg>
                <p class="mt-2 text-sm text-gray-500">Uploading...</p>
            </div>

            <!-- Image preview -->
            <div wire:loading.remove wire:target="photo" class="w-full h-full flex items-center justify-center mt-4">
                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" class="object-contain w-32 h-32">
                @elseif($existingImage)
                    <div class="mt-2">
                        <img src="{{ asset('storage/image/membership/' . $existingImage) }}" alt="Current Image"
                            class="w-auto h-32 object-contain">
                    </div>
                @else
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Image Preview</span></p>
                @endif
            </div>
        </div>

        @error('image')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror


        <div class="flex justify-end gap-2">

            <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded hover:cursor-pointer ">
                Final Submit
            </button>
            </div>
        </div>
        HTML;
    }
}
