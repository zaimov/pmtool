@if ($errors->any())
<ul class="alert alert-danger mt-3" role="alert">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif