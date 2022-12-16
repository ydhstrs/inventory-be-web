@if ($message = Session::get('success'))
    <div id="alert" class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>


@elseif($message = Session::get('error'))
    <div id="alert" class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@elseif($message = Session::get('message'))
    <div id="alert" class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif



<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(2000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 1000);
</script>
