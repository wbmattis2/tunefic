# tunefic  
Website written in PHP for tuning and balancing of JavaScript games, designed and developed by Benny Mattis.  

Developer Mode allows developers to determine which variables can be set in Designer Mode.

Designer Mode allows designers to test out different value configurations for the game variables defined in Developer Mode.  

##How to Use

Add these lines to your main game page (e.g. index.php):
```
    <?php $tunefic = isset($_POST['tunefic']) ? json_encode($_POST) : 'null';?>
    <script>const tunefic = tuneFic = TuneFic = TUNEFIC = JSON.parse('<?=$tunefic?>');</script>
```

To test your game with injected variable values, ensure that your game is hosted in a PHP file at an HTTPS address (one way to achieve this would be hosting your game on 000Webhost while it is in development).  

Set the `url` variable in TuneFic to the url of your game. 

Then, you can reference the tunefic object in your game code as you see fit. Just define the variables you want to include in Developer Mode, set those variables to experimental values in Designer Mode, and click the "Test this configuration" button to open your game with the specified configuration.


