    @extends('partial.master')
    
    @section('title', 'Data Pertanyaan')

    @section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-primary alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('change'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('delete'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <a href="/post/create" class="btn btn-primary my-3">Tambah</a>
    <table class="table table-bordered text-center">
        <thead class="thead-light">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($post as $key => $pst)
                <tr>
                    <td>{{$key + 1}}</th>
                    <td>{{$pst->title}}</td>
                    <td>{{$pst->body}}</td>
                    <td>
                        <a href="/post/{{$pst->id}}" class="btn btn-info">Show</a>
                        <a href="/post/{{$pst->id}}/edit" class="btn btn-primary">Edit</a>
                        <form action="/post/{{$pst->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger my-1" value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">Nggak ada data</div>
            @endforelse             
        </tbody>
    </table>

    @endsection