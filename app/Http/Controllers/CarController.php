<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\trait\Common;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CarController extends Controller
{
    use Common;
    protected $columns=["title","description","published"];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Car!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $allcar=Car::get();
        return view("AllCar",compact('allcar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcategory=Category::get();
        return view("addCar",compact('allcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages=$this->massages();
        $data=$request->validate(
            ["title"=>"required",
            "description"=>"required|min:5",
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'Category_id'=>'required',
        ],$messages);
        // dd($request);        
        // $car=new Car;
        // $car->title=$request->title;
        // $car->description=$request->description;
        // $car->published=(isset($request->published))?1:0;
        // $car->save();
        // session()->flash("done","data Add successfully");

        
        $data["published"]=isset($request->published);
        $data["image"]=$this->uploadFile($request->image,"assets/images");
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
        $allcategory=Category::get();
       
        return view("UpdataCar",compact("field","allcategory"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $messages=$this->massages();
        $data=$request->validate(
            ["title"=>"required",
            "description"=>"required|min:5",
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'Category_id'=>'required',

        ],$messages);
        $field=Car::findOrFail($request->id);
        // $data["image"]= $request->has("image")?$this->uploadFile($request->image,"assets/images"):$field["image"];
        if($request->has("image")){
            //to delete old image
        unlink("assets/images/$field[image]");
        $data["image"]=$this->uploadFile($request->image,"assets/images");
        }
       // else $data["image"]=$field["image"];
        $request["published"]=isset($request->published);
        $field->update($data);
       Alert::success("Successfully","updata Car Successful");
       return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {     
        $field=Car::where('id',$id)->DELETE();
        Alert::success("delete","delete  Car Successful");
        return redirect()->back();
    }
    public function trashed(){
        $title = 'ForceDelete Car!';
        $text = "Are you sure you want to delete Ever?";
        confirmDelete($title, $text);
        $trashedCar=Car::onlyTrashed()->get();
        return view("trashed",compact('trashedCar'));
    }
    public function forceDelet($id){
        $Car=Car::onlyTrashed()->find($id);
        unlink("assets/images/$Car[image]");
        $Car->forceDelete();
        Alert::success("delete","ForceDelet  Car Successful");
    return redirect()->back();
    }
    public function  RestoreCar($id)  {
    Car::where('id',$id)->restore();
    return redirect(route('allCar'));
    }
   public  function massages(){
      return  [
            "title.required" =>"العنوان مطلوب",
            "description.required" =>"الوصف مطلوب",
            "description.min" =>" الوصف يجب ان يزيد عن 5",
            "Category_id.required"=>"choose the category "
        ];
    }
}
