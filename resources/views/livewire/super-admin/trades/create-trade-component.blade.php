<div>
    <x-slot name="title">Start Trade </x-slot>
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="row g-gs">
                                <div class="col-lg-8">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <div class="card-head">
                                                <h1 class="overline-title-alt title">Start Trade</h1>
                                            </div><hr>
                                            <form action="#" wire:submit.prevent="startTrade">
                                                @csrf
                                                <div style="margin-left: 50%" wire:loading ><x-loader /></div>
                                                <div class="form-group">
                                                    <label class="form-label">Account</label>
                                                    <select class="form-control" wire:model="selAccount">
                                                       <option value="" selected="selected">-- Select Trading Account--</option>
                                                       @foreach($accounts as $account)
                                                            <option value="{{ $account->id }}">{{ $account->account_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="ri-arrow-down-s-line"></i>
                                                    @error('selAccount')
                                                    <label style="color: red">{{ $message }}</label>
                                                    @enderror
                                                 </div>
                                                 @if($selAccount)
                                                    @if($trade==null)
                                                        <div class="alert alert-pro alert-primary">
                                                            <div class="alert-text">
                                                                <h6>Wallet Starting Ballance</h6>
                                                                <p>${{ number_format($sel_account_bal->wallet_ballance,2)}} </p>
                                                            </div>
                                                        </div>
                                                        <div class="alert alert-pro alert-primary">
                                                            <div class="alert-text">
                                                                <h6>Cash Starting Ballance</h6>
                                                                <p>₦{{ number_format($sel_account_bal->cash_ballance,2) }} </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name">Exchange Ragte:</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" wire:model="exchange_rate" class="form-control">
                                                                @error('exchange_rate')<p class="text-danger">{{ $message }}</p>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit"   class="btn btn-lg btn-secondary confirm-start">Start Trade</button>
                                                        </div>
                                                    @else
                                                        @if($trade->user_id==Auth::user()->id)
                                                            <div class="alert alert-pro alert-danger">
                                                                <div class="alert-text">
                                                                    <h6>Attention!</h6>
                                                                    <p>Sorry there is already an active trade </p>
                                                                </div>
                                                            </div>
                                                        @else
                                                        <div class="alert alert-pro alert-danger">
                                                            <div class="alert-text">
                                                                <h6>Attention!</h6>
                                                                <p>Another user is already trading, kindly wait for the user to complete his/her trade</p>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @endif
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
</div>
