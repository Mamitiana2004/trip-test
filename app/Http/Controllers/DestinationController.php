<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $destinations = Destination::all();
        return view("admin.destination.index", compact("destinations"));
    }

    public function getAll()
    {
        //
        $destinations = Destination::all();
        return view("destination.index", compact("destinations"));
    }

    public function voir($destination)
    {
        //
        return view('destination.show', compact('destination'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.destination.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|string|max:255|unique:destinations,name',
            'description' => 'required|string|max:1000',
            'price' => 'required',
            'duration_trip' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageName = Destination::uploadImage($request->file('image'));

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'duration_trip' => $request->duration_trip,
            'image' => $imageName,
        ];

        try {
            Destination::created($data);
            return redirect()->route('destination.index')->with('success', 'Destination créée avec succès.');
        } catch (\Exception $e) {
            Log::error("Erreur lors de la création de la destination : " . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de la destination.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        //
        return view('admin.destination.show', compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        //
        return view('admin.destination.show', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if (file_exists(public_path('images/' . $destination->image))) {
                unlink(public_path('images/' . $destination->image));
            }

            // Uploader la nouvelle image
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $destination->image = $imageName;
        }

        $destination->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
        ]);

        return redirect()->route('destination.index')->with('success', 'Destination mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        //
        if (file_exists(public_path('images/' . $destination->image))) {
            unlink(public_path('images/' . $destination->image));
        }

        $destination->delete();

        return redirect()->route('destination.index')->with('success', 'Destination supprimée avec succès !');
    }



    public function apiIndex()
    {
        return Destination::all();
    }

    public function apiShow($id)
    {
        return Destination::findOrFail($id);
    }

    public function apiShowName(Request $request)
    {
        $name = $request->name;
        $destination = Destination::where("name",$name)::all();
        return $destination;
    }

}
