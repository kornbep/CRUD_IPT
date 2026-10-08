@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2>Edit Appointment</h2>

    @if($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form action="{{ route('appointments.update', $appointment->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Patient</label>

            <select name="patient_id" class="form-control">

                @foreach($patients as $patient)

                    <option value="{{ $patient->id }}"
                        {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>

                        {{ $patient->name }} -
                        {{ $patient->student_id }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Doctor</label>

            <select name="doctor_id" class="form-control">

                @foreach($doctors as $doctor)

                    <option value="{{ $doctor->id }}"
                        {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>

                        Dr. {{ $doctor->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Appointment Date</label>

            <input type="datetime-local"
                   name="appointment_date"
                   class="form-control"
                   value="{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d\TH:i') }}">

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option value="Scheduled"
                    {{ $appointment->status == 'Scheduled' ? 'selected' : '' }}>
                    Scheduled
                </option>

                <option value="Completed"
                    {{ $appointment->status == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>

                <option value="Cancelled"
                    {{ $appointment->status == 'Cancelled' ? 'selected' : '' }}>
                    Cancelled
                </option>

            </select>

        </div>

        <button type="submit" class="btn btn-primary">
            Update Appointment
        </button>

        <a href="{{ route('appointments.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection