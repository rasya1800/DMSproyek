<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\plant;
class PlantController extends Controller
{
    public function managePlant()
    {
        $categories = plant::where('parent_id', '=',0)->get();
        $allCategories = plant::pluck('name','id')->all();
        return view('plantTreeview',compact('categories','allCategories'));
    }

        public function addPlant(Request $request)
    {
        $this->validate($request, [
                'name' => 'required',
            ]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        
        plant::create($input);
        return back()->with('success', 'New Category added successfully.');
    }

}
