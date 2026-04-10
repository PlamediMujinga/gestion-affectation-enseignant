@extends('layouts.proved')

@section('content')

<h4>Notifications</h4>

<div class="table-container">

<table class="table">
    <tr>
        <th>Date</th>
        <th>Message</th>
        <th>Action</th>
    </tr>

    <tr>
        <td>20/10</td>
        <td>Affectation validée</td>
        <td><button class="btn btn-danger btn-sm">Supprimer</button></td>
    </tr>

</table>

</div>

@endsection