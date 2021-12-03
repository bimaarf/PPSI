<div class="row"  id="timeline">
    {{-- @include('orders.proses.modal_track') --}}
</div>


<script>
    function timeline() {
        $.get("{{ route('user.modal.elements.modal_track', ['id'=>$item->id]) }}", {}, function(checkout, status) {
            $("#timeline").html(checkout);

        });
    }
    // 
    setInterval(function() {
        timeline();
    }, 1000);

    
</script>