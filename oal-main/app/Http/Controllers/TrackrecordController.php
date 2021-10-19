<?php


namespace App\Http\Controllers;


use App\TrackRecord;
use Illuminate\Http\Request;


class TrackrecordController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //$this->middleware('permission:newsletter-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = TrackRecord::latest()->paginate(10);

        return view('admin.trackrecords.index',compact('records'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('admin.trackrecords.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'period' => 'required',
            'returns' => 'required|between:0,99.99',
        ]);

        $requestData = $request->all();
        TrackRecord::create($requestData);

        return redirect()->route('trackrecords.index')
                        ->with('success','Track record created successfully.');
    }


    public function edit($id)
    {
        $record = TrackRecord::where('id',$id)->first();
        if(!$record){
           return redirect('/trackrecords')->with('error', 'requested page not found');
        }
        return view('admin.trackrecords.edit',compact('record'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'period' => 'required',
            'returns' => 'required|between:0,99.99',
        ]);

        $record = TrackRecord::find($id);

        $requestData = $request->all();        
        $record->update($requestData);

        return redirect()->route('trackrecords.index')
                        ->with('success','Track records updated successfully');
    }

    public function destroy($id)
    {
        TrackRecord::find($id)->delete();
        return redirect()->route('trackrecords.index')
                        ->with('success','Rrack records deleted successfully');
    }
}