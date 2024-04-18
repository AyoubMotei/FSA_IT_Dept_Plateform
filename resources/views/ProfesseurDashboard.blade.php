<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
<h1>this is Professeur/Professor dashboard</h1>

<h1>Welcome {{ Auth::guard('professeur')->user()->name }} </h1>
<h1>your email is - {{ Auth::guard('professeur')->user()->email }} </h1>
    </body>
</html>
