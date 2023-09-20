# tunefic  
Website written in PHP for tuning and balancing of JavaScript games. Designed and developed by Benny Mattis.  

## Purpose

TuneFic was created to serve as a tool for developers and designers to use when tuning and balancing their JavaScript games while in development (it is not intended to be used in a production environment). Ultimately, it allows designers to experiment with different values with minimum necessary knowledge of how the game is programmed behind the scenes.  

Developer Mode allows developers to determine which variables can be set in Designer Mode.

Designer Mode allows designers to test out different value configurations for the game variables defined in Developer Mode.  

## How to Use

Add these lines to your main game page (e.g. index.php):
```
    <?php $tunefic = isset($_POST['tunefic']) ? json_encode($_POST) : 'null';?>
    <script>const tunefic = tuneFic = TuneFic = TUNEFIC = JSON.parse('<?=$tunefic?>');</script>
```

To test your game with injected variable values, ensure that your game is hosted in a PHP file at an HTTPS address (one way to achieve this would be hosting your game on 000Webhost while it is in development).  

Set the `url` variable in TuneFic to the url of your game. 

Then, you can reference the `tunefic` object in your game code as you see fit. The `tunefic` object's keys will be you project's variable names, and its values will be the values that were set for those variables in Designer Mode. You may see warnings or errors stating that `tunefic` has not been defined; as long as you included the `php` and `script` tags mentioned above, this should not be a problem. 

In TuneFic, define the variables you want to include in Developer Mode, set those variables to experimental values in Designer Mode, and click the "Test this configuration" button to open your game with the specified configuration.  

## Special Thanks

The website uses [Parsedown](https://parsedown.org/) to display this README in the browser (under "About").  Special thanks to [Emanuil Rusev](erusev.com) for licensing Parsedown under the MIT License.

## License

Copyright 2023 Benny Mattis

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
