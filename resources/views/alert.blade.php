@if ($message = Session::get('success'))
    <div id="alert" class="mx-10 mt-10 bg-softGreenColor rounded-lg py-5 px-6 mb-4 text-base text-greenColor mb-3" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@elseif($message = Session::get('error'))
    <div id="alert" class="alertmx-10 alert bg-softPinkColor rounded-lg py-5 px-6 mb-4 text-base text-pinkColor" role="alert">
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
        $("#alert").fadeTo(2000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 1000);
</script>
