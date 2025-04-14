@extends('layout')

@section('content')
<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add Task</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->due_date }}</td>
            <td>
                @if($task->is_completed)
                    <span class="badge bg-success">Completed</span>
                @else
                    <span class="badge bg-secondary">Pending</span>
                @endif
            </td>
            <td>
                <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-sm btn-warning">
                        {{ $task->is_completed ? 'Mark Pending' : 'Mark Completed' }}
                    </button>
                </form>

                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-info">Edit</a>

                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $tasks->links('pagination::bootstrap-4') }}
@endsection
