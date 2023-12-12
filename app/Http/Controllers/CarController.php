<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CarController extends Controller
{
    protected $columns=["title","description","published"];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allcar=Car::get();
        return view("AllCar",compact('allcar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("addCar");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        
        // $car=new Car;
        // $car->title=$request->title;
        // $car->description=$request->description;
        // $car->published=(isset($request->published))?1:0;
        // $car->save();
        // session()->flash("done","data Add successfully");

        $data=$request->only($this->columns);
        $data["published"]=isset($request->published);
        Car::create($data);
        // Alert::success('Success ', 'Successful add Car');

        return redirect("allCar");
    
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $field=Car::findOrFail($id); 
         
        return view("showCar",compact("field"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $field=Car::findOrFail($id);
       
        return view("UpdataCar",compact("field"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request["published"]=isset($request->published);
      
        $field=Car::where("id",$request->id);
        $field->update($request->only($this->columns));
       Alert::success("Successfully","updata Car Successful");
       return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $field=Car::where('id',$id)->Delete();

        Alert::success("delete","delete  Car Successful");
        return redirect()->back();
    }
}
