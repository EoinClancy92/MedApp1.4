<?php
# @Date:   2019-12-09T14:37:25+00:00
# @Last modified time: 2019-12-09T15:35:52+00:00



namespace App\Http\Controllers\Admin;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Appointment;
use Illuminate\Http\Request;
class AppointmentController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('admin.appointments.index')->with([
            'appointments' => $appointments
        ]);
    }
    /**
     * Return all doctors and patients and
     * show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('admin.appointments.create')->with([
            'doctors' => $doctors,
            'patients' => $patients
        ]);
    }
    /**
     * Store a newly created appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'duration' => 'required|integer',
            'price' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
            'doctor_id' => 'required|integer',
            'patient_id' => 'required|integer'
        ]);
        $appointment = new Appointment();
        $appointment->duration = $request->input('duration');
        $appointment->price = $request->input('price');
        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->patient_id = $request->input('patient_id');

        $appointment->save();
        return view('admin.appointments.show')->with([
            'appointment' => $appointment
        ]);
    }
    /**
     * Display the specified appointment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('admin.appointments.show')->with([
            'appointment' => $appointment
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('admin.appointments.edit')->with([
            'appointment' => $appointment,
            'doctors' => $doctors,
            'patients' => $patients
        ]);
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
        $appointment = Appointment::findOrFail($id);
        $request->validate([
            'duration' => 'required|integer',
            'price' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
            'doctor_id' => 'required|integer',
            'patient_id' => 'required|integer'
        ]);
        $appointment->duration = $request->input('duration');
        $appointment->price = $request->input('price');
        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->patient_id = $request->input('patient_id');

        $appointment->save();
        return view('admin.appointments.show')->with([
            'appointment' => $appointment
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('admin.appointments.index');
    }
    /**
     * Cancel a Appointment
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id) {
        $appointment = Appointment::findOrFail($id);
        $appointment->cancelled = true;
        $appointment->save();

        return redirect()->route('admin.appointments.show', $appointment->id);
    }
}
