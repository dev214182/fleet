<?php $user_info = @user_info();?>
<form id="form-cart" novalidate="" class="boots-form wow zoomInUp" data-wow-delay="0.5s">
<div class="b-items">
    <div class="cart-wrapper container">
        <div class="row"> 
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="b-items__cars"> 
                </div>
                
            </div>
        </div>

        <div class="row">
             <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="m-20">
                        <label style="color:#999"> Kindly use the form below to contact the owner. <br/> 
                        Send a message and optionally propose a different price.</label>
                    </div>

                     <div class="b-items__cars-one " data-wow-delay="0.5s">
                        
                        <div class="p-a-20">
                            
                            <div class="b-items__cars-one-info-header border-bottom flex">
                                <h2> ACCOUNT DETAILS</h2> 
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-xs-12">  
                                    <?php if(@$user_info){?>
                                        <input type="hidden" class="form-control user-id hidden" value="<?=@$user_info->zparent?>" name="user-id" hidden required> 
                                    <?php }else{?>
                                    <div class="form-group" > 
                                            <input type="text" class="form-control user-name" placeholder="*NAME" value="" name="user-name" id="name" required>
                                    </div>
                                    <div class="form-group" >
                                            <input type="email" class="form-control user-email" placeholder="*EMAIL ADDRESS" value="" name="user-email" required >
                                    </div>
                                    <div class="form-group" >
                                            <input type="text" class="form-control user-phone" placeholder="*PHONE NO" value="" name="user-phone" id="user-phone" required>   
                                    </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label>Your Message</label>
                                        <textarea id="user-message" class="form-control user-message" name="user-message" rows="10" placeholder="Your message and propose price."></textarea>
                                    </div>
                                    <?php if(!$user_info){?>
                                    <small>Already have account? Click <a href="#" class=""  data-toggle="modal" data-target="#loginModal"> Login</a></small> 
                                    <?php } ?>
                                </div>
                                
                            </div>
                        </div> 
                    </div>
             </div> 
        </div>

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="form-group"> 
            
                <input type="checkbox" class="urgent" name="urgent" id="urgent"> Urgent?
                <label for="urgent" class="b-items__cars-one-img-check" style="position:relative; margin-left:15px;"><span class="fa fa-check"></span></label>
                <input type="button" class="btn btn-primary cart-submit" value="Send Enquiry" disabled>
            </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="b-items__pagination wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;"> </div>
            </div>
        </div>
    </div>
</div><!--b-items-->
</form>
<?php modal_login(); ?>