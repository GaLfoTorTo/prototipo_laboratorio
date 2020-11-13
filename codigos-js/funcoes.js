//funcao normal
function somar(n1 = 1, n2 = 1) {
	return n1 + n2;
}
console.log('função normal', somar(5,8))

//função anonima
/*
function() {
	return 5 + 3;
}
*/
console.log('função anonima',function() {	return 5 + 3; }())
//atribuição de função anonima
const somaAnonima = function(p1, p2) {
	return p1 + p2;
}
//console.log(somaAnonima(3,6))

//arrow function

const somaArrow = (p, n) => { 
	return p + n
}
console.log('arrow function', somaArrow(9,45))

var anon = (a, b) => a + b; //quando o retorno é único, funciona sem as chaves
console.log('arrow function sem chaves', anon(9,45))

var anon2 = a => a + 6; //quando tem apenas um parametro, pode remover os parenteses

console.log('arrow function sem parenteses', anon2(9,45))





