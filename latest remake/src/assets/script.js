document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.headericon-x56dfs').addEventListener('click', () => {
        window.location.href = '/';
    });
    document.querySelector('.headericon-x8ffs').addEventListener('click', () => {
        document.querySelector('.account-popup').classList.toggle('hidden');
    });
});