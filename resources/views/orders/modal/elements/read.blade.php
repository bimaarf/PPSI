<hr>
@foreach ($chatting as $chats)
    @if ($chats->user_id != Auth::id())
        {{-- other people --}}
        <div class="d-flex justify-content-start">
            <div class="profile-photo message-photo">
                <img src="{{ asset('assets/icon/Driver.svg') }}" alt="avatar" class="avatar rounded-circle mr-2 ml-0"
                    width="50">
                <span class="state"></span>
            </div>
            <div class="card bg-light rounded w-75 z-depth-0 mb-2">
                <div class="card-body p-2">
                    <p class="card-text black-text">{{ $chats->chat }}</p>
                </div>
            </div>
        </div>
    @endif
    @if ($chats->user_id == Auth::id())
        {{-- you --}}
        <div class="card bg-primary rounded w-75 float-right z-depth-0 mb-4 mt-4 last">
            <div class="card-body p-2">
                <p class="card-text text-white">{{ $chats->chat }}</p>
            </div>
        </div>
    @endif
    
@endforeach
