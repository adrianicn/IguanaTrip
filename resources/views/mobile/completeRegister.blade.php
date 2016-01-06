@extends('mobile.logInMobile.masterMobile')

@section('content')

        

<header>
								<h2>Arcue ut vel commodo</h2>
								<p>Aliquam ut ex ut augue consectetur interdum endrerit imperdiet amet eleifend fringilla.</p>
							</header>
							<ul class="actions vertical">
								<li><a href="#" onclick="window.location.href = '{!!asset('/loginmobile')!!}'" class="button fit special">{{ trans('welcome/index.labelsignin') }}</a></li>
								<li><a href="#" onclick="window.location.href = '{!!asset('/registerMobile')!!}'" class="button fit">{{ trans('welcome/index.labelregister') }}</a></li>
							</ul>


        <div id="lang">


                <a href="{!! url('language') !!}"><img width="32" height="32" alt="en" src="{!! asset('img/' . (session('locale') == 'es' ? 'english' : 'espanol') . '-flag.png') !!}"></a>
            </div>
        
        
    </div><!-- /page -->
@stop