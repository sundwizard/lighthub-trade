<div>
    <x-slot name="title">Withdraw Funds </x-slot>
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
                                                <h1 class="overline-title-alt title">Withdraw Funds</h1>
                                            </div><hr>
                                            <form action="#" wire:submit.prevent="withdrawFunds">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-label">Account</label>
                                                    <select class="form-control" wire:model="account">
                                                       <option value="" selected="selected">-- Select Account --</option>
                                                       @foreach($accounts as $account)
                                                            <option value="{{ $account->id }}">{{ $account->account_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="ri-arrow-down-s-line"></i>
                                                    @error('account')
                                                    <label style="color: red">{{ $message }}</label>
                                                    @enderror
                                                 </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="full-name">Amount:</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" wire:model="amount" class="form-control">
                                                        @error('amount')<p class="text-danger">{{ $message }}</p>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Currency</label>
                                                    <select  class="form-control" wire:model="currency">
                                                       <option value="" selected="selected">-- Select Currency --</option>
                                                       <option value="Naira">Naira</option>
                                                       <option value="Dollar">Dollar</option>
                                                    </select>
                                                    <i class="ri-arrow-down-s-line"></i>
                                                    @error('currency')
                                                    <label style="color: red">{{ $message }}</label>
                                                    @enderror
                                                 </div>
                                                 <div class="form-group">
                                                    <label class="form-label" for="full-name">Description:</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" wire:model="description" class="form-control">
                                                        @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                                                    </div>
                                                </div>
                                                <div style="margin-left: 50%" wire:loading wire:target="withdrawFunds" ><x-loader /></div>
                                                <div class="form-group">
                                                    <button type="submit"   class="btn btn-lg btn-secondary">Withdraw Funds</button>
                                                </div>

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
