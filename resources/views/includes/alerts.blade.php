<script>
    window.addEventListener('feedback',event => {
        toastr.clear();
        NioApp.Toast(`<h5>Success!</h5><p>${event.detail.feedback}.</p>`, 'success',{
            position: 'top-right'
        });
    });

window.addEventListener('errorfeedback',event => {
    toastr.clear();
    NioApp.Toast(`<h5>Error!</h5><p>${event.detail.errorfeedback}.</p>`, 'error',{
        position: 'top-right'
    });
  });
</script>
