function Maggiore() {
        "use strict";
        var int_re = /^\d+$/
        var i;    
        var number;
        var error = false;
        var errormessage = "";
        var massimo;
        
        for (i = 0; i < arguments.length && !error; i++) {    
            if (arguments[i] == "") {
                errormessage += "Nessun valore inserito in posizione " +(i+1)+"\n";
                error = true;
            }
            else {	
                if (!int_re.test(arguments[i])) {
                    errormessage += "Il valore inserito in posizione "+ (i+1) + " deve essere un numero intero\n";
                    error = true;
                }
                else {
                    if( i==0 )
                        massimo = arguments[i];
                    else
                        massimo = Math.max(arguments[i],massimo);
                }
            }
        }
    
        if (error)
            window.alert(errormessage);
        else
            window.alert("Il numero maggiore è: "+massimo);
    }
    