@extends('layout')

@section('content')
<a href="{{ route('tasks.index') }}" class="btn btn-secondary mb-3">Back</a>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label>Due Date</label>
        <input type="date" name="due_date" class="form-control" required value="{{ old('due_date') }}">
        @error('due_date') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-primary">Create Task</button>
</form>
@endsection
