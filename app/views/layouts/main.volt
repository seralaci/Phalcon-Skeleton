<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('assets/vendor/bootstrap/css/bootstrap.min.css') }}
        {{ stylesheet_link('assets/css/style.css') }}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="László Séra">
    </head>
    <body>
        {{ content() }}
        {{ javascript_include('assets/vendor/jquery/jquery.min.js') }}
        {{ javascript_include('assets/vendor/tether/js/tether.min.js') }}
        {{ javascript_include('assets/vendor/bootstrap/js/bootstrap.min.js') }}
        {{ javascript_include('assets/js/app.js') }}
    </body>
</html>