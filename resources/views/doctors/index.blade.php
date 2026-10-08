@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Doctors</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">
        Add Doctor
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialization</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialization }}</td>
                    <td>{{ $doctor->contact ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('doctors.edit', $doctor) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('doctors.destroy', $doctor) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this doctor?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        No doctors found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection