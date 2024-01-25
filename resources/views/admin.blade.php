<!-- resources/views/admin/events.blade.php -->
@extends('Template.html')

@section('title', 'Admin Events')

@section('body')
    @include('template.navadmin')
    <div class="container mt-5">
        <h2>Events</h2>

        <table class="table table-bordered mt-3" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Stock</th>
                    <th>Update Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td width="150">{{ $event->name }}</td>
                        <td width="250">
                            <img src="{{ asset($event->image) }}" alt="Event Image" class="thumbnail" width="150">
                        </td>
                        <td>{{ $event->status }}</td>
                        <td>{{ $event->stock }}</td>
                        <td width="300">
                            <form action="{{ route('events.update-status', $event->id) }}" method="POST">
                                @csrf
                                <label for="status" class="sr-only">Update Status:</label>
                                <div class="d-flex gap-2">
                                    <select name="status" id="status" class="form-control w-50" >
                                        <option value="active" {{ $event->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $event->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('table/cdn.datatables.net_1.13.6_js_dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('table/code.jquery.com_jquery-3.7.0.js') }}"></script>
    <script>new DataTable('#example')</script>
@endsection
