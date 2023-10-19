<div>
    <x-slot name="title">Staff Modification </x-slot>
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
                                                <h1 class="overline-title-alt title">Staff Modification</h1>
                                            </div><hr>
                                            <form action="#" wire:submit.prevent="updateStaff">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name">Staff Surname:</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" wire:model="surname" class="form-control">
                                                                @error('surname')<p class="text-danger">{{ $message }}</p>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name">Staff Othernames:</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" wire:model="othernames" class="form-control">
                                                                @error('othernames')<p class="text-danger">{{ $message }}</p>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label class="form-label" for="full-name">Staff Email:</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" wire:model="email" class="form-control">
                                                        @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="full-name">Phone Numbers:</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" wire:model="phoneno" class="form-control">
                                                        @error('phoneno')<p class="text-danger">{{ $message }}</p>@enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Staff Role</label>
                                                    <select wire:model="user_type" class="form-control" required>
                                                       <option value="" selected="selected">-- Select Staff Role --</option>
                                                       <option value="Super Admin">Super Admin</option>
                                                       <option value="Staff">Staff</option>
                                                    </select>
                                                    <i class="ri-arrow-down-s-line"></i>
                                                    @error('user_type')
                                                    <label style="color: red">{{ $message }}</label>
                                                    @enderror
                                                 </div>

                                                <div style="margin-left: 50%" wire:loading wire:target="updateStaff" ><x-loader /></div>
                                                <div class="form-group">
                                                    <button type="submit"   class="btn btn-lg btn-secondary">Update Staff</button>
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
