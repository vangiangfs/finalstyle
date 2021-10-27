@extends('cms.dashboard')

@section('content')
    {!!App\Helpers\Helper::list($listfield, $data)!!}
@endsection