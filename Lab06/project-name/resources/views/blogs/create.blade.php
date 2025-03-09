<h1>Create New Blog</h1>

<form method="POST" action="{{ route('blogs.store') }}">
    @csrf

    <div>
        <label for="id">Blog Number:</label>
        <input type="text" name="id" id="id" value="{{ old('id') }}">
        @error('id')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="title">Blog:</label>
        <select name="title" id="title">
            <option value="">Select Title</option>
            @foreach ($blogs as $blog)
                <option value="{{ $blog->id }}" {{ old('title') == $blog->id ? 'selected' : '' }}>
                    {{ $client->full_name }}
                </option>
            @endforeach
        </select>
        @error('title')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>


    <div>
        <label for="description">Description:</label>
        <input type="text" name="string" id="string" value="{{ old('string') }}" step="0.01">
        @error('string')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Create Blog</button>
</form>

<a href="{{ route('blogs.index') }}">Back to Blogs</a>
