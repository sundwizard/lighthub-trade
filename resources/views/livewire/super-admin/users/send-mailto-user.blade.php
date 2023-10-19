<div>
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="row g-gs">
                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <form action="#" class="form-validate is-alter" wire:submit.prevent="sendMail" autocomplete="off">

                                        <div class="card-inner">
                                            <div class="card-head">
                                                <h1 class="overline-title-alt title" style="margin-top: 10px;"><b>Mail To:</b></h1>
                                                <div class="user-card">
                                                    <div class="user-avatar bg-primary">
                                                        <img src="{{ asset('assets/photo/'.$staff->profile_photo_path) }}" width="50" />
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ $staff->surname.' '.$staff->othernames}}</span>
                                                        <span class="sub-text">{{ $staff->email }}</span>
                                                    </div>
                                                </div><!-- .user-card -->
                                            </div>

                                            <hr>
                                            <div  class="card card-bordered card-preview">

                                                <div class="card-inner">
                                                    <div class="form-group">
                                                        <label class="form-label" for="full-name">Subject:</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" wire:model="subject" class="form-control">
                                                            @error('subject')<p class="text-danger">{{ $message }}</p>@enderror
                                                        </div>
                                                    </div>
                                                    <div wire:ignore><textarea id="mailbody" wire:Model="mail_body" class="form-control tinymce-basic" name="mail_body"></textarea></div>
                                                    @error('mail_body')
                                                    <label style="color: red">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div><!-- .card-preview --><br>
                                             <div style="margin-left: 50%" wire:loading wire:target="sendMail" ><x-loader /></div>
                                            <div class="form-group">
                                                <button class="btn btn-lg btn-primary btn-block">Send Mail</button>
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

    @push('script')
        <link rel="stylesheet" href="{{ asset('assets/css/editors/tinymce.css?ver=3.1.3') }}">
        <script src="{{ asset('assets/js/libs/editors/tinymce.js?ver=3.1.3') }}"></script>
        <script src="{{ asset('assets/js/editors.js?ver=3.1.3"></script') }}"></script>

        <script>

            tinymce.init({
                selector: '#mailbody',
                forced_root_block: false,
                setup: function (editor) {
                    editor.on('init change', function () {
                        editor.save();
                    });
                    editor.on('change', function (e) {
                        @this.set('mail_body', editor.getContent());
                    });
                }
            });

            window.addEventListener('feedback',event => {
                tinyMCE.activeEditor.setContent("");
            });
        </script>

        <
    @endpush

</div>
