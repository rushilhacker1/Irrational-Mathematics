document.addEventListener('DOMContentLoaded', function () {
    const constantLinks = document.querySelectorAll('.lst');
    const constantValue = document.getElementById('constant');

    constantLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const constantName = this.textContent.split(' (')[0]; // Extract constant name from link text
            fetch('get-values.php?name=' + constantName) // Use "get-values.php"
                .then(response => response.text())
                .then(value => {
                    constantValue.textContent = value;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
});
