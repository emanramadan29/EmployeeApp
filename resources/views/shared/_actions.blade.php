
    <a href="{{route('users/edit',$id)}}" type="button" class="btn btn-info">Edit</a>
    <a class="btn">
        <form action="{{route('users/delete',$id)}}" method="post" >
            @csrf @method('delete')
            <button  type="submit" class="btn btn-danger">Delete</button >
        </form>
    </a>
