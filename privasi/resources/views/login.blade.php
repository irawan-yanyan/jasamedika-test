<!DOCTYPE html>
<html>
<head>
<title>Login blog</title>
</head>
<body>
    <h3>Silahkan Login</h3>
                       {!!Form::open(['url'=>'insert','files'=>true])!!}
                <p>Email : <br> {!!Form::label("Name : ")!!} {!!Form::text('nama')!!} <br></p>
                
                <p> {!!Form::submit('Save',['class'=>'btn btn-danger'])!!}</p>
           
            {!!Form::close()!!}
</body>
</html>}