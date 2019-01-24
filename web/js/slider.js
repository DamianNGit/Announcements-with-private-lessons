var numer = Math.floor(Math.random() * 7) + 1;

        function hide() {
            $("#slider").fadeOut(500);
        }

        function slider() {
            numer++;
            if (numer > 7) numer = 1;

            var plik = "<img class=\"img-responsive\" alt=\"Slider\" src=\"../img/slides/slide" + numer + ".jpg\">";
            
            document.getElementById("slider").innerHTML = plik;
            $("#slider").fadeIn(500);
            
            setTimeout("slider()", 3000);
            setTimeout("hide()", 2500);
        }