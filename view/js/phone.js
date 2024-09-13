document.getElementById('telefone').addEventListener('input', function(e) {
    var value = e.target.value;
    var phonePattern = value.replace(/\D/g, '') 
                            .replace(/(\d{2})(\d)/,"($1) $2")
                            .replace(/(\d)(\d{4})$/,"$1-$2");
    e.target.value = phonePattern;
});
