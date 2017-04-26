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
            
            providerElem.append($("<img src='../../../api/avatars/Logo1492624798.png'>"));
            // if (providers.models[i].image) {
            //     providerElem.append($("<img src='../../../api/avatars/" + providers.models[i].image +"'>"));
            // }
            container.append(providerElem);
        }
    });
}





// $(document).ready(onHtmlLoaded);
// function onHtmlLoaded(){
//     var providers=new Providers();
//     var container = $(".row-prov");
//     providers.listTopProviders().done(function(){
//         for(var i=0; i<providers.models.length; i++) {
//             var providerElem = $("<div> </div>");
//             providerElem.html(providers.models[i].name);
//             container.append(providerElem);
//         }
//     });
// }



// function generateImage(i) {
    


// <div class="row-prov">
//                     <!-- Team -->
//                     <!--<div class="col-sm-4 sm-margin-b-50">-->
//                     <!--    <div class="bg-color-white margin-b-20">-->
//                     <!--        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">-->
//                     <!--            <img class="img-responsive" src="../layout/img/770x860/01.jpg" alt="Team Image">-->
//                     <!--        </div>-->
//                     <!--    </div>-->
//                     <!--    <h4><a href="#">Alicia Keys</a> <span class="text-uppercase margin-l-20">Interior Designer</span></h4>-->
//                     <!--    <p>Fisnished the Design Univeristy of Standford, masterted in interior design and decorations.I love designing cool stuff!</p>-->
//                     <!--</div>-->