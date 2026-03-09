document.getElementById('btnCek').addEventListener('click', function() {
    const nama = document.getElementById('nama').value;
    const npm = document.getElementById('npm').value;
    const gradeInput = document.getElementById('nilai').value;
    const elemenHasil = document.getElementById('hasil');

    if (npm.trim() === '' || gradeInput.trim() === '' || nama.trim() === '') {
        elemenHasil.className = 'result-box error';
        elemenHasil.innerHTML = '<p>Harap isi semua field!</p>';
        return;
    }

    const grade = parseFloat(gradeInput);

    if (grade < 0 || grade > 100 || isNaN(grade)) {
        elemenHasil.className = 'result-box error';
        elemenHasil.innerHTML = '<p>Nilai tidak valid. Masukkan antara 0-100</p>';
    } else {
        let mutuScore = '';
            
        if (grade >= 80 && grade <= 100) {
            mutuScore = 'A';
        } else if (grade >= 70 && grade < 80) { 
            mutuScore = 'B';
        } else if (grade >= 60 && grade < 70) { 
            mutuScore = 'C';
        } else if (grade >= 50 && grade < 60) { 
            mutuScore = 'D';
        } else if (grade >= 0 && grade < 50) {  
            mutuScore = 'E';
        }

        elemenHasil.className = 'result-box success';
        elemenHasil.innerHTML = `
            <p>Nama: <strong>${nama}</strong></p>
            <p>NPM: <strong>${npm}</strong></p>
            <p>Nilai: <strong>${grade}</strong></p>
            <p>Mutu:</p>
            <p class="grade">${mutuScore}</p>
        `;
    }
});