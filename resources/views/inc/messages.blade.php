{{-- Error Messages for form validation --}}
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

{{-- Flash messages passed in with view --}}
@foreach (['danger', 'warning', 'success', 'info', 'error'] as $key)
 @if(Session::has($key))
     <div class="alert alert-{{$key}}">{{Session::get($key)}}</div>
 @endif
@endforeach