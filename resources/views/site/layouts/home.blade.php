@include('site.layouts.head')

@include('site.layouts.header')
    <!-- Latest Product Begin -->
    <section class="latest-products spad">
        <div class="container">
            <div class="product-filter">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Latest Products</h2>
                        </div>
                        <ul class="product-controls">
                            <li data-filter="*" ><a href="/" style="color:gray">All</a></li>
                            <li data-filter=".dresses"><a href="/dresses" style="color:gray">Dresses</a> </li>
                            <li data-filter=".bags"> <a href="/bags" style="color:gray">Bags</a></li>
                            <li data-filter=".shoes"><a href="/shoes" style="color:gray">Shoes</a></li>
                            <li data-filter=".accesories"> <a href="/accesories" style="color:gray">Accesories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
          
            <div class="row" id="product-list">
            
                @foreach($listProducts as $listPros)
                <div class="col-lg-3 col-sm-6 mix all dresses bags">
                    <div class="single-product-item">
                        <figure>
                            <a href="/productDetail"><img src="{{$listPros->image}}" alt=""></a>
                            <div class="p-status">new</div>
                        </figure>
                        <div class="product-text">
                            <h6>{{$listPros->name}}</h6>   
                            <p>{{$listPros->price}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            
                
        </div>
           
    </section>
    <!-- Latest Product End -->

    <!-- Lookbok Section Begin -->
    <section class="lookbok-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 offset-lg-1">
                    <div class="lookbok-left">
                        <div class="section-title">
                            <h2>2019 <br />#lookbook</h2>
                        </div>
                        <p>Fusce urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vestibulum malesuada
                            aliquet libero viverra cursus. Aliquam erat volutpat. Morbi id dictum quam, ut commodo
                            lorem. In at nisi nec arcu porttitor aliquet vitae at dui. Sed sollicitudin nulla non leo
                            viverra scelerisque. Phasellus facilisis lobortis metus, sit amet viverra lectus finibus ac.
                            Aenean non felis dapibus, placerat libero auctor, ornare ante. Morbi quis ex eleifend,
                            sodales nulla vitae, scelerisque ante. Nunc id vulputate dui. Suspendisse consectetur rutrum
                            metus nec scelerisque. s</p>
                        <a href="#" class="primary-btn look-btn">See More</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="lookbok-pic">
                        <img src="./site/img/lookbok.jpg" alt="">
                        <div class="pic-text">fashion</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Lookbok Section End -->
    
    

    <!-- Logo Section Begin -->
    <div class="logo-section spad">
        <div class="logo-items owl-carousel">
            <div class="logo-item">
                <img src="./site/img/logos/logo-1.png" alt="">
            </div>
            <div class="logo-item">
                <img src="./site/img/logos/logo-2.png" alt="">
            </div>
            <div class="logo-item">
                <img src="./site/img/logos/logo-3.png" alt="">
            </div>
            <div class="logo-item">
                <img src="./site/img/logos/logo-4.png" alt="">
            </div>
            <div class="logo-item">
                <img src="./site/img/logos/logo-5.png" alt="">
            </div>
        </div>
    </div>
    <!-- Logo Section End -->

    @include('site.layouts.footer')