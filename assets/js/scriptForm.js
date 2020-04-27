// JavaScript Document

//adiciona mascara de cnpj

function MascaraCNPJ(cnpj){

        if(mascaraInteiro(cnpj)==false){

                event.returnValue = false;

        }       

        return formataCampo(cnpj, '00.000.000/0000-00', event);

}



//adiciona mascara de cep

function MascaraCep(cep){

                if(mascaraInteiro(cep)==false){

                event.returnValue = false;

        }       

        return formataCampo(cep, '00.000-000', event);

}



//adiciona mascara de data

function MascaraData(data){

        if(mascaraInteiro(data)==false){

                event.returnValue = false;

        }       

        return formataCampo(data, '00/00/0000', event);

}


//adiciona mascara de Mes/Ano

function MascaraDataMes(campo, e)
{
    var kC = (document.all) ? event.keyCode : e.keyCode;
    var data = campo.value;
    
    if( kC!=8 && kC!=46 )
    {
        if( data.length==2 )
        {
            campo.value = data += '/';
        }
        
        else
            campo.value = data;
    }
}

function mascaraDataMes2(val) {
  var pass = val.value;
  var expr = /[0123456789]/;

  for (i = 0; i < pass.length; i++) {
    // charAt -> retorna o caractere posicionado no índice especificado
    var lchar = val.value.charAt(i);
    var nchar = val.value.charAt(i + 1);

    if (i == 0) {
      // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
      // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
      // instStr.search(expReg);
      if ((lchar.search(expr) != 0) || (lchar > 3)) {
        val.value = "";
      }

    } else if (i == 1) {

      if (lchar.search(expr) != 0) {
        // substring(indice1,indice2)
        // indice1, indice2 -> será usado para delimitar a string
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }

    } else if (i == 4) {

      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }
    }

    if (i >= 6) {
      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
      }
    }
  }

  if (pass.length > 10)
    val.value = val.value.substring(0, 10);
  return true;
}

//Validar DIferença de Datas

function checarDatas0() {
    var form_relatorio_mes = document.form_relatorio_mes;

    var data_1 = new form_relatorio_mes.dataInicio.value);
    var data_2 = new Date(form_relatorio_mes.dataFim.value);
    if (data_1 > data_2) {
        alert("Data não pode ser maior que a data final");
        return false;
    } else {
        return true
    }
}



function checarDatas() {
    var form_relatorio_mes = document.form_relatorio_mes;
    console.log(form_relatorio_mes);
    var data_1 = new form_relatorio_mes.dataInicio.value;
    var data_2 = new form_relatorio_mes.dataFim.value;
    if (!data_1 || !data_2) return false
    if (data_1 > data_2) {
        alert("Data não pode ser maior que a data final");
        return false;
    } else {
        return true
    }
}


//adiciona mascara ao telefone

function MascaraTelefone(tel){  

        if(mascaraInteiro(tel)==false){

                event.returnValue = false;

        }       

        return formataCampo(tel, '(00) 0000-0000', event);

}



//adiciona mascara ao CPF

function MascaraCPF(cpf){

        if(mascaraInteiro(cpf)==false){

                event.returnValue = false;

        }       

        return formataCampo(cpf, '000.000.000-00', event);

}



//valida telefone

function ValidaTelefone(tel){

        exp = /\(\d{2}\)\ \d{4}\-\d{4}/

        if(!exp.test(tel.value))

                alert('Numero de Telefone Invalido!');

}



//valida CEP

function ValidaCep(cep){

        exp = /\d{2}\.\d{3}\-\d{3}/

        if(!exp.test(cep.value))

                alert('Numero de Cep Invalido!');               

}



//valida data

function ValidaData(data){

        exp = /\d{2}\/\d{2}\/\d{4}/

        if(!exp.test(data.value))

                alert('Data Invalida!');                        

}



//valida o CPF digitado

function ValidarCPF(Objcpf){

        var cpf = Objcpf.value;

        exp = /\.|\-/g

        cpf = cpf.toString().replace( exp, "" ); 

        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));

        var soma1=0, soma2=0;

        var vlr =11;



        for(i=0;i<9;i++){

                soma1+=eval(cpf.charAt(i)*(vlr-1));

                soma2+=eval(cpf.charAt(i)*vlr);

                vlr--;

        }       

        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));

        soma2=(((soma2+(2*soma1))*10)%11);



        var digitoGerado=(soma1*10)+soma2;

        if(digitoGerado!=digitoDigitado)        

                alert('CPF Invalido!');         

}



//valida numero inteiro com mascara

function mascaraInteiro(){

        if (event.keyCode < 48 || event.keyCode > 57){

                event.returnValue = false;

                return false;

        }

        return true;

}



//valida o CNPJ digitado

function ValidarCNPJ(ObjCnpj){

        var cnpj = ObjCnpj.value;

        var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);

        var dig1= new Number;

        var dig2= new Number;



        exp = /\.|\-|\//g

        cnpj = cnpj.toString().replace( exp, "" ); 

        var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));



        for(i = 0; i<valida.length; i++){

                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  

                dig2 += cnpj.charAt(i)*valida[i];       

        }

        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));

        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));



        if(((dig1*10)+dig2) != digito)  

                alert('CNPJ Invalido!');



}



//formata de forma generica os campos

function formataCampo(campo, Mascara, evento) { 

        var boleanoMascara; 



        var Digitato = evento.keyCode;

        exp = /\-|\.|\/|\(|\)| /g

        campoSoNumeros = campo.value.toString().replace( exp, "" ); 



        var posicaoCampo = 0;    

        var NovoValorCampo="";

        var TamanhoMascara = campoSoNumeros.length;; 



        if (Digitato != 8) { // backspace 

                for(i=0; i<= TamanhoMascara; i++) { 

                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")

                                                                || (Mascara.charAt(i) == "/")) 

                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 

                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 

                        if (boleanoMascara) { 

                                NovoValorCampo += Mascara.charAt(i); 

                                  TamanhoMascara++;

                        }else { 

                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 

                                posicaoCampo++; 

                          }              

                  }      

                campo.value = NovoValorCampo;

                  return true; 

        }else { 

                return true; 

        }

}

   $(document).ready(function () {
        $('#outra_data').mask('99/99/9999');
        return false;
    });

//Mascara Cep e Telefone
function mascara(t, mask){
 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 if (texto.substring(0,1) != saida){
 t.value += texto.substring(0,1);
 }
 }