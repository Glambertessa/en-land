<textarea name="{$name}" id="{$id}">
           {$text}
</textarea>
<script>
    ClassicEditor
        .create( document.querySelector( '#{$id}' ) )
        .catch( error => {
            console.error( error );
        } );
</script>