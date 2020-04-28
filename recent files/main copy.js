
$(document).ready(function(){

    $('.menu-icon').on('click', function(event){
        $('.site-navigation').toggleClass('menu-toggle');
        $('.menu-icon').toggleClass('icon-closed');
        $('.site-header').toggleClass('menu-closed-header-style ');
    });

    $('#grid').isotope({
       itemSelector: '.grid-item',
    });

    $('#skills-grid').isotope({
        itemSelector: '.grid-item',
     });

    $('#isotope-sort-projects > button').click(function(){
        $("#grid").isotope({  filter: $( this ).attr('data-filter')  });
    });

    $('#isotope-sort-skills > button').click(function(){
        $("#skills-grid").isotope({  filter: $( this ).attr('data-filter')  });
    });

});