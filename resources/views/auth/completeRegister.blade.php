@extends('front.masterPageWelcome')

@section('contentLogin')
	
		{{session('statut')}}
			
				@if(session()->has('error'))
					@include('partials/error', ['type' => 'danger', 'message' => session('error')])
				@endif	
				{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form', 'id' => 'loginform']) !!}	
				
                                <table cellspacing="0" role="presentation" id='tablelogin'>
                                    <tr>
                                        <td>
                                            <div id=usern''>
                                        <input type="text" class='logininput' id="email" name="log" placeholder="{{trans('front/login.log')}}">
                                        </div>
                                        </td>
                                        <td>
                                            <div id='inputpassword'>
                                        <input type="password" class='logininput' id="password" name="password" placeholder="{{trans('front/login.password')}}">
                                        </div>
                                        </td>
                                        <td>
                                            <div id='btnlogin'>
                                            <a href="#" class="buttonlogin" onclick="$(this).closest('form').submit()">{!! (trans('front/login.logbtn')) !!}</a>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id='remember'>
                                            {!! Form::check('memory', trans('front/login.remind'),array('class' => 'logininput')) !!}
                                            </div>
                                        </td>
                                        <td>
                                            
                                        <div class="col-lg-12" id ='forgotp'>	
                                            
						{!! link_to('password/email', trans('front/login.forget'),array('class' => 'logininput')) !!}
					</div>
    
                                        </td>
                                        
                                    </tr>
                                    
                                </table>

                                
                                {!! Form::close() !!}

				
	
@stop


@section('contentRegistro')
<div class="rowerror">

    <br>
    
    
    @if($errors->has())
    
    <div>
        
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    
    @endif


</div>

<div class="testbox">
    <h1>Registration </h1>

    

    {!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form','id' => 'registro']) !!}	
    <hr>
    <div class="accounttype">
        <input type="radio" value="None" id="radioOne" name="account" checked/>
        <label for="radioOne" class="radio" chec>{{trans('front/register.usertypepersona')}}</label>
        <input type="radio" value="None" id="radioTwo" name="account" />
        <label for="radioTwo" class="radio">{{trans('front/register.usertypecompany')}}</label>
    </div>
    <hr>
    <label id="icon" for="name"><i class="icon-envelope "></i></label>

    <input type="text" id="email" name="email" placeholder="Email">

    <label id="icon" for="name"><i class="icon-user"></i></label>

    <input type="text" id="email" name="username" placeholder="{{trans('front/register.pseudo')}}">

    <label id="icon" for="name"><i class="icon-shield"></i></label>

    <input type="password" id="password" name="password" placeholder="{{trans('front/register.password')}}">
    
    <label id="icon" for="name"><i class="icon-shield"></i></label>

    <input type="password" id="password" required="required" name="password_confirmation" placeholder="{{trans('front/register.confirm-password')}}">
    

    
    <p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>

    <a href="#" class="button" onclick="$(this).closest('form').submit()">{!! (trans('front/form.send')) !!}</a>
</form>{!! Form::close() !!}
</div>





<br>
<div class="row">	

</div>

<div class="row">	

</div>



</div>
</div>
</div>
@stop

@section('scripts')

<script>
    $(function () {
        $('.badge').popover();
    });
</script>

@stop

