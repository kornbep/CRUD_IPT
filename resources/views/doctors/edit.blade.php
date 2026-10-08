@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Doctor</h1>

    <form action="{{ route('doctors.update', $doctor) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name', $doctor->name) }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Specialization</label>
            <input type="text"
                   name="specialization"
                   class="form-control"
                   value="{{ old('specialization', $doctor->specialization) }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Contact</label>
            <input type="text"
                   name="contact"
                   class="form-control"
                   value="{{ old('contact', $doctor->contact) }}">
        </div>

        <button type="submit" class="btn btn-primary">
            Update Doctor
        </button>

        <a href="{{ route('doctors.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>
@endsection