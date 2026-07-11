document.querySelectorAll('form').forEach(function (form) {
    form.addEventListener('submit', function (e) {
        let formValido = true;

        form.querySelectorAll('[required]').forEach(function (campo) {
            const erroSpan = form.querySelector(`[data-error-for="${campo.id}"]`);
            const vazio = !campo.value.trim();

            if (vazio) {
                formValido = false;
                campo.classList.remove('border-gray-200', 'focus:ring-green-300');
                campo.classList.add('border-red-500', 'focus:ring-red-300');
                if (erroSpan) erroSpan.classList.remove('hidden');
            } else {
                campo.classList.remove('border-red-500', 'focus:ring-red-300');
                campo.classList.add('border-gray-200', 'focus:ring-green-300');
                if (erroSpan) erroSpan.classList.add('hidden');
            }
        });

        if (!formValido) {
            e.preventDefault();
        }
    });

    // Bônus: remove o erro assim que o usuário começa a digitar
    form.querySelectorAll('[required]').forEach(function (campo) {
        campo.addEventListener('input', function () {
            const erroSpan = form.querySelector(`[data-error-for="${campo.id}"]`);
            if (campo.value.trim()) {
                campo.classList.remove('border-red-500', 'focus:ring-red-300');
                campo.classList.add('border-gray-200', 'focus:ring-green-300');
                if (erroSpan) erroSpan.classList.add('hidden');
            }
        });
    });
});
