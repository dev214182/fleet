<?php 
$profile_name = 'profile_name';
$profile_email = 'profile_email';
$profile_phone  = 'profile_phone';
$profile_website  = 'profile_website';
$profile_company  = 'profile_company';
$profile_country  = 'profile_country'; 
$profile_state  = 'profile_state';
$profile_address  = 'profile_address';
$profile_fax  = 'profile_fax';
$profile_city  = 'profile_city';
$profile_postal_code  = 'profile_postal_code';

$profile_username = 'profile_username';
$profile_types = 'profile_types';
$puser = array('id' => 'inputUsername', 'placeholder' => '', 'class' => 'form-control', 'required'=> 'required');

$padd = array('id' => 'inputAddress', 'placeholder' => 'Current Address', 'class' => 'form-control');
$pcode = array('id' => 'inputpostal', 'placeholder' => 'Postal Code', 'class' => 'form-control');
 
?>
<div class="row">
    <div class="col-md-12">
    <div class="card card-outline-info">
        <div class="card-header">
        <h4 class="m-b-0 text-white text-uppercase"><?=@$title?> Information</h4>                  
        </div>
        <div class="card card-body"> 
          
            <form class="needs-validation" novalidate="" id="form-users">
                <div class="form-row">
                <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputFirst" class="col-sm-3 text-right control-label col-form-label">Name*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputFirst"  placeholder="Name" name="<?=$profile_name?>" autofocus required>
                                <input type="hidden" class="hidden" value="<?=$userID?>" name='userID' required>
                                <input type="hidden" class="hidden" value="<?=$pages?>" name='formtype' required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profemail" class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" id="profemail" class="form-control" name="<?=$profile_email?>" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPhone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPhone" placeholder="Phone Number" name="<?=$profile_phone?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputCompany" class="col-sm-3 text-right control-label col-form-label">Company</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputCompany" placeholder="Company Name"  name="<?=$profile_company?>">
                            </div>  
                        </div>  
                       
                    </div>
                    <div class="col-md-6">
                    <div class="form-group row">
                            <label for="inputCountry" class="col-sm-3 text-right control-label col-form-label">Country</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="inputCountry" name="<?=$profile_country?>">
                                    <option value="United Arab Emirates">United Arab Emirates</option> 
                                </select>
                                <div class="invalid-feedback">You need to select a Country</div>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputState" class="col-sm-3 text-right control-label col-form-label">State</label>
                          
                            <div class="col-sm-9">
                                    <select class="custom-select" id="inputState" name="<?=$profile_state?>">
                                        <option value=""> - Select State - </option>
                                        <option value="Abu Dhabi">Abu Dhabi</option> 
                                        <option value="Ajman">Ajman</option>
                                        <option value="Dubai">Dubai</option>
                                        <option value="Fujaira">Fujaira</option>
                                        <option value="Ras al Khaimah">Ras al Khaimah</option>
                                        <option value="Sharjah">Sharjah</option>
                                        <option value="Umm al-Qaiwain">Umm al-Qaiwain</option>
                                    </select>
                                    <div class="invalid-feedback">You need to select a State</div>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="inputAddress" class="col-sm-3 text-right control-label col-form-label">Address</label>
                            <div class="col-sm-9"> 
                                <?php echo form_input($profile_address,'',$padd);  ?> 
                            </div>
                        </div> 
                    </div> 
                </div>
                
                <!-- Show only for customers -->
                <?php if($userType == 6){ ?>
                <div class="form-row card-outline-golden">
                    <div class="col-md-12 card-header">
                        <div class="row">
                            <label for="inputLicense" class="col-sm-2 text-right control-label col-form-label text-white">Trade License</label>
                            <div class="col-sm-3"> 
                            <input type="text" class="form-control" id="inputLicense"  placeholder="Enter Company Trade License" name="profile_license">
                            </div>
                            <label for="inputvat" class="col-sm-3 text-right control-label col-form-label text-white">VAT Registration</label>
                            <div class="col-sm-3"> 
                            <input type="text" class="form-control" id="inputvat"  placeholder="Enter Company VAT number" name="profile_vat">
                            </div>
                        </div> 
                    </div>
                </div>
                <?php } ?>
                <div class="row row-pass b-t p-t-20">
                    <div class="col-md-12"> 

                        <div class="form-group row"> 
                                    <label class="col-xl-1 col-md-6 col-sm-12 control-label col-form-label">Username</label>
                                    <div class="col-xl-2 col-md-6 col-sm-12"> 
                                    <?php if(@$pages == 'addnew'){ ?>
                                        <?php echo form_input($profile_username,'',$puser);  ?> 
                                    <?php }else{ ?>
                                    <label id="profUser" class="control-label col-form-label">-</label> 
                                    <?php } ?>
                                    </div>  

                                    <label class="col-xl-1 col-md-6 col-sm-12 control-label col-form-label text-right">Type</label>
                                    <div class="col-xl-2 col-md-6 col-sm-12"> 
                                        
                                        <label class="control-label col-form-label" id="customer_types"> </label>
                                    </div>

                                    <label class="col-xl-1 col-md-6 col-sm-12 control-label col-form-label text-right">Status</label>
                                    <div class="col-xl-2 col-md-6 col-sm-12"> 
                                        <label class="control-label col-form-label" id="user_status"> </label>
                                    </div> 
                        </div>
                        <div class="form-group row"> 
                            <label for="inputPass" class="col-xl-1 col-md-6 col-sm-12 control-label col-form-label">Password</label>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <input type="password" autocomplete="current-password" class="form-control col-md-6 col-sm-12" id="inputPass" name="profile_password" maxlength="25" placeholder="****************************">    
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-theme text-white" id="basic-addon2">
                                        <i class="fa view-pass fa-eye reveal-pass"></i>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="p-t-10"> 
                                   <a href="#" class="generate-pass" id="generate-pass"> Generate Password </a> 
                                </div>
                                
                                <div class="p-t-10"> <code>Leave the password empty if you dont want to change.</code></div>
                                <input type="hidden" hidden class="hidden" id="old_inputFirst"   name='old_profile_name'>
                                <input type="hidden" hidden class="hidden" id="old_profemail"   name='old_profile_email'>
                                <input type="hidden" hidden class="hidden" id="old_inputPhone"   name='old_profile_phone'>
                                <input type="hidden" hidden class="hidden" id="old_inputCompany"   name='old_profile_company'>
                                <input type="hidden" hidden class="hidden" id="old_inputCountry"   name='old_profile_country'>
                                <input type="hidden" hidden class="hidden" id="old_inputState"   name='old_profile_state'>
                                <input type="hidden" hidden class="hidden" id="old_inputAddress"   name='old_profile_address'>   
                                <input type="hidden" hidden class="hidden" id="old_inputLicense"   name='old_profile_license'>   
                                <input type="hidden" hidden class="hidden" id="old_inputvat"   name='old_profile_vat'>   
                                 
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Submit</button> 
                            </div> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>