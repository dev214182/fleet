<!-- <section class="b-pageHeader">
    <div class="container">
        <h1>Bookings</h1>
    </div>
</section>
<div class="b-breadCumbs s-shadow">
    <div class="container">
        <a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?=base_url('bookings')?>" class="b-breadCumbs__page m-active">Bookings</a>
    </div>
</div> -->

<section class="b-auto g-bookings">
    <div class="container">
        <div class="row">
            <div class="col-xs-5 col-sm-4 col-md-3">
                <aside class="b-auto__main-nav">
                    <ul>
                        <li><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                        <li class="active"><a href="<?=base_url('bookings')?>">Bookings</a><span class="fa fa-angle-right"></span></li>
                        <li><a href="<?=base_url('profile')?>">Profile</a></li>
                    </ul>
                </aside>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-7">
                <div class="table-responsive">
                    <table class="table text-left" style="border:1px solid #eeeeee;">
                        <thead>
                            <tr>
                                <th>Booking No.</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="javascript:Booking No.(0)">#26589</a></td>
                                <td>Herman Beck</td>
                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                <td>$45.00</td>
                                <td>
                                    <div class="label label-table label-success">Paid</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="javascript:Booking No.(0)">#58746</a></td>
                                <td>Mary Adams</td>
                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 12, 2017</span> </td>
                                <td>$245.30</td>
                                <td>
                                    <div class="label label-table label-danger">Shipped</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="javascript:Booking No.(0)">#98458</a></td>
                                <td>Caleb Richards</td>
                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> May 18, 2017</span> </td>
                                <td>$38.00</td>
                                <td>
                                    <div class="label label-table label-info">Shipped</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="javascript:void(0)">#32658</a></td>
                                <td>June Lane</td>
                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> Apr 28, 2017</span> </td>
                                <td>$77.99</td>
                                <td>
                                    <div class="label label-table label-success">Paid</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- table-responsive -->
            </div>
        </div>
    </div>
</section><!--b-auto-->