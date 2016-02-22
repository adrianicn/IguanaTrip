@section('categorias')	
   @foreach ($catalogo as $cat)
                            <li class="product col-sms-6 col-sm-6 col-lg-4 box">
                                <a href="#" class="product-image">
                                    <div class="first-img">
                                        <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                                    </div>
                                
                                </a>
                               <div class="product-content">
                                    <h5 class="product-title"><a href="#">{!!$cat->nombre_servicio!!}</a></h5>
                                    <span class="product-price"><span class="currency-symbol">{{ trans('publico/labels.label59')}} $</span>{!!$cat->precio_desde!!}</span>
                                    <span data-toggle="tooltip" title="4" class="star-rating">
                                        <span data-stars="4"></span>
                                    </span>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn btn-add-to-cart"><i class="fa fa-star"></i>{!!$cat->satisfechos!!} Turistas satisfechos</a>
                                    
                                    
                                </div>
                            </li>
                            @endforeach                          
                                @endsection