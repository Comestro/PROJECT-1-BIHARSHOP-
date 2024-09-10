@extends('admin.adminBase')
@section('title', 'Manage Products')
@section('content')




<main>
    <div class="max-w-7xl mx-auto p-6 w-full">
        <h2 class="text-2xl font-bold mb-6">View Products</h2>    
            <livewire:admin.insert-product/>
    </div>
</main>

<!-- JavaScript for Toggling Input -->
<script>
    function toggleInput(id, field) {
        document.getElementById(field + '-text-' + id).classList.toggle('hidden');
        document.getElementById(field + '-input-section-' + id).classList.toggle('hidden');
    }

    function saveInput(id, field) {
        var input = document.getElementById(field + '-input-' + id).value;
        document.getElementById(field + '-text-' + id).innerText = input;
        toggleInput(id, field); // Hide the input after saving
    }

    function saveImage(id) {
        var fileInput = document.getElementById('image-input-' + id).files[0];
        // Handle image upload logic here
        toggleInput(id, 'image'); // Hide the input after saving
    }
</script>

@endsection
