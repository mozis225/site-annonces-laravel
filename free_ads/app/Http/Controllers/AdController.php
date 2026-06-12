<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function index(){
        $ads = Ad::latest()->get();
        return view('ads.index', compact('ads'));
    }

    public function create(){
        return view('ads.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
            'location' => 'required'
        ]);
        $photoPath = $request->file('photo')->store('ads', 'public');
        Ad::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'photo' => $photoPath,
            'price' => $request->price,
            'location' => $request->location,
            'user_id' => Auth::id()
        ]);

        return redirect('/')->with('success', 'announcement published');
    }

    public function show(Ad $ad){
        return view('ads.show', compact('ad'));
    }

    public function edit(Ad $ad){
        if($ad->user_id !== Auth::id()){
            return redirect('/')->with('error', 'unauthorized action');
        }
        return view('ads.edit', compact('ad'));
        
    }

    public function update(Request $request){
        if($ad->user_id !== Auth::id()){
            return redirect('/')->with('error', 'Action non autorisee.');
        }

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'location' => 'required'
        ]);

        if($request->hasFile('photo')){
            $photoPath = $request->file('photo')->store('ads','public');
            $ad->photo = $photoPath;
        }

        $ad->update([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location
        ]);
        return redirect('/ads/' . $ad->id)->with('success', 'Annonce modifie !');
    }

    public function destroy(Ad $ad){
        if($ad->user_id !== Auth::id()){
            return redirect('/')->with('error', 'unauthorized action');
        }
        $ad->delete();
        return redirect('/')->with('success', 'announcement deleted!');
    }

    
}
