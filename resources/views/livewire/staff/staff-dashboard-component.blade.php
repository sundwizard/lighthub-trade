<div>
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Hello! {{ Auth::user()->surname. ' '.Auth::user()->othernames}}</h3>
                            <div class="nk-block-des text-soft">
                                <p>({{ Auth::user()->user_type}}).</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-xxl-6">
                                <div class="col-lg-12">
                                    <div class="alert alert-danger alert-icon alert-dismissible">
                                        <div class="row">
                                            @if($trade==null)
                                                <div class="col-lg-10" style="padding-top:9px;">
                                                    <em class="icon ni ni-cross-circle"></em> <strong>Hello {{ Auth::user()->surname. ' '.Auth::user()->othernames}} </strong>! you dont have any active trade.
                                                </div>
                                                <div class="col-lg-2">
                                                    <a href="{{ route('trades.create') }}"><button class="btn btn-success align-right">Start Trade</button></a>
                                                </div>
                                                @else
                                                <div class="col-lg-10" style="padding-top:9px;">
                                                    <em class="icon ni ni-cross-circle"></em> <strong>Hello {{ Auth::user()->surname. ' '.Auth::user()->othernames}} </strong>! you an active trade.
                                                </div>
                                                <div class="col-lg-2">
                                                    <a href="{{ route('trades.index') }}"><button class="btn btn-danger align-right">End Trade</button></a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row" style="margin-bottom: 10px; margin-top:10px">
                                    <div class="col-lg-12">
                                        <div class="alert alert-pro alert-primary">
                                            <div class="alert-text">
                                                <h6>Total Trades</h6>
                                                <p>{{ count($trades->where('user_id',Auth::user()->id)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
