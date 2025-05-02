<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <style>
        .gallery img { width: 200px; height: 200px; object-fit: cover; margin: 10px; }
        .gallery div { display: inline-block; position: relative; }
        button { position: absolute; top: 5px; right: 5px; }
    </style>
</head>
<body>
    <h2>Upload Single Image</h2>
    <form action="{{ route('images.upload.single') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload Single</button>
    </form>

    <h2>Upload Multiple Images</h2>
    <form action="{{ route('images.upload.multiple') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple required>
        <button type="submit">Upload Multiple</button>
    </form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h2>Uploaded Images</h2>
    <div class="gallery">
        @foreach($images as $image)
            <div>
                <img src="{{ asset($image->path) }}" alt="Image">
                <form action="{{ route('images.destroy', $image) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">X</button>
                </form>
            </div>
        @endforeach
    </div>

    {{ $images->links() }}
</body>
</html>

