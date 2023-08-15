<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/test.css">
    <title>Test Upload Image</title>
</head>
<body>
    <form method="POST" action="/api/upload" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Upload</button>
    </form> <br>
    Recently uploaded image : <br>
    <div id="images">
        @foreach ($urls as $url)
            <img src="{{ asset($url) }}" alt="Uploaded image">
        @endforeach
    </div>
    
</body>
</html>