@extends('layouts.user')
@section('title', 'Welcome')
@section('content')

<!-- require js for slider -->
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/bootstrap_3.3.7.min.js')}}"></script>

<div class="slider">
    <div id="about-slider">
        <div id="carousel-slider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators visible-xs">
                @if(count($slider_data))
                @foreach($slider_data as $key=>$row)
                <li data-target="#carousel-slider" data-slide-to="{{$key}}" @if($key==0) class="active" @endif ></li>
                @endforeach
                @else

                <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-slider" data-slide-to="1"></li>
                <li data-target="#carousel-slider" data-slide-to="2"></li>
                @endif
            </ol>

            <div class="carousel-inner">

                @if(count($slider_data))
                @foreach($slider_data as $key=>$row)
                <div class="item @if($key==0) active @endif">
                    @php
                    $ext = pathinfo($row->image_name, PATHINFO_EXTENSION);
                    $file_name_val = rtrim($row->image_name, "." . $ext);
                    @endphp
                    @if(!empty($row->image_name))
                    <img src="{{asset('/slider_image/'.$file_name_val . '_1500_800.' . $ext)}}" class="img-responsive" alt="{{$row->image_title}}">
                    @endif
                    <div class="carousel-caption">
                        @if(!empty($row->image_title))
                        <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                            <h2><span>{{$row->image_title}}</span></h2>
                        </div>
                        @endif
                        @if(!empty($row->image_description))
                        <div class="col-md-10 col-md-offset-1">
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                                <p>{{$row->image_description}}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
                @else
                <div class="item active">
                    <img src="{{asset('/img/theme/2.jpg')}}" class="img-responsive" alt="">
                    <div class="carousel-caption">
                        <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                            <h2><span>Clean & Modern Design Template</span></h2>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="item">
                    <img src="{{asset('/img/theme/2.jpg')}}" class="img-responsive" alt="">
                    <div class="carousel-caption">
                        <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">
                            <h2>Fully Responsive</h2>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
                            </div>
                        </div>
                        <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">
                            <form class="form-inline">
                                <div class="form-group">
                                    <button type="livedemo" name="purchase" class="btn btn-primary btn-lg" required="required">Live Demo</button>
                                </div>
                                <div class="form-group">
                                    <button type="getnow" name="subscribe" class="btn btn-primary btn-lg" required="required">Get Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('/img/theme/2.jpg')}}" class="img-responsive" alt="">
                    <div class="carousel-caption">
                        <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                            <h2>Modern Design</h2>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
                            </div>
                        </div>
                        <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
                            <form class="form-inline">
                                <div class="form-group">
                                    <button type="livedemo" name="purchase" class="btn btn-primary btn-lg" required="required">Live Demo</button>
                                </div>
                                <div class="form-group">
                                    <button type="getnow" name="subscribe" class="btn btn-primary btn-lg" required="required">Get Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>

            <a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div> <!--/#carousel-slider-->
    </div><!--/#about-slider-->
</div><!--/#slider-->

<div class="about">
    <div class="container">
        <div class="text-center">
            <h2>Short description title here </h2>
            <div class="col-md-10 col-md-offset-1">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat quod voluptate consequuntur ad quasi,
                    dolores obcaecati ex aliquid, dolor provident accusamus omnis dolorum ipsam. Voluptatem ipsum expedita, corporis facilis laborum asperiores nostrum!
                    Amet porro numquam ratione temporibus quia dolorem sint lorem voluptates quasi mollitia.</p>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="btn-gamp"><a href="#">Learn More</a></div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="gamp-btn"><a href="#">download</a></div>
            </div>

        </div>
    </div>
</div>
<hr>

<div class="services">
    <div class="container">
        <div class="text-center">
            <h2>Our Services</h2>
        </div>
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <i class="fa fa-heart-o"></i>
            <h3>Fully Responsive</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nam numquam voluptates cumque inventore, quibusdam corporis consequatur amet.</p>
        </div>
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <i class="fa fa-cloud"></i>
            <h3>Retina Ready</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nam numquam voluptates cumque inventore, quibusdam corporis consequatur amet.</p>
        </div>
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
            <i class="fa fa-book"></i>
            <h3>Fresh and Clean</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nam numquam voluptates cumque inventore, quibusdam corporis consequatur amet.</p>
        </div>
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
            <i class="fa fa-gear"></i>
            <h3>Easy to Customize</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nam numquam voluptates cumque inventore, quibusdam corporis consequatur amet.</p>
        </div>
    </div>
</div>

<section class="action">
    <div class="container">
        <div class="left-text hidden-xs">
            <h4>Amet porro numquam ratione</h4>
            <p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi ut explicabo magni sapiente.</em><br><br>Inventore at quia, vel in repellendus, cumque dolorem autem ad quidem mollitia porro blanditiis atque rerum debitis eveniet nostrum aliquam. Sint aperiam expedita sapiente amet officia quis perspiciatis adipisci, iure dolorem esse exercitationem!</p>
        </div>
        <div class="right-image hidden-xs"></div>
    </div>
</section>

<div class="gallery">
    <div class="text-center">
        <h2>Gallery</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat quod voluptate consequuntur ad quasi, dolores obcaecati ex aliquid, dolor provident </p>
    </div>
    <div class="container">
        <div class="col-md-4">
            <figure class="effect-marley">
                <img src="{{asset('/img/theme/8.jpg')}}" alt="" class="img-responsive"/>
                <figcaption>
                    <h4>sweet marley</h4>
                    <p>Marley tried to convince her but she was not interested.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure class="effect-marley">
                <img src="{{asset('/img/theme/9.jpg')}}" alt="" class="img-responsive"/>
                <figcaption>
                    <h4>sweet marley</h4>
                    <p>Marley tried to convince her but she was not interested.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure class="effect-marley">
                <img src="{{asset('/img/theme/10.jpg')}}" alt="" class="img-responsive"/>
                <figcaption>
                    <h4>sweet marley</h4>
                    <p>Marley tried to convince her but she was not interested.</p>
                </figcaption>
            </figure>
        </div>
    </div>

    <div class="container">
        <div class="col-md-4">
            <figure class="effect-marley">
                <img src="{{asset('/img/theme/11.jpg')}}" alt="" class="img-responsive"/>
                <figcaption>
                    <h4>sweet marley</h4>
                    <p>Marley tried to convince her but she was not interested.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure class="effect-marley">
                <img src="{{asset('/img/theme/12.jpg')}}" alt="" class="img-responsive"/>
                <figcaption>
                    <h4>sweet marley</h4>
                    <p>Marley tried to convince her but she was not interested.</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-4">
            <figure class="effect-marley">
                <img src="{{asset('/img/theme/13.jpg')}}" alt="" class="img-responsive"/>
                <figcaption>
                    <h4>sweet marley</h4>
                    <p>Marley tried to convince her but she was not interested.</p>
                </figcaption>
            </figure>
        </div>
    </div>
</div>
@endsection
@section('js_content')
<script src="{{asset('/js/wow.min.js')}}"></script>
<script>
wow = new WOW(
        {

        })
        .init();
</script>
@endsection