function somma(n1, n2) {
    n1 = toNum(n1);
    n2 = toNum(n2);

    return n1 + n2;
}

function sottrazione(n1, n2){
    n1 = toNum(n1);
    n2 = toNum(n2);

    return n1 - n2;
}

function prodotto(n1, n2){
    n1 = toNum(n1);
    n2 = toNum(n2);

    return n1 * n2;
}

function quoziente(n1, n2){
    n1 = toNum(n1);
    n2 = toNum(n2);

    return n1 / n2;
}

function isNValido(n){
    if(n == "")
        return false;

    if(toNum(n) == null)
        return false;

    if(retr_dec(n) != 2)
        return false;

    if (isInt(toNum(n))){
        var intero = n.split('.')[0];
        if (intero < 0 || intero >99)
            return false;
    }
    return true;
}

function toNum(n){
    var nNum = parseFloat(n);
    if (isNaN(nNum) == false && nNum == n)
        return nNum;
    else
        return null;
}

function retr_dec(num) {
    return (num.split('.')[1] || []).length;
}

function isInt(num) {
    if (num % 1 == 0)
        return true;
    else
        return false;
}