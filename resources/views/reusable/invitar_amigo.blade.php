
<div class="rowerrorM">
</div>
<div id="testboxForm" class="testboxForm">
    <h1>Invita a un amigo </h1>
    <hr>
    {!! Form::open(['url' => route('postinvitaamigo'),  'id'=>'invitacion']) !!}
    
       <div class="form-group-step2-popup">
            {!!Form::label('nombre_1', 'De', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('invitacion_de',session('user_email'), array('class'=>'inputtext-step2-popup','placeholder'=>'Invitación de'))!!}
       </div>
    <div class="form-group-step2-popup">
            {!!Form::label('nombre_1', 'Para', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('invitacion_para',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Invitación para'))!!}
       </div>
    
       <div class="form-group-step2-popup">
            {!!Form::label('detalle_1', 'Mensaje', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::textarea('mensaje','Hola, soy '. session('user_name').' quisiera invitarte a esta nueva iniciativa turistica, se que te ayudará para que des a conocer tus servicios turísticos a nivel mundial', array('class'=>'inputtextarea-step2-popup-1','placeholder'=>'Mensaje que deseas incluir para tus amigos'))!!}

       </div>
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" id="btnsubm" onclick="AjaxContainerRegistroWithLoad('invitacion','simplemodal-wrap')" href="#">Enviar</a>
            </div>              
        </div>
    
    <div id="logo_">
                <div id="logo-imagen">

                    <a href="eng"><img src="{{ asset('img/index-logo.png')}}" width="170" height="158" alt="IguanaTrip" /></a> 
                  
                </div>

            </div>

{!! Form::close() !!}
</div>
