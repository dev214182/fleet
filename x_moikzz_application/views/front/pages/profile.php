<section class="b-auto">
    <div class="container">
        <div class="row">
            <div class="col-xs-5 col-sm-4 col-md-3">
                <aside class="b-auto__main-nav">
                    <ul>
                        <li><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                        <li><a href="<?=base_url('bookings')?>">Bookings</a></li>
                        <li class="active"><a href="<?=base_url('profile')?>">Profile</a><span class="fa fa-angle-right"></span></li>
                    </ul>
                </aside>
            </div>
            <div class="col-xs-7 col-sm-8 col-md-6">
                <div class="b-contacts__form">
                    <!-- <header class="b-contacts__form-header s-lineDownLeft">
                        <h2 class="s-titleDet">Profile</h2> 
                    </header> -->
                    <div id="success"></div>
                    <form id="contactForm" novalidate class="s-form">
                        <div class="form-group">
                            <label for="user-name" class="pull-left">Full name</label>
                            <input type="text" placeholder="FULL NAME" value="Romel Indemne" name="user-name" id="user-name" />
                        </div>
                        <div class="form-group">
                            <label for="user-email" class="pull-left">Email</label>
                            <input type="text" placeholder="EMAIL ADDRESS" value="indemnetest@gmail.com" name="user-email" id="user-email" />
                        </div>
                        <div class="form-group">
                            <label for="user-address" class="pull-left">Address</label>
                            <input type="text" placeholder="ADDRESS" value="Dubai, UAE" name="user-address" id="user-address" />
                        </div>
                        <div class="form-group">
                            <label for="user-mobile" class="pull-left">Mobile No.</label>
                            <input type="text" placeholder="MOBILE NO." value="0501234567" name="user-mobile" id="user-mobile" />
                        </div>
                        <div class="form-group">
                            <label for="user-phone" class="pull-left">Phone No.</label>
                            <input type="text" placeholder="PHONE NO." value="0501234567" name="user-phone" id="user-phone" />
                        </div>
                        <div class="form-group">
                            <label for="user-fax" class="pull-left">Fax No.</label>
                            <input type="text" placeholder="FAX NO." value="0501234567" name="user-fax" id="user-fax" />
                        </div>
                        <button type="submit" class="btn m-btn pull-left">Update<span class="fa fa-angle-right"></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!--b-auto-->