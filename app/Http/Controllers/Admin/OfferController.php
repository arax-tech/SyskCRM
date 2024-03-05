<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Intake;
use App\University;
use App\Campus;
use App\Course;
use App\Offer;
use Auth;
use DB;

class OfferController extends Controller
{
    public function index()
    {
        Check('OfferfView');
        $offers = Offer::get();


        error_reporting(0);
        $campuses = Campus::get();
        foreach ($campuses as $key => $value)
        {
            $university = University::find($value->university_id);
            $campuses[$key]->university_id = $university->id;
            $campuses[$key]->university_name = $university->name;
        }
        return view('admin.offer.index', compact('offers', 'campuses'));
    }


    public function store(Request $request)
    {
    	// dd($request->all());
        $offer = new Offer();
        $offer->campus_id = $request->campus_id;
        $offer->offer = $request->offer;
        $offer->discount = $request->discount;

        if ($request->hasFile('banner')) 
        {
            $file1 = 'banner-'.time().'.'.$request->banner->extension();
            $request->banner->storeAs('/offers/banner/', $file1, 'my_files');
            $offer->banner = $file1;
        }


        $offer->save();

        return redirect()->back()->with('flash_message_success','Offer Create Successfully...');
    }




    public function update(Request $request, $id)
    {
        // dd($request->all());
        $offer = Offer::find($id);
        $offer->campus_id = $request->campus_id;
        $offer->offer = $request->offer;
        $offer->discount = $request->discount;

        if ($request->hasFile('banner')) 
        {
            error_reporting(0);
            unlink(public_path().'/backend/offers/banner/'.$offer->banner);

            $file1 = 'banner-'.time().'.'.$request->banner->extension();
            $request->banner->storeAs('/offers/banner/', $file1, 'my_files');
            $offer->banner = $file1;
        }else{
            $offer->banner = $offer->banner;
        }


        $offer->save();

        return redirect()->back()->with('flash_message_success','Offer Update Successfully...');
    }

  



    public function delete($id)
    {
        Check('OfferfDelete');
        Offer::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Offer Delete Successfully...');
    }

}
