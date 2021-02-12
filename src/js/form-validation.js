// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  let forms = document.querySelectorAll('.needs-validation');

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach( form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          
          event.stopPropagation()
        }
        event.preventDefault();
        form.classList.add('was-validated')
      }, false)
    }
  );

})()
