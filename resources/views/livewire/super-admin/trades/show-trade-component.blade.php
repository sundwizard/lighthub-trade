<div>
    <x-slot name="title">Trade History</x-slot>
    <div class="nk-content ">
       <div class="container-fluid">
          <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Trade Breakdown</h3>
                            <div class="nk-block-des text-soft">
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('trades.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            <a href="{{ route('trades.index') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-lg-3 col-xl-3 col-xxl-3">
                            <div class="card card-bordered">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg bg-primary">
                                                <img src="{{ asset('assets/photo/'.$trade->user->profile_photo_path) }}" alt="">
                                            </div>
                                            <div class="user-info">
                                                <div class="badge bg-light rounded-pill ucap">Trader</div>
                                                <h5>{{ $trade->user->surname. ' '.$trade->user->othernames}}</h5>
                                                <span class="sub-text">{{  $trade->user->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div align="center" class="card-inner card-inner-sm">
                                        <div class="badge bg-light rounded-pill ucap">{{ $trade->status}}</div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-9 col-xl-9 col-xxl-9">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="nk-block">
                                        <div class="overline-title-alt mb-2 mt-2">Trade Details</div><hr>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="profile-balance-sub">
                                                        <span class="profile-balance-plus text-soft"></span>
                                                        <div class="profile-balance-amount">
                                                            <div class="number">₦  @if($trade->status=="Closed") {{ number_format($nairaProfit,2) }} @else 0 @endif</div>
                                                        </div>
                                                        <div class="profile-balance-subtitle mb-2">Profit(₦)</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="profile-balance-sub">
                                                        <span class="profile-balance-plus text-soft"></span>
                                                        <div class="profile-balance-amount">
                                                            <div class="number">$ @if($trade->status=="Closed") {{ number_format($dollarProfit,2) }} @else 0 @endif</div>
                                                        </div>
                                                        <div class="profile-balance-subtitle mb-2">Profit($)</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="profile-balance-sub">
                                                        <span class="profile-balance-plus text-soft"></span>
                                                        <div class="profile-balance-amount">
                                                            <div class="number">$ {{number_format($trade->starting_exchange_rate,2) }}</div>
                                                        </div>
                                                        <div class="profile-balance-subtitle mb-2">Starting Rate</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="profile-balance-sub">
                                                        <span class="profile-balance-plus text-soft"></span>
                                                        <div class="profile-balance-amount">
                                                            <div class="number">$ @if($trade->status=="Closed") {{ number_format($trade->closing_exchange_rate,2) }} @else 0 @endif</div>
                                                        </div>
                                                        <div class="profile-balance-subtitle">Clossing Rate</div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <div class="nk-tb-list nk-tb-ulist is-compact border round-sm">
                                            <div class="nk-tb-item nk-tb-head">
                                                <div class="nk-tb-col">
                                                    <span class="sub-text">Currency</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="sub-text">Opending Ballance</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="sub-text">Clossing Ballance</span>
                                                </div>
                                            </div>
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <a href="#"><span class="fw-bold">Cash(N)</span></a>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-product">
                                                        <span class="title">{{ number_format($trade->starting_cash_ballance,2)}}</span>
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="lead-text text-warning">{{ number_format($trade->closing_cash_ballance,2)}}</span>
                                                </div>
                                            </div>
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <a href="#"><span class="fw-bold">Wallet($)</span></a>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-product">
                                                        <span class="title">{{ number_format($trade->starting_wallet_ballance,2) }}</span>
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="lead-text text-danger">{{ number_format($trade->closing_wallet_ballance,2) }}</span>
                                                </div>
                                            </div>
                                        </div><!-- .nk-tb-list -->
                                    </div>
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
          </div>
       </div>
    </div>
    </div>
 </div>
 <script>
     window.addEventListener('feedback',event => {
         document.getElementById("closeModal").click();
     });
  </script>
