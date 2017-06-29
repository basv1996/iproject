<!DOCTYPE html>
<html>
    <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href='https://fonts.googleapis.com/css?family=Mogra' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
       <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Seduce Your partner</title>
    </head>
    <body>
     <img id="MobileBackground"src="img/BackgroundMobile-min.jpg">
      <div id="frontText">
          <h1>Seduce Your Partner</h1>
          <p>A website to bring back the spark into your relationship</p>
          <p>- New York Times 2017</p>
      </div>
       <div id="container">
        <h1>Seduce Your Partner</h1>
        <p>fill in your age</p>
           <input type="date" id="DOB"></br>
        <button id="DOBSubmit">submit</button>
        <img id="edges" src="img/Gold-Decoration.png">
        </div>
        <script>
            var button=document.getElementById("DOBSubmit");
            button.addEventListener("click",naampje);
            function naampje()
            {
                var inputveld=document.getElementById("DOB");
                var opgegeven=inputveld.value;
                var nu=new Date();
                var opgegeven_datum=new Date(opgegeven);
                var aantal_ms=nu.getTime()-opgegeven_datum.getTime();
                var aantal_seconden=aantal_ms/1000;
                var jaar=Math.floor(aantal_seconden/(60*60*24*365));
                if(jaar>18)
                {
                     location.href="index.php?page=page1";
                }else{
                    window.alert("ge zijt te jong.");
                }
            }
        </script>
    </body>
</html>