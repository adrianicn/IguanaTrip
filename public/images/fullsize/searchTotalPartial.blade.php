@section('SearchTotalPartial')	
@if(count($despliegue)>0 || $despliegue!=null)
   @foreach ($despliegue as $cat)
                            <li class="product col-sms-6 col-sm-6 col-lg-4 box">
                                     <?php
                        $nombre = str_replace(' ', '-', $cat->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                                <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usr_serv!!}"  onclick="$('.container').LoadingOverlay('show');" class="product-image">
                                    <div class="first-img">
                                        <img src="{{ asset('public/images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                                    </div>
                                
                                </a>
                               <div class="product-content">
                                    <h5 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usr_serv!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_servicio!!}</a></h5>
                                    
                                    
                                    
                                    @if($cat->precio_desde==0)
                                    <span class="product-price"><span class="currency-symbol"></span>{{ trans('publico/labels.label128')}}</span>
                                    @else
                                    <span class="product-price"><span class="currency-symbol">{{ trans('publico/labels.label59')}} $</span>{!!$cat->precio_desde!!}</span>
                                    @endif
                                    
                                    <span data-toggle="tooltip" title="4" class="star-rating">
                                        <span data-stars="4"></span>
                                    </span>
                                </div>
                              
                                
                                <div class="product-action">
                                      
                                    @include('public_page.reusable.btnLikeReus', ['nombre_atraccion'=>$cat->nombre_servicio,'atraccion' =>$cat->id_usr_serv,'load'=>'btn-add-to-cart','cantidad'=>$cat->satisfechos])  
                                    
                                    
                                </div>
                                
                            </li>
                            @endforeach  
                            @endif
                            
            
                            
                  
                                @endsection