@extends('layouts.admin')

@section('title', 'Dokumenti')

@section('content')

<form action="{{ route('admin.documents.store') }}" method="post" enctype="multipart/form-data">
    Izaberi dokument 
    <input type="file" name="fileToUpload">
    <input name="_token" value="{{ csrf_token() }}" type="hidden">
	<input type="submit" value="Upload Image" name="submit">
</form>

@stop
