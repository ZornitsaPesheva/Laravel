@extends('nodes.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('nodes.create') }}"> Create New Node</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>ReportsTo</th>
            <!-- <th width="280px">Action</th> -->
        </tr>
        @foreach ($nodes as $node)
        <tr>
            <!-- <td>{{ ++$i }}</td> -->
            <td>{{ $node->id }}</td>
            <td>{{ $node->reportsTo }}</td>
            <td>
                <form action="{{ route('nodes.destroy',$node->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('nodes.show',$node->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('nodes.edit',$node->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>ReportsTo</th>
            <!-- <th width="280px">Action</th> -->
        </tr>
        @foreach ($nodes as $node)
        <tr>
            <!-- <td>{{ ++$i }}</td> -->
            <td>{{ $node->id }}</td>
            <td>{{ $node->reportsTo }}</td>
            <td>
                <form action="{{ route('nodes.destroy',$node->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('nodes.show',$node->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('nodes.edit',$node->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>


    <div id="tree">
chart
    </div>
    <script>
        var chart = new OrgChart(document.getElementById("tree"), {
            enableDragDrop: true,
            nodeMenu: {
                edit: { text: "Edit" },
                add: { text: "Add" },
                remove: { text: "Remove" }
            },
            nodeBinding: {
                field_0: "id"
            }
        });

        console.log(nodes);
    </script>
  
    {!! $nodes->links() !!}
      
@endsection