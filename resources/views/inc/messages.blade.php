@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <article class="alert alert-danger">
            {{error}}
        </article>
    @endforeach
@endif

    @if (session('success'))
        <article class="alert alert-success">
            {{session('success')}}
        </article>
    @endif

    @if (session('error'))
        <article class="alert alert-danger">
            {{session('error')}}
        </article>
    @endif
