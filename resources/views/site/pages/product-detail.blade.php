@include('site.layouts.head')
 <!-- Header Info Begin -->
 <div class="header-info">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-4">
                 <div class="header-item">
                     <img src="{{ asset ('site/img/icons/delivery.png')}}" alt="">
                     <p>Free shipping on orders over $30 in USA</p>
                 </div>
             </div>
             <div class="col-md-4 text-left text-lg-center">
                 <div class="header-item">
                     <img src="{{ asset ('site/img/icons/voucher.png')}}" alt="">
                     <p>20% Student Discount</p>
                 </div>
             </div>
             <div class="col-md-4 text-left text-xl-right">
                 <div class="header-item">
                     <img src="{{ asset ('site/img/icons/sales.png')}}" alt="">
                     <p>30% off on dresses. Use code: 30OFF</p>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Header Info End -->
@include('site.layouts.footer')