<?php
# @Date:   2019-12-05T19:13:17+00:00
# @Last modified time: 2019-12-05T20:22:01+00:00



namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use App\Appointment;
use Illuminate\Support\Facades\Hash;
class PatientController extends Controller
{
    /**
     * Only authenticated users with the admin role
     * can use this controller
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    /**
     * Get all users who are patients,
     * and return a view with these users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $returnedUsers = array();
        foreach($users as $user) {
            if($user->patient) {
                array_push($returnedUsers, $user);
            }
        }
        return view('admin.patients.index')->with([
            'users' => $returnedUsers
        ]);
    }
    /**
     * Show the form for creating a new patient.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patients.create');
    }
    /**
     * Display the specified patient, along
     * with appointments associated with this patient
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::findOrFail($id);
        $appointments = Appointment::orderBy('date', 'DESC')->get();
        $returnedAppointments = array();
        foreach($appointments as $appointment) {
            if($user->patient->id == $appointment->patient_id) {
                array_push($returnedAppointments, $appointment);
            }
        }

        return view('admin.patients.show')->with([
            'user' => $user,
            //'appointments' => $returnedAppointments
        ]);
    }
    /**
     * Validate and store a newly created
     * user and patient in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users|max:191',
            'password' => 'required|min:8',
            'mobile_number' => 'required',
            'address' => 'required',
            'insurance_company' => 'string|max:191|nullable',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->mobile_number = $request->input('mobile_number');
        $user->address = $request->input('address');
        $user->save();
        $user->roles()->attach(Role::where('name', 'patient')->first());
        $patient = new Patient();
        if($request->input('has_insurance')) {
            $patient->has_insurance = true;
            $patient->insurance_company = $request->input('insurance_company');
        } else $patient->has_insurance = false;

        $patient->user_id = $user->id;
        $patient->save();

        return redirect()->route('admin.patients.show', $user->id);
    }
    /**
     * Show the form for editing the specified patient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.patients.edit')->with([
            'user' => $user
        ]);
    }
    /**
     * Validate and update the patient in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|email|unique:users,email,'.$id.'|max:191',
            'mobile_number' => 'required',
            'address' => 'required',
            'insurance_company' => 'string|max:191|nullable',
        ]);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->mobile_number = $request->input('mobile_number');
        $user->address = $request->input('address');

        if($request->input('insurance_company') !== null) {
            $user->patient->has_insurance = true;
            $user->patient->insurance_company = $request->input('insurance_company');
        } else {
            $user->patient->has_insurance = false;
            $user->patient->insurance_company = null;
        }

        $user->save();
        $user->patient->save();
        return redirect()->route('admin.patients.show', $user->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.patients.index');
    }
}
