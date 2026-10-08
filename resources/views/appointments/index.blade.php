@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>Appointments</h2>

        <a href="{{ route('appointments.create') }}"
           class="btn btn-primary">
            Add Appointment
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
                <th>Patient</th>
                <th>Doctor</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

        </thead>

        <tbody>

            @forelse($appointments as $appointment)

                <tr>

                    <td>{{ $appointment->id }}</td>

                    <td>
                        {{ $appointment->patient->name ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $appointment->doctor->name ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $appointment->appointment_date }}
                    </td>

                    <td>
                        {{ $appointment->status }}
                    </td>

                    <td>

                        <a href="{{ route('appointments.edit', $appointment->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('appointments.destroy', $appointment->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this appointment?')">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No appointments found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection