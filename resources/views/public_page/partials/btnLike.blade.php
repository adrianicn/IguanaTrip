@section('likes')	

                                
                              
                                
                              <div class="product-action"  style=" margin-left: 40%;">
                                      
                                  
                                      
                                        <a onclick="AjaxContainerRetrunBurnURL('{!!asset('/likesSat')!!}/',{!!$atraccion!!},{!!$atraccion!!},'btn-compare'),GetLikes('{!!asset('/getLikesA')!!}/{!!$atraccion!!}')" class="btn btn-compare" title="+1">
                                            @if(isset($likes->satisfechos))
                                            <i class="fa fa-star"></i>{!!$likes->satisfechos!!} Turistas satisfechos</a>
                                            @else
                                            <i class="fa fa-star"></i>Be the first</a>
                                            @endif
                                    </div>
                                
                                       
                                       
                                       @endsection
                                    