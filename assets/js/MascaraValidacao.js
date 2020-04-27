
function Mascara_Hora(Hora){ 
var hora01 = ''; 
hora01 = hora01 + Hora; 
if (hora01.length == 2){ 
hora01 = hora01 + ':'; 
document.forms[0].Hora.value = hora01; 
} 
if (hora01.length == 5){ 
Verifica_Hora(); 
} 
} 
           
function Verifica_Hora(){ 
hrs = (document.forms[0].Hora.value.substring(0,2)); 
min = (document.forms[0].Hora.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora.value == "") { 
estado = "errada"; 
} 
 
if (estado == "errada") { 
alert("Hora inválida!"); 
document.forms[0].Hora.focus(); 
} 
} 

function MascaraInteiro(num) {

    var er = /[^0-9]/;

    er.lastIndex = 0;

    var campo = num;

    if (er.test(campo.value)) {///verifica se é string, caso seja então apaga

        var texto = $(campo).val();

        $(campo).val(texto.substring(0, texto.length - 1));

        return false;

    } else {

        return true;

    }

}

function MascaraFloat(num) {

    var er = /[^0-9.,]/;

    er.lastIndex = 0;

    var campo = num;

    if (er.test(campo.value)) {///verifica se é string, caso seja então apaga

        var texto = $(campo).val();

        $(campo).val(texto.substring(0, texto.length - 1));

        return false;

    } else {

        return true;

    }

}

 //formata de forma generica os campos

function formataCampo(campo, Mascara) {

    var er = /[^0-9/ (),.-]/;

    er.lastIndex = 0;



    if (er.test(campo.value)) {///verifica se é string, caso seja então apaga

        var texto = $(campo).val();

        $(campo).val(texto.substring(0, texto.length - 1));

    }

    var boleanoMascara;

    var exp = /\-|\.|\/|\(|\)| /g

    var campoSoNumeros = campo.value.toString().replace(exp, "");

    var posicaoCampo = 0;

    var NovoValorCampo = "";

    var TamanhoMascara = campoSoNumeros.length;

    for (var i = 0; i <= TamanhoMascara; i++) {

        boleanoMascara = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")

                || (Mascara.charAt(i) == "/"))

        boleanoMascara = boleanoMascara || ((Mascara.charAt(i) == "(")

                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))

        if (boleanoMascara) {

            NovoValorCampo += Mascara.charAt(i);

            TamanhoMascara++;

        } else {

            NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);

            posicaoCampo++;

        }

    }

    campo.value = NovoValorCampo;

    ////LIMITAR TAMANHO DE CARACTERES NO CAMPO DE ACORDO COM A MASCARA//

    if (campo.value.length > Mascara.length) {

        var texto = $(campo).val();

        $(campo).val(texto.substring(0, texto.length - 1));

    }

    //////////////

    return true;

}



function MascaraMoeda(i) {

    var v = i.value.replace(/\D/g, '');

    v = (v / 100).toFixed(2) + '';

    v = v.replace(".", ",");

    v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");

    v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");

    i.value = v;

}



function MascaraGenerica(seletor, tipoMascara) {

    setTimeout(function () {

        if (tipoMascara == 'CPFCNPJ') {

            if (seletor.value.length <= 14) { //Se for CPF

                formataCampo(seletor, '000.000.000-00');

            } else { //Se não for cpf é então CNPJ

                formataCampo(seletor, '00.000.000/0000-00');

            }

        } else if (tipoMascara == 'DATA') {

            formataCampo(seletor, '00/00/0000');

        } else if (tipoMascara == 'DATAMES'){  

            formataCampo(seletor, '00/0000');

        } else if (tipoMascara == 'HORAS'){  

            formataCampo(seletor, '00:00:00');

        }else if (tipoMascara == 'CEP') {

            formataCampo(seletor, '00.000-000');

        } else if (tipoMascara == 'TELEFONE') {

            formataCampo(seletor, '(00) 000000000');

        } else if (tipoMascara == 'INTEIRO') {

            MascaraInteiro(seletor);

        } else if (tipoMascara == 'FLOAT') {

            MascaraFloat(seletor);

        } else if (tipoMascara == 'CPF') {

            formataCampo(seletor, '000.000.000-00');

        } else if (tipoMascara == 'CNPJ') {

            formataCampo(seletor, '00.000.000/0000-00');

        } else if (tipoMascara == 'MOEDA') {

            MascaraMoeda(seletor);

        }

    }, 200);

}


 function validaData(stringData)
{
   /******** VALIDA DATA NO FORMATO DD/MM/AAAA *******/

   var regExpCaracter = /[^\d]/;     //Expressão regular para procurar caracter não-numérico.
   var regExpEspaco = /^\s+|\s+$/g;  //Expressão regular para retirar espaços em branco.

   if(stringData.length != 10)
   {
       alert('Data fora do padrão DD/MM/AAAA');
       return false;
   }

   splitData = stringData.split('/');

   if(splitData.length != 3)
   {
       alert('Data fora do padrão DD/MM/AAAA');
       return false;
   }

   /* Retira os espaços em branco do início e fim de cada string. */
   splitData[0] = splitData[0].replace(regExpEspaco, '');
   splitData[1] = splitData[1].replace(regExpEspaco, '');
   splitData[2] = splitData[2].replace(regExpEspaco, '');

   if ((splitData[0].length != 2) || (splitData[1].length != 2) || (splitData[2].length != 4))
   {
       alert('Data fora do padrão DD/MM/AAAA');
       return false;
   }

   /* Procura por caracter não-numérico. EX.: o "x" em "28/09/2x11" */
   if (regExpCaracter.test(splitData[0]) || regExpCaracter.test(splitData[1]) || regExpCaracter.test(splitData[2]))
   {
       alert('Caracter inválido encontrado!');
       return false;
   }

   dia = parseInt(splitData[0],10);
   mes = parseInt(splitData[1],10)-1; //O JavaScript representa o mês de 0 a 11 (0->janeiro, 1->fevereiro... 11->dezembro)
   ano = parseInt(splitData[2],10);

   var novaData = new Date(ano, mes, dia);

   /* O JavaScript aceita criar datas com, por exemplo, mês=14, porém a cada 12 meses mais um ano é acrescentado à data
        final e o restante representa o mês. O mesmo ocorre para os dias, sendo maior que o número de dias do mês em
        questão o JavaScript o converterá para meses/anos.
        Por exemplo, a data 28/14/2011 (que seria o comando "new Date(2011,13,28)", pois o mês é representado de 0 a 11)
        o JavaScript converterá para 28/02/2012.
        Dessa forma, se o dia, mês ou ano da data resultante do comando "new Date()" for diferente do dia, mês e ano da
        data que está sendo testada esta data é inválida. */
   if ((novaData.getDate() != dia) || (novaData.getMonth() != mes) || (novaData.getFullYear() != ano))
   {
       alert('Data Inválida!');
       return false;
   }
   else
   {
      
       return true;
   }
}


function somenteNumeros(e) {
        var charCode = e.charCode ? e.charCode : e.keyCode;
        // charCode 8 = backspace   
        // charCode 9 = tab
        if (charCode != 8 && charCode != 9) {
            // charCode 48 equivale a 0   
            // charCode 57 equivale a 9
            if (charCode < 46 || charCode > 57) {
                return false;
            }
        }
    }

