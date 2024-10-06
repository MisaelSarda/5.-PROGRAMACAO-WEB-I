
        function getNumero1() {
            return parseFloat(document.getElementById("number1").value);
        }

        function getNumero2() {
            return parseFloat(document.getElementById("number2").value);
        }

        function Adição() {
            var Resultado = getNumero1() + getNumero2();
            informaResultado(Resultado);
        }

        function Subtrair() {
            var Resultado = getNumero1() - getNumero2();
            informaResultado(Resultado);
        }

        function Dividir() {
            var Resultado = getNumero1() / getNumero2();
            informaResultado(Resultado);
        }

        function Multiplicar() {
            var Resultado = getNumero1() * getNumero2();
            informaResultado(Resultado);
        }

        function informaResultado(Resultado) {
            var elResultado = document.getElementById("Resultado");
            elResultado.value = Resultado;
            if(Resultado < 0) {
                elResultado.style.backgroundColor = "red";
            } else if  (Resultado > 0) {
                elResultado.style.backgroundColor = "green";
            } else {
                elResultado.style.backgroundColor = "gray";
            }
        }
 