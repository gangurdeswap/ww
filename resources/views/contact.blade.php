@extends('layouts.user')
@section('title', 'Welcome')
@section('content')
<div class="map">
    <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kuningan,+Jakarta+Capital+Region,+Indonesia&amp;aq=3&amp;oq=kuningan+&amp;sll=37.0625,-95.677068&amp;sspn=37.410045,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Kuningan&amp;t=m&amp;z=14&amp;ll=-6.238824,106.830177&amp;output=embed">
    </iframe>
</div>

<section class="contact-page">
    <div class="container">
        <div class="text-center">
            <h2>@lang('contact.drop_your_message')</h2>
            <p>@lang('contact.contact_us_short_description')</p>
        </div>
        <div class="row contact-wrap">
            <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="{{url('/send-contact')}}">
                {{csrf_field()}}
                <div class="col-sm-5 col-sm-offset-4">
                    <div class="form-group">
                        <label>@lang('contact.email') *</label>
                        <input type="text" name="email" id="email" class="form-control" required="required">
                        @if ($errors->has('email'))
                        <div class="text-danger">{{ $errors->login->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>@lang('contact.message') *</label>
                        <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        @if ($errors->has('message'))
                        <div class="text-danger">{{ $errors->login->first('message') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">@lang('contact.submit_message')</button>
                    </div>
                </div>
            </form>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->

@endsection
