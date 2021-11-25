@foreach ($chatting as $item)
    @if ($item->user_id != Auth::id())
        {{-- other people --}}
        <div class="d-flex justify-content-start">
            <div class="profile-photo message-photo">
                <img src="{{ asset('assets/icon/Driver.svg') }}" alt="avatar" class="avatar rounded-circle mr-2 ml-0"
                    width="50">
                @foreach ($users->where('id', $item->user_id) as $usr)
                    <p class="text-capitalize"><b>{{ $usr->name }} </b></p>
                @endforeach
            </div>
            <div class="card rounded bg-light mt-2 mb-2">
                <div class="card-body p-2">
                    <p class="card-text black-text px-2">{{ $item->chat }}</p>
                </div>
            </div>
        </div>
    @endif
    @if ($item->user_id == Auth::id())
        {{-- you --}}
        <div class="d-flex justify-content-end">
            <div class="card rounded float-right z-depth-0 mb-2 mt-2 last" style="background-color: #1a76dfea">
                <div class="card-body p-2">
                    <p class="card-text text-white px-2">{{ $item->chat }}</p>
                </div>
            </div>
        </div>
    @endif
@endforeach
