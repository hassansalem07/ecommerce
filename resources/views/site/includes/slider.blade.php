<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        @foreach ($sliders as $slider)
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        @endforeach
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-commerce</h1>
                                <h2> E-Commerce website</h2>
                                <p>Free shipping on millions of items. Get the best of Shopping and Entertainment with Prime. Enjoy low prices and great deals on the largest selection of ...
                                </p>
                            </div>
                        </div>
                        @foreach ($sliders as $slider)
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-commerce</h1>
                                <h2>E-Commerce website</h2>
                                <p>Free shipping on millions of items. Get the best of Shopping and Entertainment with Prime. Enjoy low prices and great deals on the largest selection of ...
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('images/sliders/'.$slider->image)}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        @endforeach             
                    </div>                 
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->