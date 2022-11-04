{{-- @include('staff.appointmentManage') --}}

@section('content')
        
    @if ($notes != null)
        @foreach ($notes as $note)
            <label for="">User</label>{{$note->user_id}} <br>
            <label for="">Staff</label>{{$note->staff_id}} <br>
            <label for="">Note</label>{{$note->note}} <br>

            <p>===============================================</p>
        @endforeach

        {{-- {{ session()->get('notes')->links() }} --}}
    @endif
            
@endsection
