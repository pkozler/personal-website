@if (session('status'))
    <div class="alert alert-success mx-3">
        {{ session('status') }}
    </div>
@endif
