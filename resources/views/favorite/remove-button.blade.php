<form action="/favorite/remove/{{$id}}" method="post" onsubmit="remove(this);return false;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">{{$text}}</button>
</form>
<script>
    function remove(f){
        if(confirm('Are you sure?'))
            f.submit();
    }
</script>
