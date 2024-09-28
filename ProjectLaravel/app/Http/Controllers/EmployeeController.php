<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee-form');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $position = $request->input('position');
        $address = $request->input('address');
        $email = $request->input('email');
        $workData = $request->input('workData');

        $jsonData = $request->input('jsonData');
        $jsonArray = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withErrors(['jsonData' => 'Некорректный JSON']);
        }

        $street = $jsonArray['address']['street'] ?? null;
        $city = $jsonArray['address']['city'] ?? null;
        $lat = $jsonArray['address']['geo']['lat'] ?? null;
        $lng = $jsonArray['address']['geo']['lng'] ?? null;

        return view('employee-result', compact(
            'name',
            'surname',
            'position',
            'address',
            'email',
            'workData',
            'street',
            'city',
            'lat',
            'lng'
        ));
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        $path = $request->path();
        $url = $request->url();

        return response()->json([
            'message' => "Данные сотрудника с ID {$id} обновлены",
            'path' => $path,
            'url' => $url,
            'name' => $name,
            'email' => $email,
        ]);
    }

    public function getPath(Request $request)
    {
        $path = $request->path();
    }

    public function getUrl(Request $request)
    {
        $url = $request->url();
    }
}
