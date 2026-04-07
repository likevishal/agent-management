<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function index(Request $request)
    {

        $query = Agent::query();

        $search = $request->search;

        $agents = Agent::when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        })->paginate(5);
        return view('agents.index', compact('agents', 'search'));
    }

    public function create()
    {
        return view('agents.create');
    }

    public static function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required'
        ]);

        Agent::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/agents')->with('success', 'Agent added successfully');
    }

    public function edit($id)
    {
        $agent = Agent::findOrFail($id);
        return view('agents.edit', compact('agent'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $agent = Agent::findOrFail($id);

        $agent->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect('/agents')->with('success', 'Agent updated successfully');
    }

    public function destroy($id)
    {
        $agent = Agent::findOrFail($id);
        $agent->delete();

        return redirect('/agents')->with('success', 'Agent deleted successfully');
    }
}
