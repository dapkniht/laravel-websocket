@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <form action="{{route('store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="message" class="form-label">Send your message</label>
              <input type="text" class="form-control" id="message" name="message">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            Echo.channel(`send-message`)
    .listen('sendMessage', (e) => {
        console.log(e.message)
        alertify.success(e.message);
    });
});
       
    </script>
@endpush