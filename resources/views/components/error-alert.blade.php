@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
        <br>
        {{ session('message') }}
    </div>
@endif
