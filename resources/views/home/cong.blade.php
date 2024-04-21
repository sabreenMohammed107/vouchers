@extends('layout.web')
@section('style')
<style>
.center {
  margin: auto;
    margin-top: 10%;
    width: 60%;
    background: #fff;
    color: #73AD21;
    border: 3px solid #73AD21;
    padding: 50px;
	text-align:center;
	direction:rtl;
}
body {
    background-attachment: fixed;
}
.faSize{
        font-size: 2em;
       }
    .resSpan{
            
            float: left;
            padding-left: 20px;
            font-size: 18px;
        
                }
    @media only screen and (max-width: 600px) {
        .respo {
            margin: 10px 0 0 10px !important;
        }
        .resSpan{
            
            float: left;
            padding-left: 20px;
            font-size: 10px;
        
                }
               .faSize{
                font-size: 1em;
               }
    }

	</style>

@endsection



@section('content')
<div class="center">
   <img src="{{ asset('public/webasset/images/logo.jpg')}}" style="width:400px;hieght:200px">
   <h3 style="text-transform: uppercase;font-size:35px"> تهانينا </h3>
  <p style="color:#73AD21; font-size:20px"><b>رقم كود الخصم : </b>{{$randomCoupon->coupon_code}}.</p>
  <p style="color:#73AD21; font-size:20px;margin-top:0"><b>على البطاقة رقم : </b><span  id="coponidnumber">{{$randomCoupon->student->id_number ?? ''}}</span></p>
  <p style="color:#73AD21; font-size:20px;margin-top:0"><b>على موبايل رقم : </b><span  id="couponMobile">{{$randomCoupon->student->mobile ?? ''}}</span></p>
  <p style="color:#73AD21; font-size:20px;margin-top:0"><b> تاريخ إنتهاء الكوبون : </b><span  id="couponDate">@if($randomCoupon->expired_date)
  {{ date_format(date_create($randomCoupon->expired_date), "d-m-Y") }}
     @endif</span></p>

  <hr>
  <p style="color:#73AD21; font-size:20px"><b>  خصم : </b>{{$randomCoupon->discount_per}} %.</p>

  
  <hr>
    <div class="form-submit" style="margin:30px 0;">
                <a style="text-decoration: none;font-size:16px" href="{{route('home.index')}}" class="submit"  > احصل على كوبون خصم اخر</a>
            </div>
            <div class="footer">
        <footer class="footer" style="display: flex;">
        <!-- <a href="https://api.whatsapp.com/send?phone=15551234567&text=I'm%20interested%20in%20your%20car%20for%20sale" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a> -->
        <div style="width: 45%;display:inline-block">
        <a href="https://www.facebook.com/seniorsteps.it/" target="_blank" class="float2" style="margin:0 auto;">
        <i style="margin: 3px 10px; padding: 7px 10px;border: 2px solid #161c3b;border-radius: 50%;color: #161c3b;" class="fa fa-facebook my-float faSize"></i>
        </a>
        </div>
        <div>
       <span class="resSpan" style="color: #FFF;" >
        <i style="margin: 3px 10px; padding: 7px 10px;border: 2px solid #161c3b;border-radius: 50%;color: #161c3b;" class="fa fa-phone my-float "></i>01097003465 - 01090873748
</span>
</div>
</footer>
            </div>
</div>

    </div>
    
@endsection