{{-- Error Messages for form validation --}}
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

{{-- @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif --}}

@foreach (['danger', 'warning', 'success', 'info', 'error'] as $key)
 @if(Session::has($key))
     <div class="alert alert-{{ $key }}">{{ Session::get($key) }}</div>
 @endif
@endforeach