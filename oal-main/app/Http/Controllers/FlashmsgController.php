<?php

namespace App\Http\Controllers;
use App\Flashmsg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Auth;
use Session;
class FlashmsgController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:flashmsg-list', ['only' => ['index']]);
        $this->middleware('permission:flashmsg-create', ['only' => ['create','store']]);
        $this->middleware('permission:flashmsg-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:flashmsg-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flashmsgs = Flashmsg::latest()->paginate(10);
        return view('admin.flashmsgs.index',compact('flashmsgs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flashmsgs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $originalImage= $request->file('file');
        if(!empty($originalImage)){
            $image_name = time().$originalImage->getClientOriginalName();
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/project_img/flashmsgs/thumbnail/';
            $originalPath = public_path().'/project_img/flashmsgs/images/';
            $thumbnailImage->save($originalPath.$image_name);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$image_name); 
        }else{
            $image_name = "";
        }

        $requestData = $request->all();
        $requestData['file'] = $image_name;
        $requestData['user_id'] = Auth::user()->id;

        Flashmsg::create($requestData);

        return redirect()->route('flashmsgs.index')
                        ->with('success','Flash Messages created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flashmsg = Flashmsg::where('id',$id)->first();
        if(!$flashmsg){
           return redirect('/flashmsgs')->with('error', 'requested page not found');
        }

        return view('admin.flashmsgs.show',compact('flashmsg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flashmsg = Flashmsg::where('id',$id)->first();
        if(!$flashmsg){
           return redirect('/flashmsgs')->with('error', 'requested page not found');
        }
        return view('admin.flashmsgs.edit',compact('flashmsg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $flashmsgs = Flashmsg::find($id);

        $originalImage= $request->file('file');
        if(!empty($originalImage)){
            $image_name = time().$originalImage->getClientOriginalName();
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/project_img/flashmsgs/thumbnail/';
            $originalPath = public_path().'/project_img/flashmsgs/images/';
            $thumbnailImage->save($originalPath.$image_name);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$image_name); 
        }else{
            $image_name = $flashmsgs->image;
        }

      
        $requestData = $request->all();        
        $requestData['file'] = $image_name;

        $flashmsgs->update($requestData);

        return redirect()->route('flashmsgs.index')
                        ->with('success','Flash Messages updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Flashmsg::find($id)->delete();
        return redirect()->route('flashmsgs.index')
                        ->with('success','Flash Messages deleted successfully');
    }
}
