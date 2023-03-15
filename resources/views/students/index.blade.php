@extends('students.layout')
@section('content')
    @if ($message = Session::get('flash_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2 class="text-center text-success mt-4">Student Crud</h2>
            <a href="{{ url('/student/create') }}" class="btn btn-success btn-sm" title="Add Student">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Student
            </a>
            <div class="container">
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->mobile }}</td>
                                <td>{{ $student->address }}</td>

                                <td>
                                    
                                    <a href="{{ url('/student/' . $student->id . '/edit') }}" class="btn btn-success mx-2">
                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form method="POST" action="{{ url('/student' . '/' . $student->id) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Student"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)">
                                            <i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
