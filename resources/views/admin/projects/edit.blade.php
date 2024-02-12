@extends('layouts.admin')


@section('content')
    <h2 class="text-center">Edit your project</h2>
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title', $project->title) }}" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" cols="30" rows="10"
                value="{{ old('description', $project->description) }}"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb"
                value="{{ old('thumb', $project->thumb) }}">
            @error('thumb')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Project Category</label>
            <select class="form-select" name="category" aria-label="Default select example">
                <option selected>Choose Category</option>
                <option value="backend" @if (old('category', $project->category) == 'backend') selected @endif>Back-end</option>
                <option value="frontend" @if (old('category', $project->category) == 'frontend') selected @endif>Front-end</option>
                </option>
            </select>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Project Status</label>
            <select class="form-select" name="status" aria-label="Default select example">
                <option selected>Choose Status</option>
                <option value="status" @if (old('status', $project->status) == 'ongoing') selected @endif>Ongoing</option>
                <option value="status" @if (old('status', $project->status) == 'completed') selected @endif>Completed</option>
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="type_id">Tipologia:</label>
            <select name="type_id" id="type_id" class="form-control">
                <option value="">Nessuna tipologia associata</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"
                        {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Submit your project</button>
    </form>
@endsection
