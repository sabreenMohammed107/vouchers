<div jscontroller="sWGJ4b" jsaction="EEvAHc:yfX9oc;" class="freebirdFormviewerComponentsQuestionBaseRoot">
			
			<div class="freebirdFormviewerComponentsQuestionBaseHeader">
			
  <p style="color:#73AD21; font-size:20px;margin-top:0"><b>رقم كود الخصم : </b><span id="couponCode">{{$coupon->coupon_code}}.<span>
</p>
  <p style="color:red; font-size:20px;margin-top:0"><b>قيمة الخصم : </b><span  id="couponPer">{{$coupon->discount_per}}</span> %.</p>
 <p style="color:#73AD21; font-size:20px;margin-top:0"><b>على البطاقة  رقم : </b><span  id="coponidnumber">{{$coupon->student->id_number ?? ''}}</span></p>
 <p style="color:#73AD21; font-size:20px;margin-top:0"><b>على موبايل رقم : </b><span  id="couponMobile">{{$coupon->student->mobile ?? ''}}</span></p>
 <p style="color:#73AD21; font-size:20px;margin-top:0"><b> تاريخ إنتهاء الكوبون : </b><span  id="couponDate">@if($coupon->expired_date)
        {{ date_format($coupon->expired_date, "d-m-Y") }}
    @else
        No expiration date set
    @endif</span></p>

 
		</div></div>
		
               
        <div class="form-check" style="padding:0 20px">
                <label for="agree-term"  class="label-agree-term"><b >ملحوظة : </b>  يتم ربط الكوبون برقم موبايل 1 فقط خاص بالطالب ولا يمكن استخدامه مع كوبون اخر طالما الكوبون الحالى نشط للإستخدام - وكل كوبون خصم يكون له تاريخ إنتهاء يجب ألا يتخطاه ويتم الغاءه تلقائيا
</label>
            </div>
            <div class="footer">
        <footer class="footer" style="display: flex;">
        <!-- <a href="https://api.whatsapp.com/send?phone=15551234567&text=I'm%20interested%20in%20your%20car%20for%20sale" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a> -->
        
        <div style="width: 45%;display:inline-block">
        <a href="https://www.facebook.com/seniorsteps.it/" target="_blank" class="float2" style="text-align: right;">
        <i style="margin: 3px 10px; padding: 3px 7px;border: 2px solid #161c3b;border-radius: 50%;color: #161c3b;" class="fa fa-facebook my-float faSize"></i>
        </a>
        </div>
        <div >
       <span class="resSpan" >
        <i style="margin: 3px 10px; padding: 7px 10px;border: 2px solid #161c3b;border-radius: 50%;color: #161c3b;" class="fa fa-phone my-float "></i>01097003465 - 01090873748
</span>
        </div>
</footer>
            </div>     
        </div>

    </div>