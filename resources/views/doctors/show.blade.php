@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Doctor Details</h1>

    <p><strong>Name:</strong> {{ $doctor->name }}</p>
    <p><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
    <p><strong>Contact:</strong> {{ $doctor->contact ?? 'N/A' }}</p>

    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">
        Back
    </a>

    <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-warning">
        Edit
    </a>
</div>
@endsection