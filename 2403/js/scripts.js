var valor=4;
var res=0;

for(var i=1; i<=10; i++){
    res=valor*i;
    document.write(valor,' x ',i,'= ',res,'<br>');
    console.log(valor+' x '+i+'= '+res);
}
document.write('<br><br>');

var valor1;
var valor2;
var resul;

valor1=prompt('Ingrese el valor para la primera tabla: ');
valor2=prompt('Ingrese el valor para la segunda tabla: ');

if(valor1>valor2){
    alert('No es posible procesar su peticion');
}else{
    for(var i=1; i<=10; i++){
        resul=valor1*i;
        document.write(valor1,' x ',i,'= ',resul,'<br>');
        console.log(valor1+' x '+i+'= '+resul);
    }
    document.write('<br><br>');

    for(var i=1; i<=10; i++){
        resul=valor2*i;
        document.write(valor2,' x ',i,'= ',resul,'<br>');
        console.log(valor2+' x '+i+'= '+resul);
    }
}

