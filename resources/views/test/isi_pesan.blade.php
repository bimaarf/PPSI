@foreach ($chattings as $chatting)
    @if ($chatting->user_id != Auth::id())
        <!-- Message. Default to the left -->
        <div class="direct-chat-msg">
            <div class="direct-chat-infos">
                <span class="direct-chat-timestamp float-right">
                    {{ $chatting->created_at }}
                </span>
            </div>
            <!-- /.direct-chat-infos -->
    
            <img class="direct-chat-img" src="{{ asset($target_avatar) }}" alt="message user image">
            <!-- /.direct-chat-img -->
    
            <div class="direct-chat-text">
                {{ $chatting->chat }}
            </div>
            <!-- /.direct-chat-text -->

        </div>
        <!-- /.direct-chat-msg -->

    @else
        <!-- Message to the right -->
        <div class="direct-chat-msg right">
            <div class="direct-chat-infos">
                <span class="direct-chat-timestamp float-left">
                    {{ $chatting->created_at }}
                </span>
            </div>
            <!-- /.direct-chat-infos -->

            <img class="direct-chat-img" src="{{ asset($own_avatar) }}" alt="message user image">
            <!-- /.direct-chat-img -->

            <div class="direct-chat-text">
                {{ $chatting->chat }}
            </div>
            <!-- /.direct-chat-text -->

        </div>
        <!-- /.direct-chat-msg -->
    @endif
@endforeach