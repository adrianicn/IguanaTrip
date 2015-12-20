@extends('mobile.logInMobile.masterMobile')

@section('content')

        
        <div role="main" class="ui-content">
            <h2 class="mc-text-center">{{ trans('welcome/index.labelWelcome') }}!</h2>
            <p class="mc-top-margin-1-5"><b>{{ trans('welcome/index.labelusermobile') }}</b></p>
            <a href="#" onclick="window.location.href = '{!!asset('/loginmobile')!!}'" class="ui-btn ui-btn-b ui-corner-all">{{ trans('welcome/index.labelsignin') }}</a>
            <p class="mc-top-margin-1-5"><b>{{ trans('welcome/index.labelnoaccountmobile') }}</b></p>
            <a href="#" onclick="window.location.href = '{!!asset('/registerMobile')!!}'" class="ui-btn ui-btn-b ui-corner-all">{{ trans('welcome/index.labelregister') }}</a>
            <p></p>
        </div><!-- /content -->
        <div id="lang">


                <a href="{!! url('language') !!}"><img width="32" height="32" alt="en" src="{!! asset('img/' . (session('locale') == 'es' ? 'english' : 'espanol') . '-flag.png') !!}"></a>
            </div>
        
        
    </div><!-- /page -->
@stop