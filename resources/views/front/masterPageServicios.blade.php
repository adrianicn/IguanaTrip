<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <title>Registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

        {!! HTML::style('css/demo.css') !!} 
<<<<<<< HEAD
    
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


<div class="container" id="target">
<!--  
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
	    	<div class="stepwizard-step">
        		<a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
        		<p>{{ trans('registro/registrosteps.step5') }}</p>
      		</div>
      	</div>
      </div>
  -->
    
        <!-- Home Page -->
            <div id="logindiv">
                @yield('image')
            </div>
  
            
    
  <section class="content show" id="registro-step1">
  	@yield('step1')
  </section>	
<!--
  <section class="content show" id="registro-step2">
  	@yield('step2')
  </section>	

  <section class="content show" id="registro-step3">
  	@yield('step3')
  </section>	

  <section class="content show" id="registro-step4">
  	@yield('step4')
  </section>	
-->
</div>
</div>
    
            {!!HTML::script('js/loading-overlay.min.js') !!}

 	@yield('scripts')
 

<script type="text/javascript">
<!--
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

-->  
=======

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


        <div class="container" id="target">

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
                    <div class="stepwizard-step">
                        <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                        <p>{{ trans('registro/registrosteps.step5') }}</p>
                    </div>
                </div>
            </div>





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
    </div>

    {!!HTML::script('js/loading-overlay.min.js') !!}
    {!!HTML::script('js/Compartido.js') !!}

    @yield('scripts')


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

            allNextBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                        curStepBtn = curStep.attr("id"),
                        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                        curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
                        isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });

        $("#eventos-img").click(function () {
            $("#servicio_evento").val('1');
            alert($("#servicio_evento").val());
        });
        $("#servicios-img").click(function () {
            $("#servicio_evento").val('2');
            alert($("#servicio_evento").val());
        });

>>>>>>> 2b2485fd2e840ba6cc54134b4a06e834f9d53884
    </script>
</body>
</html>
