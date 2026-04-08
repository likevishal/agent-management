<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index(Request $request)
    {

        $query = Agent::query();

        $search = $request->search;

        $agents = Agent::where('admin_id', Auth::guard('admin')->id())
                    ->paginate(5);
        return view('admin.agents.index', compact('agents'));
    }

    public function create()
    {
        return view('admin.agents.create');
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
            'admin_id' => Auth::guard('admin')->id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password)
        ]);

        return redirect('admin/agents')->with('success', 'Agent added successfully');
    }

    public function edit($id)
    {
        $agent = Agent::where('admin_id',Auth::guard('admin')->id())->findOrFail($id);        
        return view('admin.agents.edit', compact('agent'));
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

        return redirect('admin/agents')->with('success', 'Agent updated successfully');
    }

    public function destroy($id)
    {
        $agent = Agent::where('admin_id',Auth::guard('admin')->id())->findOrFail($id);
        $agent->delete();

        return redirect('/agents')->with('success', 'Agent deleted successfully');
    }
}
