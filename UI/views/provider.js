/*global$*/
/*global Provider */

$(document).ready(onHtmlLoaded);
function onHtmlLoaded(){
    var providers=new Providers();
    var container = $(".row-prov");
    providers.listTopProviders().done(function(){
        for(var i=0; i<providers.models.length; i++) {
            var providerElem = $("<div></div>");
            providerElem.html(providers.models[i].name);
            container.append(providerElem);
        }
    });
}