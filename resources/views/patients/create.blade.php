@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2>Add Patient</h2>

    @if($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('patients.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Student ID</label>
            <input type="text"
                   name="student_id"
                   class="form-control"
                   value="{{ old('student_id') }}">
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>Course</label>
            <input type="text"
                   name="course"
                   class="form-control"
                   value="{{ old('course') }}">
        </div>

        <div class="mb-3">
            <label>Year Level</label>
            <input type="text"
                   name="year_level"
                   class="form-control"
                   value="{{ old('year_level') }}">
        </div>

        <button type="submit" class="btn btn-primary">
            Save Patient
        </button>

        <a href="{{ route('patients.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection