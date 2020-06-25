@include('site.layouts.head')


<!-- Page Add Section Begin -->
<section class="page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Shoes<span>.</span></h2>
                    <a href="#">Home</a>
                    <a href="#">Shoes</a>
                    <a class="active" href="#">Night Shoes</a>
                </div>
            </div>
            <div class="col-lg-8">
                <img src="site/img/add.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<!-- Page Add Section End -->


<div class="col-lg-6 col-md-6">
            <div class="single-product-item">
                <figure>
                    <img src="site/img/products/img-9.jpg" alt="">
                    <div class="p-status">new</div>
                    <div class="hover-icon">
                        <a href="site/img/products/img-9.jpg" class="pop-up"><img src="site/img/icons/zoom-plus.png" alt=""></a>
                    </div>
                </figure>
                <div class="product-text">
                    <a href="#">
                        <h6>Green Dress with details</h6>
                    </a>
                    <p>$22.90</p>
                </div>
            </div>
        </div>
<section class="product-page">

    <div class="container">
    
        <div class="row" id="product-list">
            @foreach($listShoes as $listSho)
            <div class="col-lg-3 col-sm-6 mix all dresses bags">
                <div class="single-product-item">
                    <figure>
                        <a href="/productDetail"><img src="{{$listSho->image}}" alt=""></a>
                        <div class="p-status">new</div>
                    </figure>
                    <div class="product-text">
                        <h6>{{$listSho->name}}</h6>
                        <p>{{$listSho->price}}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>


    </div>
</section>


<!-- Related Product Section Begin -->
<section class="related-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-product-item">
                    <figure>
                        <a href="#"><img src="site/img/products/img-1.jpg" alt=""></a>
                        <div class="p-status">new</div>
                    </figure>
                    <div class="product-text">
                        <h6>Green Dress with details</h6>
                        <p>$22.90</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-product-item">
                    <figure>
                        <a href="#"><img src="site/img/products/img-2.jpg" alt=""></a>
                        <div class="p-status sale">sale</div>
                    </figure>
                    <div class="product-text">
                        <h6>Yellow Maxi Dress</h6>
                        <p>$25.90</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-product-item">
                    <figure>
                        <a href="#"><img src="site/img/products/img-3.jpg" alt=""></a>
                        <div class="p-status">new</div>
                    </figure>
                    <div class="product-text">
                        <h6>One piece bodysuit</h6>
                        <p>$19.90</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-product-item">
                    <figure>
                        <a href="#"><img src="site/img/products/img-4.jpg" alt=""></a>
                        <div class="p-status popular">popular</div>
                    </figure>
                    <div class="product-text">
                        <h6>Blue Dress with details</h6>
                        <p>$35.50</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related Product Section End -->

@include('site.layouts.footer')