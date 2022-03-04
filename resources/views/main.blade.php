<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Url Shortener</title>
</head>
<body>
<div id="container" class="col-md-4 mx-auto" style="margin-top: 10%">
    <label for="url">Enter URL:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">https://</span>
        </div>
        <input type="text" class="form-control" id="url" aria-describedby="basic-addon3">
    </div>
    <div id="EmptyFieldTitle" style="display: none">You must enter a URL</div>
    <input id="submit" class="btn btn-primary mt-3" type="submit" value="Submit">
</div>
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</body>
</html>
