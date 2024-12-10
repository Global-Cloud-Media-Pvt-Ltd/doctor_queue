@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-10">
            <h1>Doctor Queues</h1>
        </div>
        <div class="col-md-4 col-sm-4 col-2 d-flex justify-content-end">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>
    </div>
    <div class="row d-flex justify-content-end">
        <div class="col-md-8 col-sm-8 col-1 mt-5 mb-3 d-flex"></div>
        <div class="col-md-4 col-sm-4 col-11 mt-5 mb-3 d-flex">
            <button id="iframeButton" class="btn btn-primary m-1 float-right">Add Iframe</button>
            <button id="docQueueButton" class="btn btn-warning m-1 float-right">Add Doctor Queue</button>
        </div>
        {{-- <div class="col-md-2 col-sm-4 col-4 mt-5 mb-3 d-flex">
            <button id="docQueueButton" class="btn btn-warning ml-auto">Add Doctor Queue</button>
        </div> --}}
        @if(session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
        @endif
        <div class="col-md-12">
            <table class="table" id="docQueueTable">
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
                            <button type="submit" onclick="updateQueue({{$queue->id}})"
                                class="btn btn-warning m-1">Update</button>
                            <button onclick="queueDlt({{$queue->id}})" class="btn btn-danger m-1">Delete</button>
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
                        <label for="email">Room No</label>
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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Add Queue</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="updDocQueue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Doctor Queue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.doctor.queue') }}" method="POST">
                    @csrf
                    <div>
                        <input type="text" id="upId" name="upId" class="form-control" value="" hidden>
                        <label for="email">Room No</label>
                        <input type="text" id="upRoomNo" name="roomNo" class="form-control" value="{{ old('roomNo') }}">
                        @error('roomNo')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div>
                        <label for="email">Doctor Name</label>
                        <input type="text" id="upDocName" name="docName" class="form-control" value="">
                        @error('docName')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div>
                        <label for="email">Doctor Special</label>
                        <input type="text" id="upDocspecial" name="docspecial" class="form-control"
                            value="{{ old('docspecial') }}">
                        @error('docspecial')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Update Queue</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="iframe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Iframe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.iframe') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email">Iframe</label>
                        <input type="text" id="iframe" name="iframe" class="form-control" value="{{ old('iframe') }}">
                        @error('iframe')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Add Iframe</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

    $("#docQueueButton").click(function() {    
        $('#docQueue').modal('show');
    });

    });

    $(document).ready(function() {
    
        $("#iframeButton").click(function() {
            $('#iframe').modal('show');
        });
        
    });


   function queueDlt(id){
        if (confirm('Are you sure you want to delete this queue?')) {
        $.ajax({
            url: '/queue-delete/' + id,
            type: 'delete',
            data: {
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            alert('Doctor Queue deleted successfully!');
            location.reload();
        },
        error: function(response) {
            alert('Error deleting post.');
        }
        });
        }
    }

    function updateQueue(id){
        $('#updDocQueue').modal('show');
        $.get("get-single-queue/"+id, function(data){
            $('#upDocName').val(data[0].doctor_name);
            $('#upRoomNo').val(data[0].room_no);
            $('#upDocspecial').val(data[0].doctor_special);
            $('#upId').val(data[0].id);
        });
       
    }
</script>


<script>
    // Initialize DataTable
            $(document).ready(function() {
               
                $('#docQueueTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "lengthMenu": [5, 10, 15, 20], 
                "dom": 'Bfrtip',
                "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print' 
                ]
                });
            });
</script>

@endsection