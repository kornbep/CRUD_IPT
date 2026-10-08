@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2>Add Appointment</h2>

    @if($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('appointments.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label>Patient</label>

            <select name="patient_id" class="form-control">

                <option value="">Select Patient</option>

                @foreach($patients as $patient)

                    <option value="{{ $patient->id }}">
                        {{ $patient->name }} -
                        {{ $patient->student_id }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Doctor</label>

            <select name="doctor_id" class="form-control">

                <option value="">Select Doctor</option>

                @foreach($doctors as $doctor)

                    <option value="{{ $doctor->id }}">
                        Dr. {{ $doctor->name }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Appointment Date</label>

            <input type="datetime-local"
                   name="appointment_date"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option value="Scheduled">Scheduled</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>

            </select>

        </div>

        <button type="submit" class="btn btn-primary">
            Save Appointment
        </button>

        <a href="{{ route('appointments.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection