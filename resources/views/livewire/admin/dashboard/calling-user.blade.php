<div>
    <div>
        @foreach($users as $user)
        <a href=""
            class="flex items-center gap-5 px-7.5 py-3 hover:bg-gray-3 dark:hover:bg-meta-4">
            <div class="relative h-14 w-14 rounded-full">
                @if($user->image) 
                    <img src="{{ $user->image }}" alt="" class="h-full w-full object-cover rounded-full">
                @else
                <img src="data:image/jpeg;base64,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" alt="">
                @endif
                <span
                    class="absolute bottom-0 right-0 h-3.5 w-3.5 rounded-full border-2 border-white {{ $user->is_online ? 'bg-meta-3' : 'bg-meta-6' }}"></span>
            </div>
            
    
            <div class="flex flex-1 items-center justify-between">
                <div>
                    <h5 class="font-medium text-black dark:text-white">
                        {{ $user->name }}
                    </h5>
                    <p>
                        <span class="text-sm font-medium text-black dark:text-white"></span>
                        <span class="text-xs">{{$user->email}}</span>
                    </p>
                </div>
               
            </div>
        </a>
        @endforeach
    </div></div>
