<form action="{{ url('/focaccia' . '/' . $focaccia->id) }}" method="post" enctype="multipart/form-data">
    @csrf
   
    {{ method_field('PATCH') }}
    @include('focaccia.form')
</form>