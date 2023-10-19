<div>
    <x-slot name="title">Trades History</x-slot>
    <div class="nk-content ">
       <div class="container-fluid">
          <div class="nk-content-inner">
             <div class="nk-content-body">
                <div class="nk-block">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="alert alert-pro alert-primary">
                                <div class="alert-text">
                                    <h6>Total Profit(₦)</h6>
                                    <p>₦{{ number_format($nairaProfit,2) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="alert alert-pro alert-primary">
                                <div class="alert-text">
                                    <h6>Total Profit ($)</h6>
                                    <p>${{ number_format($dollarProfit,2) }} </p>
                                </div>
                            </div>
                        </div>
                    </div><br>
                   <div class="card card-bordered card-stretch">
                      <div class="card-inner-group">
                         <div class="card-inner position-relative card-tools-toggle">
                            <div class="card-title-group">
                               <div class="card-tools">
                                  <div class="form-inline flex-nowrap gx-3">
                                    <h1 class="overline-title-alt title">Trades History</h1>
                                  </div>
                                  <!-- .form-inline -->
                               </div>
                               <!-- .card-tools -->
                               <div class="card-tools me-n1">
                                  <ul class="btn-toolbar gx-1">
                                     <li>
                                        <a href="#" class="btn btn-icon search-toggle toggle-search"
                                           data-target="search"><em class="icon ni ni-search"></em></a>
                                     </li>
                                     <!-- li -->
                                     <li class="btn-toolbar-sep"></li>
                                     <!-- li -->
                                     <li>
                                        <div class="toggle-wrap">
                                           <a href="#" class="btn btn-icon btn-trigger toggle"
                                              data-target="cardTools"><em
                                              class="icon ni ni-menu-right"></em></a>
                                           <div class="toggle-content" data-content="cardTools">
                                              <ul class="btn-toolbar gx-1">
                                                 <li class="toggle-close">
                                                    <a href="#"
                                                       class="btn btn-icon btn-trigger toggle"
                                                       data-target="cardTools"><em
                                                       class="icon ni ni-arrow-left"></em></a>
                                                 </li>
                                                 <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                            <div class="dot dot-primary"></div>
                                                            <em class="icon ni ni-filter-alt"></em>
                                                        </a>
                                                        <div wire:ignore.self class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                            <div class="dropdown-head">
                                                                <span class="sub-title dropdown-title">Filter Trade</span>
                                                            </div>
                                                            <div class="dropdown-body dropdown-body-rg">
                                                                <div class="row gx-6 gy-3">
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label class="overline-title overline-title-alt">Start Date</label>
                                                                             <input type="date" wire:model="startdate" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label class="overline-title overline-title-alt">End Date</label>
                                                                             <input type="date" wire:model="enddate" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-foot between">
                                                                <a class="clickable" href="#" wire:click.prevent="resetFilter">Reset Filter</a>
                                                            </div>
                                                        </div><!-- .filter-wg -->
                                                    </div><!-- .dropdown -->
                                                </li><!-- li -->
                                                 <li>
                                                    <div class="dropdown">
                                                       <a href="#"
                                                          class="btn btn-trigger btn-icon dropdown-toggle"
                                                          data-bs-toggle="dropdown">
                                                       <em class="icon ni ni-setting"></em>
                                                       </a>
                                                       <div
                                                          class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                          <ul class="link-check">
                                                             <li><span>Show</span></li>
                                                             <li @if($paginate==10) class="active" @endif><a wire:click="setPagination(10)">10</a></li>
                                                             <li @if($paginate==20) class="active" @endif><a wire:click="setPagination(20)">20</a></li>
                                                             <li @if($paginate==50) class="active" @endif><a wire:click="setPagination(50)">50</a></li>
                                                          </ul>
                                                       </div>
                                                    </div>
                                                    <!-- .dropdown -->
                                                 </li>
                                                 <!-- li -->
                                              </ul>
                                              <!-- .btn-toolbar -->
                                           </div>
                                           <!-- .toggle-content -->
                                        </div>
                                        <!-- .toggle-wrap -->
                                     </li>
                                     <!-- li -->
                                  </ul>
                                  <!-- .btn-toolbar -->
                               </div>
                               <!-- .card-tools -->
                            </div>
                            <!-- .card-title-group -->
                            <div class="card-search search-wrap" wire:ignore data-search="search">
                               <div class="card-body">
                                  <div class="search-content">
                                     <a href="#" class="search-back btn btn-icon toggle-search"
                                        data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                     <input type="text" wire:model="searchTerm"
                                        class="form-control border-transparent form-focus-none"
                                        placeholder="Search by type of trade, currency or description">

                                     <button class="search-submit btn btn-icon"><em
                                        class="icon ni ni-search"></em></button>
                                  </div>
                               </div>
                            </div>
                            <!-- .card-search -->
                         </div>
                         <div style="margin-left: 50%" wire:loading ><br><x-loader /></div>
                         <!-- .card-inner -->
                         <div class="card-inner p-0">
                            <div class="nk-tb-list nk-tb-ulist">
                               <div class="nk-tb-item nk-tb-head">
                                  <div class="nk-tb-col nk-tb-col-check">
                                     <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <b>SN</b>
                                     </div>
                                  </div>
                                  <div class="nk-tb-col"><span class="sub-text"><b>Account</b></span>
                                  </div>
                                  <div class="nk-tb-col tb-col-mb"><span class="sub-text"><b>Wallet Ballance</b></span>
                                  </div>
                                  <div class="nk-tb-col tb-col-mb"><span class="sub-text"><b>Cash Ballance</b></span>
                                  </div>
                                  <div class="nk-tb-col"><span class="sub-text"><b>Start Time</b></span>
                                  </div>
                                  <div class="nk-tb-col tb-col-md"><span class="sub-text"><b>Clossing Time</b></span>
                                  </div>
                                  <div class="nk-tb-col tb-col-md"><span class="sub-text"><b>Trader</b></span>
                                  </div>
                                  <div class="nk-tb-col"><span class="sub-text"><b>Status</b></span>
                                  </div>
                                  <div class="nk-tb-col nk-tb-col-tools text-end">
                                  </div>
                               </div>
                               <!-- .nk-tb-item -->
                               @foreach($trades as $sn=>$trade)
                               <div class="nk-tb-item">
                                  <div class="nk-tb-col nk-tb-col-check">
                                     <div class="custom-control custom-control-sm custom-checkbox notext">
                                        {{ $sn+1}}
                                     </div>
                                  </div>
                                  <div class="nk-tb-col">
                                     <span >{{ $trade->account->account_name }}</span>
                                  </div>
                                  <div class="nk-tb-col tb-col-mb">
                                    <span >${{ number_format($trade->starting_wallet_ballance,2)}}</span>
                                 </div>
                                 <div class="nk-tb-col tb-col-mb">
                                    <span >₦{{ number_format($trade->starting_cash_ballance,2)}}</span>
                                 </div>
                                 <div class="nk-tb-col">
                                    <span >{{ $trade->created_at->format('d M, Y').'  '.$trade->created_at->format('h:m a')}}</span>
                                 </div>
                                 <div class="nk-tb-col tb-col-mb">
                                    <span >@if($trade->closing_time!=null){{ $trade->updated_at->format('d M, Y').'   '.$trade->updated_at->format('h:m a')}}@else NA @endif</span>
                                 </div>
                                 <div class="nk-tb-col tb-col-mb">
                                    <span >{{ $trade->user->surname. ' '.$trade->user->othernames}}</span>
                                 </div>
                                 <div class="nk-tb-col">
                                    <span class="tb-status @if($trade->status=="Active") text-success @elseif($trade->status=="Closed") text-danger @else text-warning @endif">{{ $trade->status}}</span>
                                 </div>
                                  <div class="nk-tb-col nk-tb-col-tools">
                                     <ul class="nk-tb-actions gx-1">
                                        <li>
                                           <div class="drodown">
                                              <a href="#"
                                                 class="dropdown-toggle btn btn-icon btn-trigger"
                                                 data-bs-toggle="dropdown"><em
                                                 class="icon ni ni-more-h"></em></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                 <ul class="link-list-opt no-bdr">
                                                    @if($trade->status=="Active")
                                                    <li ><a data-bs-toggle="modal" data-bs-target="#modalForm" wire:click="getCloseTradeId('{{$trade->id}}')" href="#"><em
                                                        class="icon ni ni-cross-round"></em><span>Close Trade</span></a>
                                                     </li>
                                                     @endif
                                                     <li ><a  href="{{ route('trades.show',$trade->id)}}"><em
                                                        class="icon ni ni-eye"></em><span>View Trade</span></a>
                                                     </li>
                                                    @if(Auth::user()->user_type=="Super Admin")
                                                      @if($trade->status=="Active")
                                                      <li class="confirm-delete"><a wire:click="setActionId('{{$trade->id}}')" href="#"><em
                                                         class="icon ni ni-trash"></em><span>Delete Trade</span></a>
                                                      </li>
                                                      @endif
                                                    @endif
                                                 </ul>
                                              </div>
                                           </div>
                                        </li>
                                     </ul>
                                  </div>
                               </div>
                               @endforeach
                            </div>

                            </div>
                            <!-- .nk-tb-list -->
                         </div>
                         <!-- .card-inner -->
                         <div class="card-inner">
                            <div class="nk-block-between-md g-3">
                               <div class="g">
                                    {{ $trades->links() }}
                                  <!-- .pagination -->
                               </div>
                            </div>
                            <!-- .nk-block-between -->
                         </div>
                         <!-- .card-inner -->
                         @if(count($trades)<1)
                         <div align="center" id="norecord"><img style="margin-left:;"  width="100" src="https://img.freepik.com/free-vector/
                         no-data-concept-illustration_114360-626.jpg?size=626&ext=jpg&uid=R51823309&ga=GA1.2.224938283.1666624918&semt=sph"
                         alt="No results found" >
                         <p class="mt-2 text-danger">No record found!</p>
                         </div><br>
                         @endif
                      </div>
                      <!-- .card-inner-group -->
                   </div>
                   <!-- .card -->
                </div>
                <!-- .nk-block -->
             </div>
          </div>
       </div>
       <div wire:ignore.self class="modal fade" id="modalForm">
        <div wire:ignore.self class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Close Trade</h5>
                    <a href="#" id="closeModal" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    @if($selTrade)
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="alert alert-pro alert-primary">
                                <div class="alert-text">
                                    <h6>Starting Ballance($)</h6>
                                    <p>${{ number_format($selTrade->starting_wallet_ballance,2) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="alert alert-pro alert-primary">
                                <div class="alert-text">
                                    <h6>Starting Ballance(₦)</h6>
                                    <p>₦{{ $selTrade->starting_cash_ballance }} </p>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    @endif
                    <form action="#" wire:submit.prevent="closeTrade">
                        <div class="form-group">
                            <label class="form-label" for="full-name">Wallet Clossing Ballance</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" wire:model="clossing_wallet_ballance" id="full-name">
                                @error('clossing_wallet_ballance')
                                <label style="color: red">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Cash Clossing Ballance</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" wire:model="clossing_cash_ballance" id="full-name">
                                @error('clossing_cash_ballance')
                                <label style="color: red">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Clossing Exchange Rade</label>
                            <div class="form-control-wrap">
                                <input type="text" wire:model="exchange_rate" class="form-control" id="phone-no">
                                @error('exchange_rate')
                                <label style="color: red">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-left: 50%" wire:loading wire:target="closeTrade" ><x-loader /></div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-danger">Close Trade</button>
                        </div>
                    </form>
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
