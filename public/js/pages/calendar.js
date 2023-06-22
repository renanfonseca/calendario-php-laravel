const dias = document.querySelectorAll('.diasTd');

const baseUrl = window.location.origin + window.location.pathname;

dias.forEach((dia) => {
    dia.addEventListener("click", () => {

        let diaHoje = (dia.querySelector('div').textContent.trim());

        let url = baseUrl + '?dataHoje=' + diaHoje;

        window.location.href = url;

    })
});


