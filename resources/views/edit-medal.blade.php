<html lang="en">
<!--
### TIMID0x - 2023-08-23T09:47:01.000-05:00
-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit</h1>
    <form action="/edit-medal/{{ $medal->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $medal->title }}">
        <textarea name="body" placeholder="body area">{{ $medal->body }}</textarea>
        <button>Save changes</button>
    </form>
</body>

</html>
