/*global $ */

$(document).ready(onHtmlLoaded);
function onHtmlLoaded() {
    $("#save_application").on("click", function(){
        var applicationTitle = $("input[name='title']").val();
        var applicationDescription = $("textarea[name='content']").val();
        
        var articles = new Application();
        var saveOperation = articles.save({
            title: applicationTitle,
            content: applicationDescription,
        })
        saveOperation.done(redirectUserToArticlesPage);
    });
    
    function redirectUserToApplicationPage() {
        window.location.href = "https://preview.c9users.io/iraresrazvan/web91/UI/pages/application.html"
    }
}