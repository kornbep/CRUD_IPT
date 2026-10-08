@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Doctor</h1>

    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name') }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Specialization</label>
            <input type="text"
                   name="specialization"
                   class="form-control"
                   value="{{ old('specialization') }}"
                   placeholder="e.g. Cardiologist"
                   required>
        </div>

        <div class="mb-3">
            <label>Contact</label>
            <input type="text"
                   name="contact"
                   class="form-control"
                   value="{{ old('contact') }}">
        </div>

        <button type="submit" class="btn btn-success">
            Save Doctor
        </button>

        <a href="{{ route('doctors.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>
@endsection