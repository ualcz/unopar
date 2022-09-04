function trocartxt() {

    var mudartxt = function(current) {
        var txt = [ '50% de desconto <br> inscreva-se hoje', 'Cursos em Diversas Áreas Com  Qualidade <br> de Ensino Reconhecida Pelo MEC.','Realize Esse Sonho!<br> Estude Por Menos de R$ 100 Por Mês','Faça Sua Graduação Na Unopar <br> Inscreva-se Agora.' , ' Pós-Graduação e MBA .<br> Faça sua Transferência.','Inscreva-se Online! <br> Rapido e faciel'];
        
        document.getElementById("pa").innerHTML= txt[current];

        if (++current >= txt.length) {
            current = 0;
        }

        setTimeout(function() { mudartxt(current); }, 3000);
    };

    mudartxt(0);

}

trocartxt();