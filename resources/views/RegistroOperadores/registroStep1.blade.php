[25/10/2015 15:51:04] adrian.dcn@hotmail.com: bajate del git
[25/10/2015 15:51:14] adrian.dcn@hotmail.com: elimina la base creada
[25/10/2015 15:51:19] adrian.dcn@hotmail.com: y vuélvele a crear
[25/10/2015 15:51:35] Renato Lopez: Ok
[25/10/2015 15:51:37] adrian.dcn@hotmail.com: correindo este comando
[25/10/2015 15:51:38] adrian.dcn@hotmail.com: php artisan migrate:refresh --seed
[25/10/2015 15:51:42] Renato Lopez: Ya lo hago
[25/10/2015 15:51:56] adrian.dcn@hotmail.com: d one
[26/10/2015 19:54:30] *** Llamada de adrian.dcn@hotmail.com ***
[26/10/2015 19:54:30] *** Llamada finalizada. Duración: 11:21 ***
[27/10/2015 15:00:59] Renato Lopez: estas por ahi
[27/10/2015 15:01:50] Renato Lopez: ejecute el comando
[27/10/2015 15:01:53] Renato Lopez: para la db
[27/10/2015 15:01:57] Renato Lopez: y cago todo
[27/10/2015 15:01:59] Renato Lopez: $ php artisan migrate:refresh --seed
Rolled back: 2015_10_05_075724_create_usuario_servicios_table
Rolled back: 2015_10_05_075711_create_usuario_operadores_table
Rolled back: 2015_10_05_075659_create_terminos_usuario_operadores_table
Rolled back: 2015_10_05_075650_create_terminos_condiciones_table
Rolled back: 2015_10_05_075640_create_servicio_establecimiento_usuarios_table
Rolled back: 2015_10_05_075631_create_regiones_table
Rolled back: 2015_10_05_075623_create_provincias_table
Rolled back: 2015_10_05_075614_create_proceso_registro_usuarios_table
Rolled back: 2015_10_05_075603_create_paises_table
Rolled back: 2015_10_05_075552_create_monedas_table
Rolled back: 2015_10_05_075539_create_itinerario_servicios_table
Rolled back: 2015_10_05_075525_create_foto_servicio_operadores_table
Rolled back: 2015_10_05_075410_create_dificultad_servicios_table
Rolled back: 2015_10_05_075348_create_ciudades_table
Rolled back: 2015_10_05_075330_create_catalogo_servicio_establecimientos_table
Rolled back: 2015_10_05_065252_create_base_servicios_table
Rolled back: 2015_10_05_064821_create_catalogo_lenguajes_table
Rolled back: 2015_10_05_075256_create_catalogo_servicios_table
Rolled back: 2014_10_26_222018_create_comments_table
Rolled back: 2014_10_26_172904_create_post_tag_table
Rolled back: 2014_10_26_172631_create_tags_table
Rolled back: 2014_10_26_172107_create_posts_table
Rolled back: 2014_10_24_205441_create_contact_table
Rolled back: 2014_10_21_110325_create_foreign_keys
Rolled back: 2014_10_21_105844_create_roles_table
Rolled back: 2014_10_12_100000_create_password_resets_table
Rolled back: 2014_10_12_000000_create_users_table



  [Illuminate\Database\QueryException]
  SQLSTATE[42000]: Syntax error or access violation: 1072 Key column 'role_id' doesn't exist in table (SQL: alter table `users` add constraint users_role_id_foreign foreign key (`role_id`)
  references `roles` (`id`) on delete restrict on update restrict)






  [PDOException]
  SQLSTATE[42000]: Syntax error or access violation: 1072 Key column 'role_id' doesn't exist in table
[27/10/2015 21:36:22] *** Llamada de adrian.dcn@hotmail.com ***
[27/10/2015 21:36:22] *** Llamada finalizada. Duración: 10:10 ***
[29/10/2015 14:36:28] adrian.dcn@hotmail.com: ya tengo casi listo lo de las imágenes con ajax
[29/10/2015 14:37:58] Renato Lopez: chevere mañana unimos todo tonces
[29/10/2015 14:38:11] adrian.dcn@hotmail.com: d one
[31/10/2015 19:04:20] adrian.dcn@hotmail.com: composer require jessegers/agent
[31/10/2015 19:19:26] adrian.dcn@hotmail.com: composer require jenssegers/agent
[31/10/2015 19:22:49] adrian.dcn@hotmail.com: 'Jenssegers\Agent\AgentServiceProvider',
[31/10/2015 19:24:12] Renato Lopez:   [Symfony\Component\Debug\Exception\FatalErrorException]
  Class 'Jenssegers\Agent\AgentServiceProvider' not found
