<?php include("fonk.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <META NAME="robot" CONTENT="index,follow">
    <META NAME="copyright" CONTENT=" © 2011 expokent">
    <META NAME="author" CONTENT="Expokent Medya Bilişim">
    <META NAME="language" CONTENT="Turkish">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>      
    <link rel="stylesheet" type="text/css" href="bicim.css" />
    <link rel="apple-touch-icon" href="files/<?php echo $adres['idsha']; ?>app.png"/>
    <link rel="shortcut icon" href="faviconn.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/bizimstrap.css">
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>



  <script type="text/javascript">
        <?php $liste = getsearch(); ?>
        var data = new Array(<?php echo $liste; ?>);
        $(function ()  {$("#tooltip").tooltip(); }); 
        $(function ()  {$('.dropdown-toggle').dropdown() }); 
        jQuery(document).ready(function() {
            $('#aramaveri').typeahead({source: data, display: 'marka', items:10,  menu: '<ul class="typeahead dropdown-menu"></ul>' , item: '<li class=""><a href="#"></a></li>', updater:function (item) {
                    //item = selected item
                    //do your stuff.
                    if (item == undefined) { item=$('#aramaveri').val().toString(); }
                    window.location="arama.php?search="+item;
                    //dont forget to return the item to reflect them into input
                    return item;
                } });
        }); 

        $(window).load(function(){
            var uber = {render: $.fn.typeahead.Constructor.prototype.render};
            $.extend($.fn.typeahead.Constructor.prototype, {
            render: function(items) {
                uber.render.call(this, items);
                this.$menu.prepend('<li><a href="#">'+$('#aramaveri').val().toString()+'</a></li>')
                var active = this.$menu.find('.active').removeClass('active')
                 , prev = active.prev()

                if (!prev.length) {
                    prev = this.$menu.find('li').first()
                  }

                prev.addClass('active')
                return this;
            }
            });
        });


    </script>

</head>
<body>
    <div class="container">
        <br><i class="icon-share-alt"></i><a href="http://twitter.com/pikseladam">Have a question? mention us on twitter :) @pikseladam</a>
        <h1>Typeahead Bootstrap Denemesi</h1>
        <p>Typeahead'de yazılanı şeçeneklerde ilk sıraya koyma ve enter'a basılırsa yazılan şeyi arama işlemi. Eğer başka birşey seçilirse, seçilenin websitesine gitmesi</p>
        <br>
        <input type="text" spellcheck="false" autocomplete="off" id="aramaveri" name="search" data-provide="typeahead" class="typeahead input-large" placeholder="Marka Arama">
    </div>
</body>
</html>