
@if(session('success'))
    <div class="alert success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert error">
        {{ $error->first() }}
    </div>
@endif
