@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/contact/style.css') !!}

<div class="row-step41">
<div class="container_12" id="content">
               
                    
        <div align="center">

                    <a href="#"><img src="{{ asset('img/index-logo.png')}}" width="170" height="158" alt="IguanaTrip" /></a> 
                </div>
	<h3>La red turistica más importante del Ecuador</h3>
	<div class="main">
		<div class="mcontent">
			<div class="box mr20">
				<h2>Contáctanos</h2>
				<p>Ecuador : (593)-2330-107<br/>
                                   Australia : (593)-2330-107<br/>
                                   España : (593)-2330-107
                                </p>
			</div>
			<div class="box mr20">
				<h2>Escríbenos</h2>
				<p>Tus dudas o comentarios.</p>
                                <p>Email: info@iguanatrip.com</p>
				
			</div>
			<div class="box2">
				<h2>Siguenos en</h2>
				
				<a target="_blank" href="https://www.facebook.com/IguanaTrip-1631331070450595/?fref=ts&ref=br_tf"><img src="{!! asset('img/f.png')!!}" alt=""/></a>				
			</div>			
		</div>
	</div>
        

</div>
</div>


@stop