@extends('nodes.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <!-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('nodes.create') }}"> Create New Node</a>
            </div> -->
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   


    <div id="tree">
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

        var something = {!! $nodes !!};
        chart.load(something);
        console.log(something);

    </script>
      
@endsection