document.querySelectorAll('[data-collapse]').forEach(btn => {
    btn.addEventListener('click', () => {
        const target = document.getElementById(btn.dataset.collapse);
        target.classList.toggle('hidden');
    });
});