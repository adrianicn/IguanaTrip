<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

 <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
body {
	margin-top:0px;
}
.stepwizard-step p {
	margin-top: 10px;
}
.stepwizard-row {
	display: table-row;
}
.stepwizard {
	display: table;
	width: 50%;
	position: relative;
}
.stepwizard-step button[disabled] {
	opacity: 1 !important;
	filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
	top: 14px;
	bottom: 0;
	position: absolute;
	content: " ";
	width: 100%;
	height: 1px;
	background-color: #ccc;
	z-order: 0;
}
.stepwizard-step {
	display: table-cell;
	text-align: center;
	position: relative;
}
.btn-circle {
	width: 30px;
	height: 30px;
	text-align: center;
	padding: 6px 0;
	font-size: 12px;
	line-height: 1.428571429;
	border-radius: 15px;
}
</style>
	{!! HTML::style('css/masterPagesRegistro.css') !!}

    {!! HTML::script('js/jquery.js') !!}
    {!! HTML::script('js/bootstrap.min.js') !!}
</head>
    
    
<body>

{!!session('statut')!!}

	<header role="banner">
		<div id="banner-principal">
			<div id="logo"></div>
		</div>
		<div id="menu"></div>
	</header>


<div class="container">

      <div class="stepwizard col-md-offset-3">
      	<div class="stepwizard-row setup-panel">
      		<div class="stepwizard-step">
        		<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        		<p>{{ trans('registro/registrosteps.step1') }}</p>
      		</div>
      		<div class="stepwizard-step">
        		<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        		<p>{{ trans('registro/registrosteps.step2') }}</p>
      		</div>
      		<div class="stepwizard-step">
        		<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        		<p>{{ trans('registro/registrosteps.step3') }}</p>
      		</div>
	    	<div class="stepwizard-step">
        		<a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
        		<p>{{ trans('registro/registrosteps.step4') }}</p>
      		</div>
      	</div>
      </div>
  </div>
<<<<<<< HEAD
    
        <!-- Home Page -->
            <div id="logindiv">
                @yield('image')
            </div>
  {!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form', 'id'=>'registro'] ) !!}
  <div class="row setup-content" id="step-1">
    	<div class="col-xs-6 col-md-offset-3">
        	<div class="col-md-12">
            	<h3> {{ trans('registro/registrosteps.step1') }}</h3>
            	<div class="form-group">
            		<label class="control-label">Nombre</label>
            		<input  maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre"  />
          		</div>
              	<div class="form-group">
            		<label class="control-label">Apellido</label>
            		<input maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Apellido" />
          		</div>
              	<div class="form-group">
            		<label class="control-label">Direcci&oacute;n</label>
            		<textarea required="required" class="form-control" placeholder="Ingrese Direcci&oacute;n" ></textarea>
          		</div>
              	<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
            </div>
      	</div>
  </div>
  <div class="row setup-content" id="step-2">
  		<div class="col-xs-6 col-md-offset-3">
        	<div class="col-md-12">
            	<h3> {{ trans('registro/registrosteps.step2') }}</h3>
              	<div class="form-group">
            		<div id="servicios-col">
            		<img alt="Eventos" src="img/eventos.png">
            		<p>Eventos</p>
            		</div>
          		</div>
            	<div class="form-group">
            		<div id="servicios-col">
            		<img alt="Servicios" src="img/servicios.png">
            		<p>Servicios</p>
            		</div>
          		</div>
          		<input type="hidden" value="0" name="servicio_evento" id="servicio_evento">
            	<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
        	</div>
  		</div>
  </div>
  <div class="row setup-content" id="step-2">
  		<div class="col-xs-6 col-md-offset-3">
        	<div class="col-md-12">
            	<h3> {{ trans('registro/registrosteps.step3') }}</h3>
              	<div class="form-group">
            		<label class="control-label">Company Name</label>
            		<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
          		</div>
            	<div class="form-group">
            		<label class="control-label">Company Address</label>
            		<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
          		</div>
            	<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
        	</div>
  		</div>
  </div>
  <div class="row setup-content" id="step-3">
  		<div class="col-xs-6 col-md-offset-3">
        	<div class="col-md-12">
              <h3> {{ trans('registro/registrosteps.step4') }}</h3>
              <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
            </div>
      	</div>
  </div>
  {!! Form::close() !!}
  </div>
=======
  
  <section class="content show" id="registro-step1">
  	@yield('step1')
  </section>	

  <section class="content show" id="registro-step2">
  	@yield('step2')
  </section>	

  <section class="content show" id="registro-step3">
  	@yield('step3')
  </section>	

  <section class="content show" id="registro-step4">
  	@yield('step4')
  </section>	


</div>
>>>>>>> 21e3423f176afeefd89cef847eef7281853ea0fd


<script type="text/javascript">
  $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
		  allWells = $('.setup-content'),
		  allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
	  e.preventDefault();
	  var $target = $($(this).attr('href')),
			  $item = $(this);

	  if (!$item.hasClass('disabled')) {
		  navListItems.removeClass('btn-primary').addClass('btn-default');
		  $item.addClass('btn-primary');
		  allWells.hide();
		  $target.show();
		  $target.find('input:eq(0)').focus();
	  }
  });

  allNextBtn.click(function(){
	  var curStep = $(this).closest(".setup-content"),
		  curStepBtn = curStep.attr("id"),
		  nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
		  curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
		  isValid = true;

	  $(".form-group").removeClass("has-error");
	  for(var i=0; i<curInputs.length; i++){
		  if (!curInputs[i].validity.valid){
			  isValid = false;
			  $(curInputs[i]).closest(".form-group").addClass("has-error");
		  }
	  }

	  if (isValid)
		  nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
  });

  $( "#eventos-img" ).click(function() {$("#servicio_evento").val('1');alert($("#servicio_evento").val());});
  $( "#servicios-img" ).click(function() {$("#servicio_evento").val('2');alert($("#servicio_evento").val());});
  
    </script>
</body>
</html>
