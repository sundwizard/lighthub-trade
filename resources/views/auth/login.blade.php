<x-guest-layout>
    <x-slot name="title">Authorized Access</x-slot>
    <style>
    .disabled-button {
          cursor: not-allowed;
          opacity: 0.6;
          pointer-events: none;
        }
    </style>
    <div class="nk-wrap nk-wrap-nosidebar">
        <!-- content @s -->
        <div class="nk-content ">
            <div class="nk-split nk-split-page nk-split-lg">
                <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                    <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                        <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                    </div><br>
                    <div class="nk-block nk-block-middle nk-auth-body ">
                        <div class="brand-logo pb-5">
                            <a href="#" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{ asset('assets/images/logo.png')}}" srcset="{{ asset('assets/images/logo.png')}}" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('assets/images/logo.png')}}" srcset="{{ asset('assets/images/logo.png')}}" alt="logo-dark">
                            </a>
                        </div>
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">Authorized Accesss</h5><hr>
                                <div class="nk-block-des">
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <x-feedback-alert />
                        <form action="{{ route('login') }}" method="POST" class="form-validate is-alter" autocomplete="off"  onsubmit="this.submit_button.disabled = true;">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="email-address">Email</label>
                                </div>
                                <div class="form-control-wrap">
                                    <input autocomplete="off" name="email" type="text" class="form-control form-control-lg" required id="email-address" placeholder="Enter your email address">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="password">Password</label>
                                    <a class="link link-primary link-sm" tabindex="-1" href="{{ route('forget-password')}}">Forgot Password?</a>
                                </div>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input autocomplete="new-password" name="password" type="password" class="form-control form-control-lg" required id="password" placeholder="Enter your password">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <button onclick="disableButton(this)" class="btn btn-lg btn-primary btn-block">Sign in</button>
                            </div>
                        </form><!-- form -->
                    </div><!-- .nk-block -->

                </div><!-- .nk-split-content -->
                <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                    <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                        <div class="slider-init">
                            <div class="slider-item">
                                <div class="nk-feature nk-feature-center">
                                    <div class="nk-feature-img">
                                        <img class="round" src="{{ asset('assets/images/risk2.png')}}" srcset="{{ asset('assets/images/risk2.png')}}" alt="">
                                    </div>
                                </div>
                            </div><!-- .slider-item -->
                        </div><!-- .slider-init -->
                        <div class="slider-dots"></div>
                        <div class="slider-arrows"></div>
                    </div><!-- .slider-wrap -->
                </div><!-- .nk-split-content -->
            </div><!-- .nk-split -->
        </div>
        <!-- wrap @e -->
    </div>
<script>
 function disableButton(button) {
     button.disabled = true;
     button.value = "submitting...."
     button.form.submit();
}
</script>
</x-guest-layout>
