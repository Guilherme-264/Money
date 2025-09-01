document.addEventListener('DOMContentLoaded', function() {
    const submitButton = document.getElementById('btnSend');

    if (submitButton) {
        submitButton.addEventListener('click', function() {
            this.disabled = true;
            this.textContent = 'Cadastrando...';
            submitButton.closest('form').submit();
        });
    }
});  