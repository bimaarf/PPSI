@foreach ($chatting as $chats)
    @if ($chats->user_id != Auth::id())
        {{-- other people --}}
        <div class="d-flex justify-content-start">
            <div class="profile-photo message-photo">
                <img src="{{ asset('assets/icon/Driver.svg') }}" alt="avatar" class="avatar rounded-circle mr-2 ml-0"
                    width="50">
                </div>
                <div class="card bg-auto rounded float-left w-75 z-depth-0 mb-2">
                <div class="card-body p-2">
                    <p class="card-text black-text">{{ $chats->chat }}</p>
                </div>
            </div>
        </div>
        <small class="state">{{ $chats->created_at }}</small>
    @endif
    @if ($chats->user_id == Auth::id())
        {{-- you --}}
        <div class="d-flex justify-content-end">
            <div class="card bg-info rounded w-75 float-right z-depth-0 mb-2 mt-2">
                <div class="card-body p-2">
                    <p class="card-text text-white">{{ $chats->chat }}</p>
                </div>
            </div>
        </div>
        <small class="state justify-content-end d-flex">{{ $chats->created_at }}</small>
    @endif
    
@endforeach
