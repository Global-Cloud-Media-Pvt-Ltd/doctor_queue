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