<div class="form-group">
    {{ Form::label('name', 'Nome') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'URL amigavel') }}
    {{ Form::text('slug', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('site', 'Site') }}
    {{ Form::text('site', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Imagem') }}
    {{ Form::file('image') }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

@section('scripts')
 <script>

  document.addEventListener("DOMContentLoaded", function(e) {
    var name = document.getElementById('name'),
        slug = document.getElementById('slug');

    name.onkeyup = function() {
      slug.value = string_to_slug(name.value);
    }
  });

  function string_to_slug (str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "àáäâãèéëêìíïîòóöôõùúüûñç·/_,:;";
    var to   = "aaaaaeeeeiiiiooooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
  }
  </script>
@endsection