@extends ('layouts.admin')
@section ('contenido')

<link rel="shortcut icon" href="public/img/Logo-SICAAB.png">
<link rel="stylesheet" href="css/estlios-correo.css">

<h1>Correo</h1>
<form method="POST" action="{{ route('contact') }}" >
    @csrf
    <input type="name" name="name" placeholder="Nombre">
    {!! $errors->first('name', '<small>:message</small>') !!}
    <br>
    <br>
    <input name="email" placeholder="Email">
    {!! $errors->first('email', '<small>:message</small>') !!}
    <br>
    <br>
    <input type="subject" placeholder="Asunto" name="subject">
    <br>
    <br>
    <textarea name="content" placeholder="Mensaje"></textarea>
    <br>
    <br>
    <button>Enviar</button> 
</form>
@endsection
