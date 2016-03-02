@section('review')

                <link rel="stylesheet" href="{{ asset('public_components/css/animate.min.css')}}">


                                                @foreach ($reviews as $rev)
                                                
                                                <li class="comment">
                                                    <div class="author-img">
                                                        @if($rev->tipo_review==1)
                                                        <span><img src="{{ asset('img/positivo.jpg')}}" alt=""></span>
                                                        @else
                                                        <span><img src="{{ asset('img/negativo.jpg')}}" alt=""></span>
                                                        @endif
                                                    </div>
                                                    <div class="comment-content">
                                                        @if($rev->nombre_reviewer!="")
                                                        
                                                        <h5 class="comment-author-name"><a href="#">{!!$rev->nombre_reviewer!!}</a></h5>
                                                        @elseif($rev->email_reviewer)
                                                        <h5 class="comment-author-name"><a href="#">{!!$rev->email_reviewer!!}</a></h5>
                                                        @else
                                                        <h5 class="comment-author-name"><a href="#">{{ trans('publico/labels.label60')}}</a></h5>
                                                        @endif
                                                        <span data-toggle="tooltip" title="{!!$rev->calificacion!!}" class="star-rating">
                                                            <span data-stars="{!!$rev->calificacion!!}"></span>
                                                        </span>
                                                        <?php $date = date_create($rev->created_at);
                                    
                                                             ?>
                                                        <span class="comment-date">{!!date_format($date, 'j F ')!!}</span>
                                                        <div class="description">
                                                            <p>{!!$rev->text_review!!}</p>
                                                        </div>
                                                    </div>
                                                
                                                </li>
                                                @endforeach

                                         
 <script>
                                        

$('.btn-write-review').on('click', function() {
  $('.var_comment').css( "display","none");
});

 $( ".btn-back-reviews" ).click(function() {
    $('.var_comment').css( "display","block" );

});


                                            

    </script>
    
    




    @endsection