<div>
    <x-slot name="title">Exchange Rate </x-slot>
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
                                                <h1 class="overline-title-alt title">Exchange Rate</h1>
                                            </div><hr>
                                            <form action="#" wire:submit.prevent="updateRate">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-label" for="full-name">Exchange Rate:</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" wire:model="exchange_rate" class="form-control">
                                                        @error('exchange_rate')<p class="text-danger">{{ $message }}</p>@enderror
                                                    </div>
                                                </div>
                                                <div style="margin-left: 50%" wire:loading wire:target="updateRate" ><x-loader /></div>
                                                <div class="form-group">
                                                    <button type="submit"   class="btn btn-lg btn-secondary">Update Rate</button>
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
