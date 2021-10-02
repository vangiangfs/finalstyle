@extends('cms.dashboard')

@section('content')
    {!!App\Helpers\Helper::menus_cms($data)!!}
@endsection