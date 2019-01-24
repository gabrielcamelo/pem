{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
	{{ Form::label('category_id', 'Categorias') }}
	{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div> 
<div class="form-group">
    {{ Form::label('name', 'Nome do post') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'URL amigavel') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Imagem') }}
    {{ Form::file('image') }}
</div>
<div class="form-group">
	{{ Form::label('slug', 'Estado') }}
	<label>
		{{ Form::radio('status', 'PUBLISHED') }} Publicado
	</label>
    <label>
   {{ Form::datetime('publish_in', isset($post->publish_in) ? $post->publish_in : date('Y-m-d H:i:s', strtotime(now()) ) ) }}
  </label>
	<label>
		{{ Form::radio('status', 'DRAFT') }} Não publicado
	</label>
</div>
<div class="form-group">
	{{ Form::label('tags', 'Etiquetas') }}
	<div>
	@foreach($tags as $tag)
		<label>
			{{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->name }}
		</label>
	@endforeach
	</div>
</div>
<div class="form-group">
    {{ Form::label('excerpt', 'Resumo') }}
    {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '4']) }}
</div>
<div class="form-group">
    {{ Form::label('body', 'Descrição') }}
    {{ Form::textarea('body', null, ['class' => 'form-control my-editor', 'rows' => '12']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

@section('scripts')
{{-- <script src="{{ asset('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script> --}}
<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
<script>

    var editor_config = {
    path_absolute : "{{ URL::to('/') }}/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
      });
    }
  };

tinymce.init(editor_config);














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