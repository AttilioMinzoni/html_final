document.querySelectorAll('.shop-card').forEach(card => {
    const img = card.querySelector('img');
    if (img) {
        card.style.backgroundImage = `url(${img.src})`;
        img.style.display = 'none'; // Optionally hide the img element
    }
});