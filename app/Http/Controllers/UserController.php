<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crud;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportReg;
use App\Imports\ImportReg;

class UserController extends Controller
{
    public function index()
    {
        $data = Crud::orderBy('id', 'desc')->get();

        return view('index', ['data' => $data]);

    }
    public function add()
    {
        return view('add');
    }
    public function insert(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'state' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];

        $messages = [
            'name.required' => 'Name is required.',
            'phone_no.required' => 'Phone No is required.',
            'email.required' => 'Email is required.',
            'state.required' => 'State is required.',
            'address.required' => 'Address is required.',
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        crud::create($request->all());

        return redirect('/')->with('success', 'data inserted successfully');
    }

    public function view($id)
    {

        $data = crud::findOrFail($id);

        return view('view', ['data' => $data]);
    }
    public function edit($id)
    {

        $data = crud::findOrFail($id);

        return view('edit', ['data' => $data]);
    }

    public function update($id, Request $request)
    {
        $data = crud::findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'state' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];

        $messages = [
            'name.required' => 'Name is required.',
            'phone_no.required' => 'Phone No is required.',
            'email.required' => 'Email is required.',
            'state.required' => 'State is required.',
            'address.required' => 'Address is required.',
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data->name = $request->name;
        $data->phone_no = $request->phone_no;
        $data->email = $request->email;
        $data->state = $request->state;
        $data->address = $request->address;

        $data->save();
        return redirect('/')->with('success', 'data updated successfully');
    }

    public function delete($id)
    {
        $data = crud::findOrFail($id);
        $data->delete();
        return redirect('/')->with('success', 'data deleted successfully');

    }
    public function download_user()
    {

        $file_name = 'user_' . date('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new ExportReg, $file_name);
    }

    public function import(Request $request)
    {
        $file = $request->file('importFile');


        $rules = [
            'importFile' => 'required|mimes:xlsx,xls',
        ];

        $messages = [
            'importFile.required' => 'Please select a file.',
            'importFile.mimes' => 'Please upload an Excel file (xlsx or xls).',

        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        Excel::import(new ImportReg, $file);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}
