@extends('layouts.master')
@section('title')
 Home
@endsection
@section('main')
<h1>welcome to ur home</h1>

//passing data to a component using props
<x-users-table :users="$users"/>
@endsection


