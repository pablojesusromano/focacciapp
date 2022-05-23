<h1>Crear focaccia</h1>



<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" id="Nombre" value="{{ isset($focaccia->Nombre)?$focaccia->Nombre:'' }}"><br>

<label for="Descripcion">Descripcion</label>
<input type="text" name="Descripcion" id="Descripcion" value="{{ isset($focaccia->Descripcion)?$focaccia->Descripcion:'' }}"><br>

<label for="Precio">Precio</label>
<input type="number" step="0.01" name="Precio" id="Precio" value="{{ isset($focaccia->Precio)?$focaccia->Precio:'' }}"><br>

<label for="Foto">Foto</label>
@if(isset($focaccia->Foto))
<img src="{{ asset('storage') . '/' . $focaccia->Foto }}" alt="" width="100">
@endif
<input type="file" name="Foto" id="Foto" value="{{ isset($focaccia->Foto)?$focaccia->Foto:'' }}">

<input type="submit" value="Enviar datos">
