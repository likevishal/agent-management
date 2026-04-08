@extends('layouts.admin')

@section('content')

<h2>Dashboard</h2>

<div class="row mt-4">

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Total Agents</h5>
            <h3>{{ \App\Models\Agent::count() }}</h3>
        </div>
    </div>

</div>

@endsection