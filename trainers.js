document.addEventListener('DOMContentLoaded', function() {
    const filterButton = document.getElementById('filterButton');
    const specialityFilter = document.getElementById('specialityFilter');
    const experienceFilter = document.getElementById('experienceFilter');
    const trainerCards = document.querySelectorAll('.trainer-card');

    filterButton.addEventListener('click', function() {
        const selectedSpeciality = specialityFilter.value.toLowerCase();
        const selectedExperience = experienceFilter.value;

        trainerCards.forEach(card => {
            const speciality = card.querySelector('.speciality').textContent.toLowerCase();
            const experience = parseInt(card.querySelector('.trainer-details p').textContent);
            
            let showCard = true;

            if (selectedSpeciality && !speciality.includes(selectedSpeciality)) {
                showCard = false;
            }

            if (selectedExperience && experience < parseInt(selectedExperience)) {
                showCard = false;
            }

            card.style.display = showCard ? 'block' : 'none';
        });
    });

    // Optional: Add smooth scrolling for booking links
    document.querySelectorAll('.book-trainer').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            document.querySelector(href).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
}); 