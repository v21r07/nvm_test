$(document).ready(function()
{
	$('.facebook').hide();		
    $('.telephone').hide();
	$('.instagram').hide();
});

function text_decoration(cible)//nalana nle text decoration fa tsy mety miala am css
{
	$(cible).mouseover(function()
	{
		$(cible).css('color','white');
		$(cible).next().toggle();
	});

}

text_decoration($('#facebook'));
text_decoration($('#telephone'));
text_decoration($('#instagram'));