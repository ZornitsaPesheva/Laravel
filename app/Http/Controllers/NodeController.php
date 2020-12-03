<?php

namespace App\Http\Controllers;

use App\Models\Node;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//
       $nodes = Node::get();
 //      var_dump($nodes[1]['id']);
       return view('nodes.index', ['nodes' => $nodes]);


    //     $nodes = Node::latest()->paginate(5);   
    
      //   return view('nodes.index',compact('nodes'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        var_dump($request);
        $request->validate([
            'id' => 'required',

        ]);
    
        Node::create($request->all());
     
        return redirect()->route('nodes.index')
                        ->with('success','Node created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function show(Node $node)
    {
        return view('nodes.show',compact('node'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function edit(Node $node)
    {
        return view('nodes.edit',compact('node'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Node $node)
    {
        $request->validate([
            'id' => 'required',
        ]);
    
        $node->update($request->all());
    
        return redirect()->route('nodes.index')
                        ->with('success','Node updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function destroy(Node $node)
    {
        $node->delete();
    
        return redirect()->route('nodes.index')
                        ->with('success','Node deleted successfully');
    }
}
