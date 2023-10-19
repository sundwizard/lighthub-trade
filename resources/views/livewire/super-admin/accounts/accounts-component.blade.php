<div>
    <x-slot name="title">Accounts</x-slot>
    <div class="nk-content ">
       <div class="container-fluid">
          <div class="nk-content-inner">
             <div class="nk-content-body">
                <div class="nk-block">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="alert alert-pro alert-primary">
                                <div class="alert-text">
                                    <h6>Total Ballance(₦)</h6>
                                    <p>₦ {{ number_format($accounts->sum('wallet_ballance')*getRate() + $accounts->sum('cash_ballance'),2) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="alert alert-pro alert-primary">
                                <div class="alert-text">
                                    <h6>Total Ballance ($)</h6>
                                    <p>$ {{ number_format($accounts->sum('wallet_ballance') + $accounts->sum('cash_ballance')/getRate(),2) }}</p>
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
                                    <h1 class="overline-title-alt title">Accounts</h1>
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
                                        placeholder="Search by type of account, currency or description">

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
                                  <div class="nk-tb-col"><span class="sub-text"><b>Account Name</b></span>
                                  </div>
                                  <div class="nk-tb-col tb-col-mb"><span class="sub-text"><b>Wallet Ballance</b></span>
                                  </div>
                                  <div class="nk-tb-col tb-col-mb"><span class="sub-text"><b>Cash Ballance</b></span>
                                  </div>
                                  <div class="nk-tb-col tb-col-md"><span class="sub-text"><b>Total Ballance($)</b></span>
                                  </div>
                                  <div class="nk-tb-col"><span class="sub-text"><b>Total Ballance(₦)</b></span>
                                  </div>
                                  <div class="nk-tb-col nk-tb-col-tools text-end">
                                </div>
                               </div>
                               <!-- .nk-tb-item -->
                               @foreach($accounts as $sn=>$account)
                               @php $account_bal = ($account_bal + $account->wallet_ballance*$account->exchange_rate)+$account->cash_ballance  @endphp
                               <div class="nk-tb-item">
                                  <div class="nk-tb-col nk-tb-col-check">
                                     <div class="custom-control custom-control-sm custom-checkbox notext">
                                        {{ $sn+1}}
                                     </div>
                                  </div>
                                  <div class="nk-tb-col">
                                     <span >{{ $account->account_name}}</span>
                                  </div>
                                  <div class="nk-tb-col tb-col-mb">
                                    <span >${{ number_format($account->wallet_ballance,2)}}</span>
                                 </div>
                                 <div class="nk-tb-col tb-col-mb">
                                    <span >₦{{ number_format($account->cash_ballance,2)}}</span>
                                 </div>
                                 <div class="nk-tb-col tb-col-mb">
                                    <span >₦{{ number_format(($account->wallet_ballance*$account->exchange_rate)+$account->cash_ballance,2)}}</span>
                                 </div>
                                 <div class="nk-tb-col">
                                    <span >${{ number_format(($account->wallet_ballance)+$account->cash_ballance/$account->exchange_rate,2)}}</span>
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
                                                   <li class="confirm-delete"><a wire:click="setActionId('{{$account->id}}')" href="#"><em
                                                       class="icon ni ni-trash"></em><span>Delete Account</span></a>
                                                    </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                               </div>
                               @endforeach
                               <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                   <div class="custom-control custom-control-sm custom-checkbox notext">
                                      <b></b>
                                   </div>
                                </div>
                                <div class="nk-tb-col tb-col-mb"><span class="sub-text"><b></b></span>
                                </div>
                                <div class="nk-tb-col tb-col-mb"><span class="sub-text"><b></b></span>
                                </div>
                                <div class="nk-tb-col tb-col-mb"><span class="sub-text"><b></b></span>
                                </div>
                                <div class="nk-tb-col tb-col-mb"><span class="sub-text"><b>Total Ballance</b></span>
                                </div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text"><b>₦{{ number_format($account_bal,2) }}</b></span>
                                </div>
                             </div>
                            </div>

                            </div>
                            <!-- .nk-tb-list -->
                         </div>
                         <!-- .card-inner -->
                         <div class="card-inner">
                            <div class="nk-block-between-md g-3">
                               <div class="g">
                                    {{ $accounts->links() }}
                                  <!-- .pagination -->
                               </div>
                            </div>
                            <!-- .nk-block-between -->
                         </div>
                         <!-- .card-inner -->
                         @if(count($accounts)<1)
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
    </div>
    <!-- content -->
 </div>
