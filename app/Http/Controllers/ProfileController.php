<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Food;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profiles = Profile::all();

        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if( $user = Auth::user())
            return view('profiles.create');
        else
            return redirect('food');
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
         if ($user = Auth::user())
        {
            $validatedData = $request->validate(array(
                'username' => 'required|max:25',
                'phone' => 'max:10',
                'address' => 'max:100',
                'city' => 'max:100',
                'province' => 'max:100',
                'zip' => 'max:10',
                'bio' => 'max:255'

            ));
            $user = Auth::user();

           request()->validate( [
            'picture' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);

        // Set up image file name and value.
        $imgName = ''; //default filename (empty)
        //Handle file upload
        if( $file = request()->file('picture'))

        {
            //File dastination and naming...
            $dest = 'img/';
            $imgName = date('YmdHis') .
            '_'.
            str_replace(' ', '_', $file->getClientOriginalName()
            ).
            '.' .
            $file->getClientOriginalExtension();

            //Move the temporary file to a final directory
            $file->move( $dest, //First argument is the file destination
             $imgName //Second argument is the file name
         );

        }
            // $profile = Profile::where("user_id", "=", $user->id)->firstOrFail();
            $profile = new Profile;
            $profile->user_id = $user->id;
            $profile->username = $validatedData['username'];
            $profile->bio = $validatedData['bio'];
            $profile->phone = $validatedData['phone'];
            $profile->address = $validatedData['address'];
            $profile->city = $validatedData['city'];
            $profile->province = $validatedData['province'];
            $profile->zip = $validatedData['zip'];
            $profile->picture = $imgName;
            $profile->save();  
            return redirect('/profiles')->with('success', 'Supplier is added');
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
        $profile = Profile::findOrFail($id);

        $food = Food::findOrFail($id);
        return view('profiles.show', compact('profile'),
        compact('food'));
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
        if ($user = Auth::user()){
            $profile = Profile::findOrFail($id);

            return view('profiles.edit', compact('profile'));
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
         if ($user = Auth::user())
        {
            $validatedData = $request->validate(array(
                'username' => 'required|max:25',
                'bio' => 'max:255'
            ));
            $user = Auth::user();

           request()->validate( [
            'picture' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);

        // Set up image file name and value.
        $fileName = ''; //default filename (empty)
        //Handle file upload
        if( $file = request()->file('picture'))

        {
            //File dastination and naming...
            $dest = 'img/';
            $imgName = date('YmdHis') .
            '_'.
            str_replace(' ', '_', $file->getClientOriginalName()
            ).
            '.' .
            $file->getClientOriginalExtension();

            //Move the temporary file to a final directory
            $file->move( $dest, //First argument is the file destination
             $imgName //Second argument is the file name
         );

        }
            $profile = Profile::where("user_id", "=", $user->id)->firstOrFail();
            $profile = new Profile;
            $profile->user_id = $user->id;
            $profile->username = $validatedData['username'];

            $profile->picture = $imgName;
            $profile->save();  
            return redirect('/profiles')->with('success', 'Supplier is added');
            }
            return redirect('/food');
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
    }
}
