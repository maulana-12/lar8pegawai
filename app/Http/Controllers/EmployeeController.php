<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Notifications\NewEmployeeNotification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::all();
        // dd($data);
        return view('pegawai.data_pegawai', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.tambah_data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = Employee::create($validatedData);
        if ($request->hasFile('image')) {
            // $request->file('image')->move('img_pegawai/', $request->file('image')->getClientOriginalName());
            // $data->image = $request->file('image')->getClientOriginalName();
            // $data->save();

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $data->id . '_' . str_replace(' ', '_', $data->name) . '.' . $extension;

            $file->move('img_pegawai/', $fileName);

            $data->image = $fileName;
            $data->save();
        }
        // Kirim notifikasi
        notify()->success('Data pegawai ' . $request->name . ' berhasil ditambahkan');
        // dd($request);
        return redirect()->route('pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('pegawai.show_pegawai_by', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('pegawai.edit_pegawai', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|max:13',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $employee = Employee::findOrFail($id);
        $employee->name = $validatedData['name'];
        $employee->gender = $validatedData['gender'];
        $employee->phone_number = $validatedData['phone_number'];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($employee->image) {
                Storage::delete('img_pegawai/', $employee->image);
                // File::delete('img_pegawai/', $employee->image);
            }


            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $employee->id . '_' . str_replace(' ', '_', $employee->name) . '.' . $extension;

            $file->move('img_pegawai/', $fileName);

            $employee->image = $fileName;
            // $employee->save();
        }

        $employee->save();

        // Kirim notifikasi
        notify()->success('Data pegawai ' . $request->name . ' berhasil diupdate');
        // dd($request);
        return redirect()->route('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::findOrFail($id);
        // Hapus gambar lama jika ada
        if ($data->image) {
            // Storage::delete('public/img_pegawai/' . $data->image);
            File::delete('img_pegawai/', $data->image);
        }
        notify()->success('Data pegawai ' . $data->name . ' berhasil dihapus');
        $data->delete();

        return redirect()->route('pegawai');
    }
}
