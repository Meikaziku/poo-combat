const attaqueBtn = document.getElementById('attackBtn');

const nextFight = document.getElementById('nextFight');

attaqueBtn.addEventListener('click', async () => {
    const response = await fetch('../process/fight_actions/attaque.php', {
        method: 'POST'
    });
    
    const data = await response.json(); 

    // Mise à jour HP
    document.getElementById('hero-hp').textContent = data.heroHp;
    document.getElementById('monstre-hp').textContent = data.monstreHp;

    // Fin du combat
    if (data.monstreHp === 0 ) {
        attaqueBtn.disabled = true;
        attaqueBtn.classList.add('opacity-50');

        nextFight.classList.remove('hidden');

    }
});