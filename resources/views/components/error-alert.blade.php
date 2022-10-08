@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
        {{ session('message') }}
    </div>
@endif
