@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Patients</h2>

        <a href="{{ route('patients.create') }}" class="btn btn-primary">
            Add Patient
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Year Level</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($patients as $patient)

                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->student_id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->course }}</td>
                    <td>{{ $patient->year_level }}</td>

                    <td>

                        <a href="{{ route('patients.edit', $patient->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('patients.destroy', $patient->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this patient?')">
                                Delete
                            </button>

                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No patients found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection