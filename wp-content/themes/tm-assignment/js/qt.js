;

(function($){
    $(document).ready(function(){
        //alert("hello");
        QTags.addButton( "mybutton", "My Button", "<blockquote>", "</blockquote>", "q", "Block Quote" );
        QTags.addButton( "sg", "Slider", myFunction );

    });

    function myFunction(){
        var images = prompt("Image ids separated by comma");
        $("#content").append("[slider id='"+images+"']");
    }
})(jQuery);