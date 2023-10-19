<div>
    <x-slot name="title">Account Creation </x-slot>
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
                                                <h1 class="overline-title-alt title">Account Creation</h1>
                                            </div><hr>
                                            <form action="#" wire:submit.prevent="createAccount">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-label" for="full-name">Account Name:</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" wire:model="account_name" class="form-control">
                                                        @error('account_name')<p class="text-danger">{{ $message }}</p>@enderror
                                                    </div>
                                                </div>
                                                <div style="margin-left: 50%" wire:loading wire:target="createAccount" ><x-loader /></div>
                                                <div class="form-group">
                                                    <button type="submit"   class="btn btn-lg btn-secondary">Create Account</button>
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
