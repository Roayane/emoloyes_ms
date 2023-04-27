<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes= Employer::all();

        return view('employers.index')->with([
            'employes' => $employes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('employers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'fullname' => 'required',
            'registration_number' => 'required|unique:employers',
            'depart' => 'required',
            'hire_date' => 'required',
            'city' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);
        $data = $request->except(['_token']);
        Employer::create($data);
        return redirect()->route("employes.index")->with([
            "success" => "Employe added successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employe = Employer::where('registration_number', $id)->first();
        return view("employers.show")->with([
            "employe" => $employe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employe = Employer::where('registration_number', $id)->first();
        return view("employers.edit")->with([
            "employe" => $employe
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employe = Employer::where('registration_number', $id)->first();

        $data = $request->except(['_token', '_method']);
        $employe->update($data);
        return redirect()->route("employes.index")->with([
            "success" => "Employe updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employe = Employer::where('registration_number', $id)->first();
        $employe->delete();
        return redirect()->route("employes.index")->with([
            "success" => "Employe deleted successfully"
        ]);
    }


    public function getWorkCertificate($id)
    {
        $employe = Employer::where('registration_number', $id)->first();
        return view("employers.certificate")->with([
            "employe" => $employe
        ]);
    }

    public function vacationRequest($id)
    {
        $employe = Employer::where('registration_number', $id)->first();
        return view("employers.vacation")->with([
            "employe" => $employe
        ]);
    }
}