[31/10/2015 19:27:52] ***  ***
[31/10/2015 19:28:10] ***  ***
[31/10/2015 23:09:00] Renato Lopez: estas ahi???
[31/10/2015 23:19:42] adrian.dcn@hotmail.com: Simon
[31/10/2015 23:19:54] Renato Lopez: ayuda
[31/10/2015 23:19:59] Renato Lopez: en el formulario
[31/10/2015 23:20:01] Renato Lopez: para enviar
[31/10/2015 23:20:03] Renato Lopez: los datos
[31/10/2015 23:20:08] Renato Lopez: a donde le apunto
[31/10/2015 23:25:31] adrian.dcn@hotmail.com: No cacho apuntas que
[31/10/2015 23:25:48] Renato Lopez: Form::open(['url' => 'servicios/operador'
[31/10/2015 23:26:32] Renato Lopez: esa url debo colocarlo en el routes.php
[31/10/2015 23:26:41] Renato Lopez: en los metodos post???
[31/10/2015 23:26:49] adrian.dcn@hotmail.com: Simon
[31/10/2015 23:27:05] Renato Lopez: pero como no encuentro tu ejemplo
[31/10/2015 23:27:15] adrian.dcn@hotmail.com: Y el metodo del controller
[31/10/2015 23:27:24] adrian.dcn@hotmail.com: Debes llamarle post igual
[31/10/2015 23:27:44] adrian.dcn@hotmail.com: Pon en el cmd
[31/10/2015 23:27:56] adrian.dcn@hotmail.com: Php artisan route:list
[31/10/2015 23:28:11] Renato Lopez: Route::post('servicios/operador', 'ServicioController@postRegister');
[31/10/2015 23:28:13] adrian.dcn@hotmail.com: Y ahi va a aparecer el route q dices
[31/10/2015 23:28:30] adrian.dcn@hotmail.com: Simon
[31/10/2015 23:30:25] Renato Lopez: debe llamarse postRegister o le puedo colocar postOperadores
[31/10/2015 23:30:38] adrian.dcn@hotmail.com: como sea
[31/10/2015 23:30:43] adrian.dcn@hotmail.com: pero debe tener el post
[31/10/2015 23:41:06] Renato Lopez: porq usas este use App\Repositories\UserRepository;
[31/10/2015 23:41:25] Renato Lopez: no veo q le hagas referencia al modelo de usuarios en tu
[31/10/2015 23:41:29] Renato Lopez: registro de usuarios
[31/10/2015 23:41:37] adrian.dcn@hotmail.com: en donde loco
[31/10/2015 23:41:38] Renato Lopez: AuthController
[31/10/2015 23:42:32] adrian.dcn@hotmail.com: es una clase intermedia
[31/10/2015 23:42:43] adrian.dcn@hotmail.com: podrias poner lo mismo en el controller
[31/10/2015 23:43:02] adrian.dcn@hotmail.com: pero lo único q se hace es poner la lógica en otra clase
[31/10/2015 23:43:09] Renato Lopez: pero ese hace referencia la usuario
[31/10/2015 23:43:16] Renato Lopez: yo necesito q sea para operadores
[31/10/2015 23:43:33] Renato Lopez: tu hiciste eso??
[31/10/2015 23:43:42] Renato Lopez: o ya es del mismo framework
[31/10/2015 23:43:51] adrian.dcn@hotmail.com: es del framework
[31/10/2015 23:44:29] Renato Lopez: pero es necesario que lo use???
[31/10/2015 23:44:41] adrian.dcn@hotmail.com: nop
[31/10/2015 23:44:44] adrian.dcn@hotmail.com: eso t digo
[31/10/2015 23:44:48] adrian.dcn@hotmail.com: todos esos metodos
[31/10/2015 23:44:54] adrian.dcn@hotmail.com: los puedes implementar en el controller
[31/10/2015 23:45:14] adrian.dcn@hotmail.com: o puedes crear otra clase
[31/10/2015 23:45:22] adrian.dcn@hotmail.com: da lo mismo
[31/10/2015 23:45:27] Renato Lopez: function postOperadores(Request $request, UserRepository $operador_gestion)
[31/10/2015 23:45:57] adrian.dcn@hotmail.com: no puedes usar el userRepository
[31/10/2015 23:46:05] adrian.dcn@hotmail.com: xq ese apunta a otra tabla
[31/10/2015 23:46:15] adrian.dcn@hotmail.com: debes crear otra clase
[31/10/2015 23:46:18] Renato Lopez: si ya me di cuenta ya le vi
[31/10/2015 23:47:02] Renato Lopez: ya sabes como hacer para colocar los controladores en otra carpeta
[31/10/2015 23:47:12] Renato Lopez: y asi destribuir mejor los archivos
[31/10/2015 23:50:28] adrian.dcn@hotmail.com: php artisan make:controller App/Modules/Admin/Http/ControllersAdminController
[31/10/2015 23:50:35] adrian.dcn@hotmail.com: pruebale asi
[31/10/2015 23:50:39] adrian.dcn@hotmail.com: sino ya nada
[31/10/2015 23:51:11] Renato Lopez: ok otra cosa
[31/10/2015 23:51:15] Renato Lopez: use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\RoleRequest;
[31/10/2015 23:51:24] Renato Lopez: hay que crear todos estos
[31/10/2015 23:51:55] adrian.dcn@hotmail.com: xq?
[31/10/2015 23:52:15] Renato Lopez: estoy viendo tu usercontroler
[31/10/2015 23:52:29] Renato Lopez: y veo que tienes todas esas clases incluidas
[31/10/2015 23:52:36] Renato Lopez: como voy hacer el de operadores
[31/10/2015 23:52:45] Renato Lopez: yo tambien deberia crear esas clase
[31/10/2015 23:52:47] Renato Lopez: ???
[31/10/2015 23:53:16] adrian.dcn@hotmail.com: esas clases ya están creadas
[31/10/2015 23:53:31] adrian.dcn@hotmail.com: hmmm esq toca analizar q métodos necesitas
[31/10/2015 23:53:57] adrian.dcn@hotmail.com: en este caso solo necesitamos un guardar()
[31/10/2015 23:54:06] adrian.dcn@hotmail.com: por el momento
[31/10/2015 23:54:12] Renato Lopez: de ley
[31/10/2015 23:54:18] Renato Lopez: ya veo
[31/10/2015 23:54:20] Renato Lopez: y te aviso
[31/10/2015 23:56:20] adrian.dcn@hotmail.com: ok
[13:46:56] adrian.dcn@hotmail.com: <input type="hidden" name="_token" value="{{ csrf_token() }}">
[14:30:12] Renato Lopez: http://laravel.io/forum/11-14-2014-laravel-5-cant-post?page=1
[14:40:01] Renato Lopez: @extends('front.masterPageServicios')

@section('step1')

 {!! Form::open(['url' => 'servicios/operador', 'method' => 'post', 'role' => 'form', 'id'=>'registro_step1'] ) !!}

 <div class="row setup-content" id="step-1">
  <div class="col-xs-6 col-md-offset-3">
   <div class="col-md-12">
    <h3> {{ trans('registro/registrosteps.step1') }}</h3>
    <div class="form-group">
     <label class="control-label">Compania Nombre</label>
     <input id="nombre_empresa_operador"  maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre Compania"  />
    </div>
    <div class="form-group">
     <label class="control-label">Contacto Nombre</label>
     <input id="nombre_contacto_operador_1" maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre contacto" />
    </div>
    <div class="form-group">
     <label class="control-label">Telefono</label>
     <input id="telf_contacto_operador_1" maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese telefono contacto" />
    </div>
<!--      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"  onclick="$(this).closest('form').submit()">Siguiente</button>-->
    <a href="#" class="button" onclick="$(this).closest('form').submit()">siguiente</a>
   </div>
  </div>
 </div>

 {!! Form::close() !!}


@stop

@section('scripts')
<script type="text/javascript">
    $('.error').html('');
    

                $("#registro_step1").submit(function (event) {

                    $('#container').loadingOverlay();

                    event.preventDefault();
                    var $form = $(this),
                            data = $form.serialize(),
                            url = $form.attr("action");
                    var posting = $.post(url, {formData: data});
                    posting.done(function (data) {
                        if (data.fail) {
                            var errorString = '<ul>';
                            $.each(data.errors, function (key, value) {
                                errorString += '<li>' + value + '</li>';
                            });
                            errorString += '</ul>';
                            $('#target').loadingOverlay('remove');
                            //$('#error').html(errorString);
                             $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'"+errorString+"'])");

                        }
                        if (data.success) {
                            $('#container').loadingOverlay('remove');
                            $('.register').fadeOut(); //hiding Reg form
                            var successContent = '' + data.message + '';
       $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'"+successContent+"'])");
                        } //success
                    }); //done
                });
    $(function () {
        $('.badge').popover();
    });

              
