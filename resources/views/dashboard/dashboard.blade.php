@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Doctor Queues</h2>
        </div>
        <div class="col-md-6">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5 mb-3 d-flex">
            <button id="docQueueButton" class="btn btn-warning ml-auto">Add Doctor Queue</button>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Room No</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Doctor Specialist</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $id = 1;
                    @endphp
                    @foreach ($queues as $queue)
                    <tr>
                        <th scope="row">{{$id++}}</th>
                        <td>{{$queue->room_no}}</td>
                        <td>{{$queue->doctor_name}}</td>
                        <td>{{$queue->doctor_special}}</td>
                        <td>
                            <button class="btn btn-warning">Update</button>
                            <button onclick="queueDlt({{$queue->id}})" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="docQueue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Doctor Queue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.doctor.queue') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email">Room NO</label>
                        <input type="text" id="roomNo" name="roomNo" class="form-control" value="{{ old('roomNo') }}">
                        @error('roomNo')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div>
                        <label for="email">Doctor Name</label>
                        <input type="text" id="docName" name="docName" class="form-control"
                            value="{{ old('docName') }}">
                        @error('docName')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div>
                        <label for="email">Doctor Special</label>
                        <input type="text" id="docspecial" name="docspecial" class="form-control"
                            value="{{ old('docspecial') }}">
                        @error('docspecial')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    {{-- <div class="form-group row mt-2">
                        <button class="btn btn-primary" type="submit">Add Queue</button>
                    </div> --}}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Add Queue</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    // When the button is clicked
    $("#docQueueButton").click(function() {
    // Show the modal
    $('#docQueue').modal('show');
    });
    });


//    function queueDlt(id){
//         if (confirm('Are you sure you want to delete this queue?')) {
//         $.ajax({
//         url: '/queue-delete/' + id,
//         type: 'get',
//         data: {
//         _token: '{{ csrf_token() }}',
//         },
//         success: function(response) {
//         alert('Doctor Queue deleted successfully!');
//         location.reload(); // Reload the page to reflect changes
//         },
//         error: function(response) {
//         alert('Error deleting post.');
//         }
//         });
//         }
//     }
</script>

@endsection