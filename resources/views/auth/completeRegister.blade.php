@extends('front.masterPageWelcome')

@section('contentLogin')
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				@if(session()->has('error'))
					@include('partials/error', ['type' => 'danger', 'message' => session('error')])
				@endif	
				<hr>	
				<h2 class="intro-text text-center">{{ trans('front/login.connection') }}</h2>
				<hr>
				<p>{{ trans('front/login.text') }}</p>				
				
				{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form', 'id' => 'loginform']) !!}	
				
				<div class="row">

					{!! Form::control('text', 6, 'log', $errors, trans('front/login.log')) !!}
					{!! Form::control('password', 6, 'passwords', $errors, trans('front/login.password')) !!}
					{!! Form::check('memory', trans('front/login.remind')) !!}
					
                                        
                                         <input class="submitButton" type="button" value="submit" id='loginbtn'/>
					<div class="col-lg-12">					
						{!! link_to('password/email', trans('front/login.forget')) !!}
					</div>

				</div>
                            
				{!! Form::close() !!}

				<div class="text-center">
					<hr>
						<h2 class="intro-text text-center">{{ trans('front/login.register') }}</h2>
					<hr>	
					<p>{{ trans('front/login.register-info') }}</p>
					{!! link_to('auth/register', trans('front/login.registering'), ['class' => 'btn btn-default']) !!}
				</div>

			</div>
		</div>
	</div>
@stop


@section('contentRegistro')

<div class="testbox">
    <h1>Registration </h1>


    {!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form','id' => 'registro']) !!}	
    <hr>
    <div class="accounttype">
        <input type="radio" value="None" id="radioOne" name="account" checked/>
        <label for="radioOne" class="radio" chec>Personal</label>
        <input type="radio" value="None" id="radioTwo" name="account" />
        <label for="radioTwo" class="radio">Company</label>
    </div>
    <hr>
    <label id="icon" for="name"><i class="icon-envelope "></i></label>

    <input type="text" id="email" name="email" placeholder="Email">

    <label id="icon" for="name"><i class="icon-user"></i></label>

    <input type="text" id="email" name="username" placeholder="{{trans('front/register.pseudo')}}">

    <label id="icon" for="name"><i class="icon-shield"></i></label>

    <input type="password" id="password" name="password" placeholder="{{trans('front/register.password')}}">
    

    
    @if($errors->has())
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
    @endif

    <p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>

    <a href="#" class="button" onclick="$(this).closest('form').submit()">{!! (trans('front/form.send')) !!}</a>
</form>{!! Form::close() !!}
</div>





<div class="row">

    <br>

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

