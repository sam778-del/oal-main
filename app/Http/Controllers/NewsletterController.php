<?php

namespace App\Http\Controllers;
use App\Newsletter;
use Illuminate\Http\Request;
use Image;
use Auth;
use Session;
class NewsletterController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:newsletter-list', ['only' => ['index']]);
        $this->middleware('permission:newsletter-create', ['only' => ['create','store']]);
        $this->middleware('permission:newsletter-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:newsletter-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Newsletter::latest()->paginate(10);
        return view('admin.newsletters.index',compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsletters.create');
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
            'detail' => 'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $originalImage= $request->file('image');
        if(!empty($originalImage)){
            $image_name = time().$originalImage->getClientOriginalName();
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/project_img/newsletter/thumbnail/';
            $originalPath = public_path().'/project_img/newsletter/images/';
            $thumbnailImage->save($originalPath.$image_name);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$image_name); 
        }else{
            $image_name = "";
        }

        $requestData = $request->all();
        $requestData['image'] = $image_name;
        $requestData['user_id'] = Auth::user()->id;

        Newsletter::create($requestData);

        return redirect()->route('newsletters.index')
                        ->with('success','Newsletter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = Newsletter::where('id',$id)->first();
        if(!$news){
           return redirect('/newsletters')->with('error', 'requested page not found');
        }

        return view('admin.newsletters.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = Newsletter::where('id',$id)->first();
        if(!$news){
           return redirect('/newsletters')->with('error', 'requested page not found');
        }
        return view('admin.newsletters.edit',compact('news'));
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
            'detail' => 'required',
            //'imagefile' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $news = Newsletter::find($id);

        $originalImage= $request->file('imagefile');
        if(!empty($originalImage)){
            $image_name = time().$originalImage->getClientOriginalName();
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/project_img/newsletter/thumbnail/';
            $originalPath = public_path().'/project_img/newsletter/images/';
            $thumbnailImage->save($originalPath.$image_name);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$image_name); 
        }else{
            $image_name = $news->image;
        }

        $request->merge([
            'image' => $image_name
        ]);
        $requestData = $request->all();        


        $news->update($requestData);

        return redirect()->route('newsletters.index')
                        ->with('success','Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Newsletter::find($id)->delete();
        return redirect()->route('newsletters.index')
                        ->with('success','Newsletter deleted successfully');
    }
}