</script>
    
    
@stop
[15:19:58] Renato Lopez:   onclick="$(this).closest('form').submit()"
[15:27:04] adrian.dcn@hotmail.com: @extends('front.masterPageServicios')

@section('step1')




<div class="row">






    {!! Form::open(['url' => route('upload-postservicios'),  'id'=>'registro_step1']) !!}
    <div class="row setup-content" id="step-1">
        <div class="col-xs-6 col-md-offset-3">
            <div class="col-md-12">
                <h3> {{ trans('registro/registrosteps.step1') }}</h3>
                <div class="form-group">


                    {!!Form::label('company', 'Compania Nombre', array('class'=>'control-label'))!!}
                    {!!Form::text('nombre_empresa_operador', null, array('class'=>'form-control','placeholder'=>'Ingrese Nombre Compania'))!!}

                </div>
                <div class="form-group">
                    <label class="control-label">Contacto Nombre</label>
                    <input id="nombre_contacto_operador_1" maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre contacto" />
                    
                    
                </div>
                <div class="form-group">
                    <label class="control-label">Telefono</label>
                    <input id="telf_contacto_operador_1" maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese telefono contacto" />
                </div>
                <!--      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"  onclick="$(this).closest('form').submit()">Siguiente</button>-->
                <a href="#" class="button" onclick="$(this).closest('form').submit()">siguiente</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}


</div>

@section('scripts')

<!-- End Dropzone Preview Template -->
{!! HTML::script('/js/registro/registroajax.js') !!}
@stop

@stop