@if ($errors->any())
<div class="alert alert-primary mb-0" role="alert">
    <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
    <span class="alert-inner--text"><strong>Danger!</strong> 
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
    </span>
</div>
@endif

@if (Session::has('success'))
{{-- <div class="alert alert-success" id="alertMessage">
    {{ Session::get('success') }}
</div> --}}

<div class="alert alert-success" role="alert">
    <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
    <span class="alert-inner--text"><strong>Success!</strong> {{ Session::get('success') }}</span>
</div>
@endif