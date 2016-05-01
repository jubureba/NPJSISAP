$('#pesquisar-tab').keyup(function(){
    var encontrou = false;
    var termo = $(this).val().toLowerCase();
    $('table > tbody > tr#dados').each(function(){
        $(this).find('td').each(function(){
            if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
        });
        if(!encontrou) $(this).hide();
        else $(this).show();
        encontrou = false;
    });
});
$("#pesquisar-tab").blur(function(){
    $(this).val("");
});