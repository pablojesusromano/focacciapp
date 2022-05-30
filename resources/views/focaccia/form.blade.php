
@section('formulario')

<h1>Crear focaccia</h1>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<label for="Nombre" class="form-label">Nombre</label>
<input class="form-control"type="text" name="Nombre" id="Nombre" value="{{ isset($focaccia->Nombre)?$focaccia->Nombre:'' }}"><br>

<label for="Descripcion" class="form-label">Descripcion</label>
<textarea class="form-control" type="text" name="Descripcion" id="Descripcion" value="{{ isset($focaccia->Descripcion)?$focaccia->Descripcion:'' }}">
</textarea><br>
<label for="Precio" class="form-label">Precio</label>
<input class="form-control" type="number" step="0.01" name="Precio" id="Precio" value="{{ isset($focaccia->Precio)?$focaccia->Precio:'' }}"><br>

<label for="Foto" class="form-label">Foto</label>
@if(isset($focaccia->Foto))
<img src="{{ asset('storage') . '/' . $focaccia->Foto }}" alt="" width="100">
@endif
<input class="form-control" type="file" name="Foto" id="Foto" value="{{ isset($focaccia->Foto)?$focaccia->Foto:'' }}">
<button class="btn btn-primary" type="submit" value="Enviar datos">
    Enviar Datos
</button>


@endsection