<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
<h1>this is Etudiant/Student dashboard</h1>

<h1>Welcome {{ Auth::guard('etudiant')->user()->name }} </h1>
<h1>your email is - {{ Auth::guard('etudiant')->user()->email }} </h1>
    </body>
</html>
