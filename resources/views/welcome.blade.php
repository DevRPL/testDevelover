<!DOCTYPE html>
<!--
Copyright 2015 Erik Nijenhuis <erik@xerdi.com>.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

     http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
-->
<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#1a237e">

        <title>Result</title>

        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://materialdesignblog.com/Material-Design-Flipper/material/css/ripples.min.css" rel="stylesheet">
        <link href="http://materialdesignblog.com/Material-Design-Flipper/material/css/material-wfont.min.css" rel="stylesheet">

        <link href="http://materialdesignblog.com/Material-Design-Flipper/css/flipper.css" rel="stylesheet">
        
    </head>
    <body>
        
        <div class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
        
        <div class="container">
            <div id="example-row" class="row">
                <div class="col-xs-12 col-md-4 full-card">
                    <div class="flip-card">
                        <div class="card label-info">
                            <h6>1</h6>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised icon-material-replay" id="second"></a>
                        <div class="well">
                            <h1>Card 1</h1>
                        </div>
                    </div>
                    <div class="flip-card active-card">
               
                            <div class="card" style="background-color: #F1BF26;color: white;">
                                <h6>1</h6>
                            </div>
                     
                        <div class="well">
                            <a href="{{ url('test1') }}"><h1>See Results Number 1</h1></a>
                        </div>
                    </div>
                    <div class="flip-card">
                        <div class="card alert-success">
                            <h6>3</h6>
                        </div>
                        <div class="well">
                            <h1>Card 3</h1>
                        </div>
                    </div>
                </div>
                 <div class="col-xs-12 col-md-4"><h3></h3></div>
                <div class="col-xs-12 col-md-4 full-card">
                    <div class="flip-card">
                        <div class="card label-info">
                            <h6>1</h6>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised icon-material-replay" id="third"></a>
                        <div class="well">
                            <h1>See Results Number 1</h1>
                        </div>
                    </div>
                    <div class="flip-card">
                        <div class="card" style="background-color: #F1BF26;color: white;">
                            <h6>2</h6>
                        </div>
                        <div class="well">
                            <h1>Card 2</h1>
                        </div>
                    </div>
                    <div class="flip-card active-card">
                        <div class="card alert-success">
                            <h6>2</h6>
                        </div>
                        <div class="well">
                            <a href="{{ url('login') }}"><h1>See Results Number 2</h1></a>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        
        <!--    JAVASCRIPT DEPENENCIES      -->
        
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <script src="material/js/ripples.min.js"></script>
        <script src="material/js/material.min.js"></script>
        
        <script src="js/flipper.js"></script>
       
    </body>
</html>