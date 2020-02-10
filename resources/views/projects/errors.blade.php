@if ($errors->{ $bag ?? 'default' }->any())
<ul class="alert alert-danger mt-3" role="alert">
    @foreach ($errors->{ $bag ?? 'default' }->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif