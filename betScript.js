$(document).ready(function() 
{
    $(".button-bet1").on("click", function(event) 
    {
        const glos = $(".liczbaGlosow1");
        const id = glos.data("id");
        let liczbaGlosow = parseInt(glos.text());
    
        liczbaGlosow++;
    
        glos.text(liczbaGlosow);

        $.post("vote.php", { button: 'button1', id: id, liczbaGlosow: liczbaGlosow });
    });

    $(".button-bet2").on("click", function(event) 
    {
        const glos = $(".liczbaGlosow2");
        const id = glos.data("id");
        let liczbaGlosow = parseInt(glos.text());

        liczbaGlosow++;

        glos.text(liczbaGlosow);

        $.post("vote.php", { button: 'button2', id: id, liczbaGlosow: liczbaGlosow });
    });
});
