<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        return view('admin.service.index', [
            'services' => Service::all(), 
        ]);
    }

    public function create(){
        return view('admin.service.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'service_name'          => 'required|max:100',
            'service_description'   => 'required',
            'service_price'         => 'required',
        ]);

        Service::create($validatedData);

        return redirect('/admin/service')->with('success', 'New service has been added!');
    }

    public function edit(Service $service) {
        return view('admin.service.edit', [
            'service' => $service
        ]);
    }

    public function update(Request $request, Service $service) {
        $validatedData = $request->validate([
            'service_name'          => 'required|max:100',
            'service_description'   => 'required',
            'service_price'         => 'required',
        ]);

        Service::where('service_id', $service->service_id)->update($validatedData);
        
        return redirect('/admin/service')->with('success', 'Service has been updated!');
    }

    public function delete(Service $service) {

        Service::where('service_id', $service->service_id)->delete();
        return redirect('/admin/service')->with('success', 'Service has been deleted!');
    }
}
