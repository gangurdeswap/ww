@extends('layouts.user')
@section('title', 'Welcome')
@section('content')

<div class="about">
    <div class="container">
        <div class="text-center">
            <h2>{{!empty($cms_details->cmsLang)? ucwords($cms_details->cmsLang->page_title):''}}</h2>
            <div class="col-md-10 col-md-offset-1">
                @if(!empty($cms_details->cmsLang))
                <p>{!! $cms_details->cmsLang->page_content !!}</p>
                @endif
            </div>

        </div>
    </div>
</div>
<hr>
@endsection
@section('js_content')
<script src="{{asset('/js/wow.min.js')}}"></script>
<script>
wow = new WOW(
        {

        })
        .init();
</script>
@endsection