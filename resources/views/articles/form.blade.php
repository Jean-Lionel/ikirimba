
<div>
	

		<div class="form-group">
			<label for="">Titre</label>
			<input type="text"  name="title" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Déscription</label>
			<textarea class="form-control" name="description" id="editor"></textarea>
		</div>

		<div class="form-group">
			<label for="">Image</label>
			<input type="file" name="image" class="form-control">
		</div>

		<div class="form-group">
			<button class="btn-primary">Enregistrer</button>
		</div>
		
	
</div>

@section('javascript')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

<script>
	
	ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


@stop