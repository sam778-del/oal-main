<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;
use App\Newsletter;
use App\Mail\TestMail;
use Mail;
use Session;

class HomesController extends Controller
{
    
    public function index(Request $request){


        //$request->session()->forget('disclaimer');

        $disclaimer = $request->session()->get('disclaimer');
        if(!empty($disclaimer)){
            $disclaimer = '0';
        }else{
            $disclaimer = '1';
        }
        $price = Price::where('id',1)->first();
        return view("site.index",compact('price', 'disclaimer'));
    }
    
    public function disclaimer(Request $request){
        
        $request->session()->put('disclaimer', 'accept');
        return response()->json(['data' => "success"], 201);
    }
    
    public function blogDetail(Request $request){
     
        return view("site.blogDetail");
    }

    public function corporateValues(Request $request){
     
        return view("site.corporateValues");
    }

    public function methdology(Request $request){
     
        return view("site.methdology");
    }


    public function newsletter(Request $request){
        
        $news = Newsletter::where('active', '=', 1)
                ->orderBy('updated_at', 'desc')
                ->paginate(6);

        return view('site.newsletter',compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function newsletterDetails(Request $request, $id){
        
        $news = Newsletter::where('id',$id)->first();
        if(!$news){
           return redirect('/newsletters')->with('error', 'requested page not found');
        }

        $recentNews = Newsletter::where([
                ['id', '!=' , $id],
                ['active', '=', 1],
            ])->orderBy('updated_at', 'desc')->limit(3)->get();


        return view("site.newsletterDetails", compact('news', 'recentNews'));
    }

    public function whoWeAre(Request $request){
        
        $myEmail = 'vasansrini8206@gmail.com';
        $details = [
            'title' => 'Mail Test from Nicesnippets.com',
            'url' => 'https://www.nicesnippets.com'
        ];

        //Mail::to($myEmail)->send(new TestMail($details));
        return view("site.whoWeAre");
    }

}
