<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profile;
use App\User;
use App\Reviews;
use App\Food;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $foods = Food::query()

        // ->join('users', 'food.profile_id', '=', 'users.id')
        // ->select('food.id', 'users.id as user_id', 'food.foodname', 'food.ingredients', 'users.name')
        // ->get();

        $foods = Food::all();

        return view('food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        if($user)
            return view('food.create');
        else
            return redirect('/food');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if( $user = Auth::user())
        {
            $validatedData = $request->validate(array(
                'foodname' =>  'required|max:25',
                'ingredients' => 'required|max:500',
                'price' => 'required|max:5'
               ));


             //Check for image type.
        request()->validate( [
            'photo' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);

        // Set up image file name and value.
        $fileName = ''; //default filename (empty)
        //Handle file upload
        if( $file = request()->file('photo'))

        {
            //File dastination and naming...
            $dest = 'img/';
            $fileName = date('YmdHis') .
            '_'.
            str_replace(' ', '_', $file->getClientOriginalName()
            ).
            '.' .
            $file->getClientOriginalExtension();

            //Move the temporary file to a final directory
            $file->move( $dest, //First argument is the file destination
             $fileName //Second argument is the file name
         );

        }
            //$profile = User::where("user_id", "=", $user->id)->firstOrFail();
            $food = new Food;
            $food->user_id = $user->id;
            $food->foodname = $validatedData['foodname'];
            $food->ingredients = $validatedData['ingredients'];
            $food->photo = $fileName;
            $food->price = $validatedData['price'];
            $food->save();  
            return redirect('/food')->with('success', 'Food is saved');
            }
            return redirect('/food');
                   
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $food = Food::findOrFail($id);

        $user = User::findOrFail($food->user_id);

        $profile = Profile::where("user_id", "=", "$user->id")->firstOrFail();

        return view('food.show', compact('food', 'profile', 'user'));

        // $profile = Profile::findOrFail($food->profile_id);
        // return view('food.show', compact('food'),
        // compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if($user = Auth::user()){
            $food = Food::findOrFail($id);
            return view('food.edit',compact('food'));
        }
        return redirect('/food');
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
        //
         $food = Food::findOrFail($id);

        if( $user = Auth::user()){
        $validatedData = $request->validate(array(
                'foodname' =>  'required|max:25',
                'ingredients' => 'required|max:255'        ));

        food::whereId($id)->update($validatedData);
        
        return redirect('/food')->with('success', 'Food Updated');
    }
    return redirect('food');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($user = Auth::user()){
            $food = Food::findOrFail($id);
            $food->delete();
            return redirect('/food')->with('success', 'Food deleted');
        }
        return redirect('/food');
    }

}
