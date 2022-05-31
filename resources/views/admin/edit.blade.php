<form action="{{ url('/admin' . '/' . $focaccia->id) }}" method="post" enctype="multipart/form-data">
    @csrf
   
    {{ method_field('PATCH') }}
    @include('admin.form')
</form>