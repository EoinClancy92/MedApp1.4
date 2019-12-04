<?php
# @Date:   2019-12-03T19:00:03+00:00
# @Last modified time: 2019-12-03T19:30:15+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $returnedUsers = array();
        foreach($users as $user) {
            if($user->doctor) {
                array_push($returnedUsers, $user);
              }
            }
            return view('admin.doctors.index')->with([
              'users' => $returnedUsers
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
         'name' => 'required|max:191|string',
         'email' => 'required|email|unique:users|max:191',
         'password' => 'required|min:8',
         'address' => 'required|max:255|string',
         'mobile_number' => 'required|max:191|string',
         'date_started' => 'required|date'
     ]);
     $user = new User();
     $user->name = $request->input('name');
     $user->email = $request->input('email');
     $user->address = $request->input('address');
     $user->mobile_number = $request->input('mobile_number');
     $user->password = Hash::make($request->input('password'));
     $user->save();
     $user->roles()->attach(Role::where('name', 'doctor')->first());
     $doctor = new Doctor();
     $doctor->date_started = $request->input('date_started');
     $doctor->user_id = $user->id;
     $doctor->save();
     return redirect()->route('admin.doctors.show', $user->id);
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
