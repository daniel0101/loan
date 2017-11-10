@if (session('status') && session('message'))
    <div class="alert alert-{{ session('color')}}" style="margin-top: 5em;
    margin-bottom: 0px; text-align:center;">
        <strong>{{ session('status')}}</strong> {{ session('message') }}
    </div>
@endif