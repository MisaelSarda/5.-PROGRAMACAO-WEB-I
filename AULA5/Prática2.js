function adicionarLinhaTotalizadora() {
    const tabela = document.getElementById('tabela-alunos');
    const linhas = tabela.getElementsByTagName('tr');
    
    // Verifica se já existe uma linha totalizadora
    if (document.getElementById('linha-totalizadora')) {
        alert("A linha totalizadora já foi adicionada.");
        return;
    }

    const qtdNotasPorAluno = 9; // Total de notas por aluno

    // Adicionar médias por nota (coluna)
    const novaLinha = document.createElement('tr');
    novaLinha.id = 'linha-totalizadora'; // Define um ID para a linha totalizadora
    const tdTitulo = document.createElement('td');
    tdTitulo.innerText = 'Médias';
    novaLinha.appendChild(tdTitulo); // célula com o título "Médias"

    for (let j = 1; j <= qtdNotasPorAluno; j++) {
        let somaNotas = 0;
        let qtdNotas = 0;
        for (let i = 2; i < linhas.length; i++) {
            const colunas = linhas[i].getElementsByTagName('td');
            const nota = parseFloat(colunas[j].innerText);
            if (!isNaN(nota)) {
                somaNotas += nota;
                qtdNotas++;
            }
        }
        const media = qtdNotas > 0 ? (somaNotas / qtdNotas).toFixed(2) : 'N/A';
        const mediaTd = document.createElement('td');
        mediaTd.innerText = media;
        novaLinha.appendChild(mediaTd);
    }

    tabela.appendChild(novaLinha);
}

function calcularMediaAlunos() {
    const tabela = document.getElementById('tabela-alunos');
    const linhas = tabela.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    // Verifica se a coluna "Média do Aluno" já foi adicionada
    if (document.getElementById('media-aluno')) {
        alert("A coluna 'Média do Aluno' já foi adicionada.");
        return;
    }

    // Adiciona o cabeçalho "Média do Aluno"
    const cabecalho = tabela.getElementsByTagName('thead')[0].getElementsByTagName('tr')[0];
    const cabecalhoMedia = document.createElement('th');
    cabecalhoMedia.rowSpan = 2;
    cabecalhoMedia.bgColor = "gray";
    cabecalhoMedia.id = 'media-aluno';
    cabecalhoMedia.innerText = "Média do Aluno";
    cabecalho.appendChild(cabecalhoMedia);

    for (let i = 0; i < linhas.length; i++) {
        const colunas = linhas[i].getElementsByTagName('td');
        let somaNotas = 0;
        let qtdNotas = 0;

        for (let j = 1; j <= 9; j++) { // Percorre as 9 notas de cada aluno
            const nota = parseFloat(colunas[j].innerText);
            if (!isNaN(nota)) {
                somaNotas += nota;
                qtdNotas++;
            }
        }

        const media = qtdNotas > 0 ? (somaNotas / qtdNotas).toFixed(2) : 'N/A';
        const mediaTd = document.createElement('td');
        mediaTd.innerText = media;
        linhas[i].appendChild(mediaTd); // Adiciona a média na nova coluna
    }
}