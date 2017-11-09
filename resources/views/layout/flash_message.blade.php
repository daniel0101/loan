@if (session('status') && session('message'))
    <div class="alert alert-{{ session('color')}}">
        <strong>{{ session('status')}}</strong> {{ session('message') }}
    </div>
@endif